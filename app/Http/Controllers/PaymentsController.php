<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentDiscountsController;
use App\Http\Controllers\PaymentOptionsController;

class PaymentsController extends Controller
{
    public function store(Request $request)
    {
        $paymentDiscount_controller = new GuardiansController;
        $paymentOptons_controller = new PaymentOptionsController;
        $paymentDetail = new PaymentDetailsController;

        $payments=new Payments;
        $payments->payment_date=$request->payment_date;
        $payments->invoice_number=$request->invoice_number;
        $payments->total_amount=$request->total_amount;
        $payments->total_discount=$request->total_discount;
        $payments->description=$request->description;
        $payments->branch_id=$request->branch_id;
        $payments->user_id=$request->user_id;
        $payments->save();
        $last_save_payment_id=Payments::Find($id);

        $payment_discount_array = [
            'amount' => $request->payment_discount_amount,
            'payment_id' => $last_save_payment_id,
            'discount_id' => $request->$discount_id,
        ];
        $paymentDiscount_controller->store($payment_discount_array);
        $last_save_payment_discount__id=Payment_discounts::Find($id);

        $payment_option_array = [
            'amount' => $request->payment_option_amount,
            'payment_id' => $last_save_payment_id,
            'payment_method_id' => $request->$payment_method_id,
        ];
        $paymentOptons_controller->store($payment_option_array);
        $last_save_payment_option__id=Payment_options::Find($id);

        $payment_detail_array = [
            'student_id' => $request->student_id,
            'payment_id' => $last_save_payment_id,
            'payment_option_id' => $request->$last_save_payment_option__id,
            'payment_discount_id' => $request->$last_save_payment_discount__id,
        ];
        $paymentDetail->store($payment_detail_array);

        return $payments;
    }

    public function update(Request $request)
    {
        $payments=Payments::Find($request->$id);
        $payments->payment_date=$request->payment_date;
        $payments->invoice_number=$request->invoice_number;
        $payments->total_amount=$request->total_amount;
        $payments->total_discount=$request->total_discount;
        $payments->description=$request->description;
        $payments->branch_id=$request->branch_id;
        $payments->user_id=$request->user_id;
        $payments->update();

        return $payments;
    }

    public function destroy(Request $request)
    {
        $payments=Payments::Find($request->$id);
        $payments->delete();

        return $payments;
    }

    public function index()
    {
        $payments = DB::table('payments')
                ->select('payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'payments.total_amount',
                'payments.total_discount',
                'payments.description',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'properties.id',
                'properties.property_code',
                'properties.property_name',
                'users.id',
                'users.name')
                ->join('branches', 'payments.branch_id', '=', 'branches.id')
                ->join('properties', 'branches.property_id', '=', 'properties.id')
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->get();

        return $payments;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $payments = DB::table('payments')
                ->select('payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'payments.total_amount',
                'payments.total_discount',
                'payments.description',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'properties.id',
                'properties.property_code',
                'properties.property_name',
                'users.id',
                'users.name')
                ->join('branches', 'payments.branch_id', '=', 'branches.id')
                ->join('properties', 'branches.property_id', '=', 'properties.id')
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->where('payments.id','=',$id)
                ->get();

         return $payments;
    }
}
