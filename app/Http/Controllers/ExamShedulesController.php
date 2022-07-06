<?php

namespace App\Http\Controllers;

use App\Models\Exam_shedules;
use Illuminate\Http\Request;

class ExamShedulesController extends Controller
{
    public function store(Request $request)
    {
        $examShedule=new Exam_shedules;
        $examShedule->date_time=$request->date_time;
        $examShedule->duration=$request->duration;
        $examShedule->description=$request->description;
        $examShedule->class_subject_id=$request->class_subject_id;
        $examShedule->branch_id=$request->branch_id;
        $examShedule->save();

        return $examShedule;
    }

    public function update(Request $request)
    {
        $examShedule=Exam_shedules::Find($request->$id);
        $$examShedule->date_time=$request->date_time;
        $examShedule->duration=$request->duration;
        $examShedule->description=$request->description;
        $examShedule->class_subject_id=$request->class_subject_id;
        $examShedule->branch_id=$request->branch_id;
        $examShedule->update();

        return $examShedule;
    }

    public function destroy(Request $request)
    {
        $examShedule=Exam_shedules::Find($request->$id);
        $examShedule->delete();

        return $examShedule;
    }

    public function index()
    {
        $examShedule = DB::table('exam_shedules')
                    ->select('exam_shedules.id',
                    'exam_shedules.date_time',
                    'exam_shedules.duration',
                    'exam_shedules.description',
                    'classes.id',
                    'classes.name',
                    'subjects.id',
                    'subjects.subject_code',
                    'subjects.subject_name',
                    'mediums.id',
                    'mediums.medium_name',
                    'branches.id',
                    'branches.branch_code',
                    'branches.branch_name',
                    'properties.id',
                    'properties.property_code',
                    'properties.property_name')
                    ->leftjoin('classes_subjects', 'exam_shedules.class_subject_id', '=', 'classes_subjects.id')
                    ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                    ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                    ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                    ->leftjoin('branches', 'exam_shedules.branch_id', '=', 'branches.id')
                    ->leftjoin('properties', 'branches.property_id', '=', 'properties.id')
                    ->get();

        return $examShedule;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $examShedule = DB::table('exam_shedules')
                    ->select('exam_shedules.id',
                    'exam_shedules.date_time',
                    'exam_shedules.duration',
                    'exam_shedules.description',
                    'classes.id',
                    'classes.name',
                    'subjects.id',
                    'subjects.subject_code',
                    'subjects.subject_name',
                    'mediums.id',
                    'mediums.medium_name',
                    'branches.id',
                    'branches.branch_code',
                    'branches.branch_name',
                    'properties.id',
                    'properties.property_code',
                    'properties.property_name')
                    ->leftjoin('classes_subjects', 'exam_shedules.class_subject_id', '=', 'classes_subjects.id')
                    ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                    ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                    ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                    ->leftjoin('branches', 'exam_shedules.branch_id', '=', 'branches.id')
                    ->leftjoin('properties', 'branches.property_id', '=', 'properties.id')
                    ->where('exam_shedules.id','=',$id)
                    ->get();

         return $examShedule;
    }
}
