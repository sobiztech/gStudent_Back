<?php

namespace App\Http\Controllers;

use App\Models\Classes_subjects;
use Illuminate\Http\Request;

class ClassesSubjectsController extends Controller
{
    public function store(Request $request)
    {
        $classesSubjects=new Classes_subjects;
        $classesSubjects->class_id=$request->class_id;
        $classesSubjects->subject_id=$request->subject_id;
        $classesSubjects->save();

        return $classesSubjects;
    }

    public function update(Request $request)
    {
        $classesSubjects=Classes_subjects::Find($request->$id);
        $classesSubjects->class_id=$request->class_id;
        $classesSubjects->subject_id=$request->subject_id;
        $classesSubjects->update();

        return $classesSubjects;
    }

    public function destroy(Request $request)
    {
        $classesSubjects=Classes_subjects::Find($request->$id);
        $classesSubjects->delete();

        return $classesSubjects;
    }

    public function index()
    {
        $classesSubjects = DB::table('classes_subjects')
                        ->select('classes_subjects.id',
                        'classes.id',
                        'classes.name',
                        'classes.description',
                        'subjects.id',
                        'subjects.subject_code',
                        'subjects.subject_name',
                        'mediums.id',
                        'mediums.medium_name')
                        ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                        ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                        ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                        ->get();

        return $classesSubjects;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $classesSubjects = DB::table('classes_subjects')
                        ->select('classes_subjects.id',
                        'classes.id',
                        'classes.name',
                        'classes.description',
                        'subjects.id',
                        'subjects.subject_code',
                        'subjects.subject_name',
                        'mediums.id',
                        'mediums.medium_name')
                        ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                        ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                        ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                        ->where('classes_subjects.id','=',$id)
                        ->get();

         return $classesSubjects;
    }
}
