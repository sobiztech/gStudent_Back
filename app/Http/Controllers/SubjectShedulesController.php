<?php

namespace App\Http\Controllers;

use App\Models\Subject_shedules;
use Illuminate\Http\Request;

class SubjectShedulesController extends Controller
{
    public function store(Request $request)
    {
        $subjectShedules=new Subject_shedules;
        $subjectShedules->date_time=$request->date_time;
        $subjectShedules->duration=$request->duration;
        $subjectShedules->description=$request->description;
        $subjectShedules->class_subject_id=$request->class_subject_id;
        $subjectShedules->branch_id=$request->branch_id;
        $subjectShedules->teacher_id=$request->teacher_id;
        $subjectShedules->save();

        return $subjectShedules;
    }

    public function update(Request $request)
    {
        $subjectShedules=Subject_shedules::Find($request->$id);
        $subjectShedules->date_time=$request->date_time;
        $subjectShedules->duration=$request->duration;
        $subjectShedules->description=$request->description;
        $subjectShedules->class_subject_id=$request->class_subject_id;
        $subjectShedules->branch_id=$request->branch_id;
        $subjectShedules->teacher_id=$request->teacher_id;
        $subjectShedules->update();

        return $subjectShedules;
    }

    public function destroy(Request $request)
    {
        $subjectShedules=Subject_shedules::Find($request->$id);
        $subjectShedules->delete();

        return $subjectShedules;
    }

    public function index()
    {
        $subjectShedules = DB::table('subject_shedules')
                        ->select('subject_shedules.id',
                        'subject_shedules.date_time',
                        'subject_shedules.duration',
                        'subject_shedules.description',
                        'classes_subjects.id',
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
                        'teachers.id',
                        'teachers.teacher_code',
                        'teachers.teacher_first_name',
                        'teachers.teacher_sur_name',
                        'teachers.image')
                        ->join('classes_subjects', 'subject_shedules.class_subject_id', '=', 'classes_subjects.id')
                        ->join('classes', 'classes_subjects.class_id', '=', 'classes.id')
                        ->join('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                        ->join('mediums', 'subjects.medium_id', '=', 'mediums.id')
                        ->join('branches', 'subject_shedules.branch_id', '=', 'branches.id')
                        ->join('teachers', 'subject_shedules.teacher_id', '=', 'teachers.id')
                        ->get();

        return $subjectShedules;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $subjectShedules = DB::table('subject_shedules')
                        ->select('subject_shedules.id',
                        'subject_shedules.date_time',
                        'subject_shedules.duration',
                        'subject_shedules.description',
                        'classes_subjects.id',
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
                        'teachers.id',
                        'teachers.teacher_code',
                        'teachers.teacher_first_name',
                        'teachers.teacher_sur_name',
                        'teachers.image')
                        ->join('classes_subjects', 'subject_shedules.class_subject_id', '=', 'classes_subjects.id')
                        ->join('classes', 'classes_subjects.class_id', '=', 'classes.id')
                        ->join('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                        ->join('mediums', 'subjects.medium_id', '=', 'mediums.id')
                        ->join('branches', 'subject_shedules.branch_id', '=', 'branches.id')
                        ->join('teachers', 'subject_shedules.teacher_id', '=', 'teachers.id')
                        ->where('subject_shedules.id','=',$id)
                        ->get();

         return $subjectShedules;
    }
}
