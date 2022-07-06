<?php

namespace App\Http\Controllers;

use App\Models\Discounts;
use Illuminate\Http\Request;

class DiscountsController extends Controller
{
    public function store(Request $request)
    {
        $discounts=new Discounts;
        $discounts->discount_code=$request->discount_code;
        $discounts->discount_name=$request->discount_name;
        $discounts->date_to=$request->date_to;
        $discounts->date_from=$request->date_from;
        $discounts->description=$request->description;
        $discounts->save();

        return $discounts;
    }

    public function update(Request $request)
    {
        $discounts=Discounts::Find($request->$id);
        $discounts->discount_code=$request->discount_code;
        $discounts->discount_name=$request->discount_name;
        $discounts->date_to=$request->date_to;
        $discounts->date_from=$request->date_from;
        $discounts->description=$request->description;
        $discounts->update();

        return $discounts;
    }

    public function destroy(Request $request)
    {
        $discounts=Discounts::Find($request->$id);
        $discounts->delete();

        return $discounts;
    }

    public function index()
    {
        $discounts = DB::table('discounts')
                    ->select('discounts.id',
                    'discounts.discount_code',
                    'discounts.discount_name',
                    'discounts.date_to',
                    'discounts.date_from',
                    'discounts.description' )
                    ->get();

        return $discounts;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $discounts = DB::table('discounts')
                    ->select('discounts.id',
                    'discounts.discount_code',
                    'discounts.discount_name',
                    'discounts.date_to',
                    'discounts.date_from',
                    'discounts.description' )
                    ->where('discounts.id','=',$id)
                    ->get();

         return $discounts;
    }
}
