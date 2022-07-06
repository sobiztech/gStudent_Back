<?php

namespace App\Http\Controllers;

use App\Models\Fees;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    public function store(Request $request)
    {
        $fees=new Fees;
        $fees->amount=$request->amount;
        $fees->description=$request->description;
        $fees->class_id=$request->class_id;
        $fees->save();

        return $fees;
    }

    public function update(Request $request)
    {
        $fees=Fees::Find($request->$id);
        $$fees->amount=$request->amount;
        $fees->description=$request->description;
        $fees->class_id=$request->class_id;
        $fees->update();

        return $fees;
    }

    public function destroy(Request $request)
    {
        $fees=Fees::Find($request->$id);
        $fees->delete();

        return $fees;
    }

    public function index()
    {
        $fees = DB::table('fees')
                ->select('fees.id',
                'fees.amount',
                'fees.description',
                'classes.id',
                'classes.name',
                'subjects.id',
                'subjects.subject_code',
                'subjects.subject_name',
                'mediums.id',
                'mediums.medium_name')
                ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                ->get();

        return $fees;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $fees = DB::table('fees')
                ->select('fees.id',
                'fees.amount',
                'fees.description',
                'classes.id',
                'classes.name',
                'subjects.id',
                'subjects.subject_code',
                'subjects.subject_name',
                'mediums.id',
                'mediums.medium_name')
                ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                ->where('fees.id','=',$id)
                ->get();

         return $fees;
    }
}
