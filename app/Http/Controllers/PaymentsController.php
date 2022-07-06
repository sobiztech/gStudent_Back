<?php

namespace App\Http\Controllers;

use App\Models\Payments;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentDiscountsController;
use App\Http\Controllers\PaymentOptionsController;
use App\Http\Controllers\PaymentDetailsController;

class PaymentsController extends Controller
{
    public function store(Request $request)
    {
        $paymentDiscount_controller = new PaymentDiscountsController;
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

        $last_save_id=Payments::Find($id);

        $arry = [
            'amount' => $request->amount,
        ];

        $paymentDiscount_controller->store();
        // $paymentDiscount=new Payment_discounts;
        // $paymentDiscount->amount=$request->amount;
        // $paymentDiscount->payment_id=$last_save_id;
        // $paymentDiscount->discount_id=$request->discount_id;
        // $paymentDiscount->save();

        $paymentOptons_controller->store();
        // $paymentOptons=new Payment_options;
        // $paymentOptons->amount=$request->amount;
        // $paymentOptons->payment_id=$last_save_id;
        // $paymentOptons->payment_method_id=$request->payment_method_id;
        // $paymentOptons->save();

        $paymentDetail->store();
        // $paymentDetail=new Payment_details;
        // $paymentDetail->payment_id=$last_save_id;
        // $paymentDetail->student_id=$request->student_id;
        // $paymentDetail->payment_option_id=$request->payment_option_id;
        // $paymentDetail->payment_discount_id=$request->payment_discount_id;
        // $paymentDetail->save();

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
