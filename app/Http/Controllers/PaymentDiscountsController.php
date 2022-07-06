<?php

namespace App\Http\Controllers;

use App\Models\Payment_discounts;
use Illuminate\Http\Request;

class PaymentDiscountsController extends Controller
{
    public function store(Request $request)
    {
        $paymentDiscount=new Payment_discounts;
        $paymentDiscount->amount=$request->amount;
        $paymentDiscount->payment_id=$request->payment_id;
        $paymentDiscount->discount_id=$request->discount_id;
        $paymentDiscount->save();

        return $paymentDiscount;
    }

    public function update(Request $request)
    {
        $paymentDiscount=Payment_discounts::Find($request->$id);
        $paymentDiscount->amount=$request->amount;
        $paymentDiscount->payment_id=$request->payment_id;
        $paymentDiscount->discount_id=$request->discount_id;
        $paymentDiscount->update();

        return $paymentDiscount;
    }

    public function destroy(Request $request)
    {
        $paymentDiscount=Payment_discounts::Find($request->$id);
        $paymentDiscount->delete();

        return $paymentDiscount;
    }

    public function index()
    {
        $payments = DB::table('payment_discounts')
                ->select('payment_discounts.id',
                'payment_discounts.amount',
                'payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'discounts.id',
                'discounts.discount_code',
                'discounts.discount_name',
                'discounts.date_to',
                'discounts.date_from',)
                ->join('payments', 'payment_discounts.payment_id', '=', 'payments.id')
                ->join('discounts', 'payment_discounts.discount_id', '=', 'discounts.id')
                ->get();

        return $payments;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $payments = DB::table('payment_discounts')
                ->select('payment_discounts.id',
                'payment_discounts.amount',
                'payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'discounts.id',
                'discounts.discount_code',
                'discounts.discount_name',
                'discounts.date_to',
                'discounts.date_from',)
                ->join('payments', 'payment_discounts.payment_id', '=', 'payments.id')
                ->join('discounts', 'payment_discounts.discount_id', '=', 'discounts.id')
                ->where('payment_discounts.id','=',$id)
                ->get();

         return $payments;
    }
}
