<?php

namespace App\Http\Controllers;

use App\Models\Teachers_branches;
use Illuminate\Http\Request;

class TeachersBranchesController extends Controller
{
    public function store(Request $request)
    {
        $teachersBranches=new Teachers_branches;
        $teachersBranches->branch_id=$request->branch_id;
        $teachersBranches->teacher_id=$request->teacher_id;
        $teachersBranches->save();

        return $teachersBranches;
    }

    public function update(Request $request)
    {
        $teachersBranches=Teachers_branches::Find($request->$id);
        $teachersBranches->branch_id=$request->branch_id;
        $teachersBranches->teacher_id=$request->teacher_id;
        $teachersBranches->update();

        return $teachersBranches;
    }

    public function destroy(Request $request)
    {
        $teachersBranches=Teachers_branches::Find($request->$id);
        $teachersBranches->delete();

        return $teachersBranches;
    }

    public function index()
    {
        $teachersBranches = DB::table('teachers_branches')
                        ->select('teachers_branches.id',
                        'branches.id',
                        'branches.branch_code',
                        'branches.branch_name',
                        'branches.description',
                        'properties.id',
                        'properties.property_code',
                        'properties.property_name',
                        'properties.description',
                        'teachers.id',
                        'teachers.teacher_code',
                        'teachers.teacher_first_name',
                        'teachers.teacher_sur_name',
                        'teachers.image')
                        ->join('branches', 'teachers_branches.branch_id', '=', 'branches.id')
                        ->join('properties', 'branches.property_id', '=', 'properties.id')
                        ->join('teachers', 'teachers_branches.teacher_id', '=', 'teachers.id')
                        ->get();

        return $teachersBranches;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $teachersBranches = DB::table('teachers_branches')
                        ->select('teachers_branches.id',
                        'branches.id',
                        'branches.branch_code',
                        'branches.branch_name',
                        'branches.description',
                        'properties.id',
                        'properties.property_code',
                        'properties.property_name',
                        'properties.description',
                        'teachers.id',
                        'teachers.teacher_code',
                        'teachers.teacher_first_name',
                        'teachers.teacher_sur_name',
                        'teachers.image')
                        ->join('branches', 'teachers_branches.branch_id', '=', 'branches.id')
                        ->join('properties', 'branches.property_id', '=', 'properties.id')
                        ->join('teachers', 'teachers_branches.teacher_id', '=', 'teachers.id')
                        ->where('teachers_branches.id','=',$id)
                        ->get();

         return $teachersBranches;
    }
}
