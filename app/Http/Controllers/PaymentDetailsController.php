<?php

namespace App\Http\Controllers;

use App\Models\Payment_details;
use Illuminate\Http\Request;

class PaymentDetailsController extends Controller
{
    public function store(Request $request)
    {
        $paymentDetail=new Payment_details;
        $paymentDetail->payment_id=$request->payment_id;
        $paymentDetail->student_id=$request->student_id;
        $paymentDetail->payment_option_id=$request->payment_option_id;
        $paymentDetail->payment_discount_id=$request->payment_discount_id;
        $paymentDetail->save();

        return $paymentDetail;
    }

    public function update(Request $request)
    {
        $paymentDetail=Payment_details::Find($request->$id);
        $paymentDetail->payment_id=$request->payment_id;
        $paymentDetail->student_id=$request->student_id;
        $paymentDetail->payment_option_id=$request->payment_option_id;
        $paymentDetail->payment_discount_id=$request->payment_discount_id;
        $paymentDetail->update();

        return $paymentDetail;
    }

    public function destroy(Request $request)
    {
        $paymentDetail=Payment_details::Find($request->$id);
        $paymentDetail->delete();

        return $paymentDetail;
    }

    public function index()
    {
        $payments = DB::table('payment_details')
                ->select('payment_details.id',
                'payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'payments.total_amount',
                'payments.total_discount',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'properties.id',
                'properties.property_code',
                'properties.property_name',
                'users.id',
                'users.name',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'properties.id',
                'properties.property_code',
                'properties.property_name',
                'users.id',
                'users.name',
                'payment_options.id',
                'payment_options.amount',
                'payment_discounts.id',
                'payment_discounts.amount',
                'students.id',
                'students.student_code',
                'students.student_first_name',
                'students.student_sur_name')
                ->join('payments', 'payment_details.payment_id', '=', 'payments.id')
                ->join('branches', 'payments.branch_id', '=', 'branches.id')
                ->join('properties', 'branches.property_id', '=', 'properties.id')
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->join('payment_options', 'payment_details.payment_option_id', '=', 'payment_options.id')
                ->join('payment_discounts', 'payment_details.payment_discount_id', '=', 'payment_discounts.id')
                ->join('students', 'payment_details.student_id', '=', 'students.id')
                ->get();

        return $payments;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $payments = DB::table('payment_details')
                ->select('payment_details.id',
                'payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'payments.total_amount',
                'payments.total_discount',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'properties.id',
                'properties.property_code',
                'properties.property_name',
                'users.id',
                'users.name',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'properties.id',
                'properties.property_code',
                'properties.property_name',
                'users.id',
                'users.name',
                'payment_options.id',
                'payment_options.amount',
                'payment_discounts.id',
                'payment_discounts.amount',
                'students.id',
                'students.student_code',
                'students.student_first_name',
                'students.student_sur_name')
                ->join('payments', 'payment_details.payment_id', '=', 'payments.id')
                ->join('branches', 'payments.branch_id', '=', 'branches.id')
                ->join('properties', 'branches.property_id', '=', 'properties.id')
                ->join('users', 'payments.user_id', '=', 'users.id')
                ->join('payment_options', 'payment_details.payment_option_id', '=', 'payment_options.id')
                ->join('payment_discounts', 'payment_details.payment_discount_id', '=', 'payment_discounts.id')
                ->join('students', 'payment_details.student_id', '=', 'students.id')
                ->where('payment_details.id','=',$id)
                ->get();

         return $payments;
    }
}
