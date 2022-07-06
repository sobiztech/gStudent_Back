<?php

namespace App\Http\Controllers;

use App\Models\Payment_methods;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{
    public function store(Request $request)
    {
        $paymentMethod=new Payment_methods;
        $paymentMethod->payment_method_name=$request->payment_method_name;
        $paymentMethod->description=$request->description;
        $paymentMethod->save();

        return $paymentMethod;
    }

    public function update(Request $request)
    {
        $paymentMethod=Payment_methods::Find($request->$id);
        $paymentMethod->payment_method_name=$request->payment_method_name;
        $paymentMethod->description=$request->description;
        $paymentMethod->update();

        return $paymentMethod;
    }

    public function destroy(Request $request)
    {
        $paymentMethod=Payment_methods::Find($request->$id);
        $paymentMethod->delete();

        return $paymentMethod;
    }

    public function index()
    {
        $paymentMethod = DB::table('payment_methods')
                ->select('payment_methods.id',
                'payment_methods.payment_method_name',
                'payment_methods.description')
                ->get();

        return $paymentMethod;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $paymentMethod = DB::table('payment_methods')
                ->select('payment_methods.id',
                'payment_methods.payment_method_name',
                'payment_methods.description')
                ->where('payment_methods.id','=',$id)
                ->get();

         return $paymentMethod;
    }
}
