<?php

namespace App\Http\Controllers;

use App\Models\Payment_options;
use Illuminate\Http\Request;

class PaymentOptionsController extends Controller
{
    public function store(Request $request)
    {
        $paymentOptons=new Payment_options;
        $paymentOptons->amount=$request->amount;
        $paymentOptons->payment_id=$request->payment_id;
        $paymentOptons->payment_method_id=$request->payment_method_id;
        $paymentOptons->save();

        return $paymentOptons;
    }

    public function update(Request $request)
    {
        $paymentOptons=Payment_options::Find($request->$id);
        $paymentOptons->amount=$request->amount;
        $paymentOptons->payment_id=$request->payment_id;
        $paymentOptons->payment_method_id=$request->payment_method_id;
        $paymentOptons->update();

        return $paymentOptons;
    }

    public function destroy(Request $request)
    {
        $paymentOptons=Payment_options::Find($request->$id);
        $paymentOptons->delete();

        return $paymentOptons;
    }

    public function index()
    {
        $paymentOptons = DB::table('payment_options')
                ->select('payment_options.id',
                'payment_options.amount',
                'payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'payment_methods.id',
                'payment_methods.payment_method_name',
                'payment_methods.description')
                ->join('payments', 'payment_options.payment_id', '=', 'payments.id')
                ->join('payment_methods', 'payment_options.payment_method_id', '=', 'payment_methods.id')
                ->get();

        return $paymentOptons;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $paymentOptons = DB::table('payment_options')
                ->select('payment_options.id',
                'payment_options.amount',
                'payments.id',
                'payments.payment_date',
                'payments.invoice_number',
                'payment_methods.id',
                'payment_methods.payment_method_name',
                'payment_methods.description')
                ->join('payments', 'payment_options.payment_id', '=', 'payments.id')
                ->join('payment_methods', 'payment_options.payment_method_id', '=', 'payment_methods.id')
                ->where('payment_options.id','=',$id)
                ->get();

         return $paymentOptons;
    }
}
