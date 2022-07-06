<?php

namespace App\Http\Controllers;

use App\Models\Students_subjects;
use Illuminate\Http\Request;

class StudentsSubjectsController extends Controller
{
    public function store(Request $request)
    {
        $studentSubjects=new Students_subjects;
        $studentSubjects->classes_subjects_id=$request->classes_subjects_id;
        $studentSubjects->student_id=$request->student_id;
        $studentSubjects->save();

        return $studentSubjects;
    }

    public function update(Request $request)
    {
        $studentSubjects=Students_subjects::Find($request->$id);
        $studentSubjects->classes_subjects_id=$request->classes_subjects_id;
        $studentSubjects->student_id=$request->student_id;
        $studentSubjects->update();

        return $studentSubjects;
    }

    public function destroy(Request $request)
    {
        $studentSubjects=Students_subjects::Find($request->$id);
        $studentSubjects->delete();

        return $studentSubjects;
    }

    public function index()
    {
        $studentSubjects = DB::table('students_subjects')
                ->select('students_subjects.id',
                'classes_subjects.id',
                'classes.id',
                'classes.name',
                'subjects.id',
                'subjects.subject_code',
                'subjects.subject_name',
                'mediums.id',
                'mediums.medium_name',
                'students.id',
                'students.student_code',
                'students.student_first_name',
                'students.student_sur_name',
                'students.image',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name')
                ->join('classes_subjects', 'students_subjects.classes_subjects_id', '=', 'classes_subjects.id')
                ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                ->join('students', 'students_subjects.student_id', '=', 'students.id')
                ->join('branches', 'students.branch_id', '=', 'branches.id')
                ->get();

        return $studentSubjects;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $studentSubjects = DB::table('students_subjects')
                    ->select('students_subjects.id',
                    'classes_subjects.id',
                    'classes.id',
                    'classes.name',
                    'subjects.id',
                    'subjects.subject_code',
                    'subjects.subject_name',
                    'mediums.id',
                    'mediums.medium_name',
                    'students.id',
                    'students.student_code',
                    'students.student_first_name',
                    'students.student_sur_name',
                    'students.image',
                    'branches.id',
                    'branches.branch_code',
                    'branches.branch_name')
                    ->join('classes_subjects', 'students_subjects.classes_subjects_id', '=', 'classes_subjects.id')
                    ->leftjoin('classes', 'classes_subjects.class_id', '=', 'classes.id')
                    ->leftjoin('subjects', 'classes_subjects.subject_id', '=', 'subjects.id')
                    ->leftjoin('mediums', 'subjects.medium_id', '=', 'mediums.id')
                    ->join('students', 'students_subjects.student_id', '=', 'students.id')
                    ->join('branches', 'students.branch_id', '=', 'branches.id')
                    ->where('students_subjects.id','=',$id)
                    ->get();

         return $studentSubjects;
    }
}
