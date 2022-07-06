<?php

namespace App\Http\Controllers;

use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'teacher_code' => 'unique:teachers,teacher_code',
            'teacher_nic' => 'unique:teachers,teacher_nic',
            'email' => 'unique:teachers,email',
            'contact_number' => 'unique:teachers,contact_number',
        );

        $customMessages = [
            'teacher_code' => 'This Teachers Code Already Added',
            'teacher_nic' => 'This NIC Already Added',
            'email' => 'This Email Already Added',
            'contact_number' => 'This Contact Number Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $teachers=new Teachers;
        $teachers->teacher_code=$request->teacher_code;
        $teachers->teacher_first_name=$request->teacher_first_name;
        $teachers->teacher_sur_name=$request->teacher_sur_name;
        $teachers->teacher_nic=$request->teacher_nic;
        $teachers->date_of_birth=$request->date_of_birth;
        $teachers->gender=$request->gender;
        $teachers->email=$request->email;
        $teachers->contact_number=$request->contact_number;
        $teachers->address=$request->address;
        $teachers->joined_date=$request->joined_date;
        $teachers->contract_end_date=$request->contract_end_date;
        $teachers->image=$request->image;
        $teachers->description=$request->description;
        $teachers->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $teachers;
    }

    public function update(Request $request)
    {
        $teachers=Teachers::Find($request->$id);
        $teachers->teacher_code=$request->teacher_code;
        $teachers->teacher_first_name=$request->teacher_first_name;
        $teachers->teacher_sur_name=$request->teacher_sur_name;
        $teachers->teacher_nic=$request->teacher_nic;
        $teachers->date_of_birth=$request->date_of_birth;
        $teachers->gender=$request->gender;
        $teachers->email=$request->email;
        $teachers->contact_number=$request->contact_number;
        $teachers->address=$request->address;
        $teachers->joined_date=$request->joined_date;
        $teachers->contract_end_date=$request->contract_end_date;
        $teachers->image=$request->image;
        $teachers->description=$request->description;
        $teachers->update();

        return $teachers;
    }

    public function destroy(Request $request)
    {
        $teachers=Teachers::Find($request->$id);
        $teachers->delete();

        return $teachers;
    }

    public function index()
    {
        $teachers = DB::table('teachers')
                ->select('teachers.id',
                'teachers.teacher_code',
                'teachers.teacher_first_name',
                'teachers.teacher_sur_name',
                'teachers.teacher_nic',
                'teachers.date_of_birth',
                'teachers.gender',
                'teachers.email',
                'teachers.contact_number',
                'teachers.address',
                'teachers.joined_date',
                'teachers.contract_end_date',
                'teachers.image',
                'teachers.description')
                ->get();

        return $teachers;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $teachers = DB::table('teachers')
                ->select('teachers.id',
                'teachers.teacher_code',
                'teachers.teacher_first_name',
                'teachers.teacher_sur_name',
                'teachers.teacher_nic',
                'teachers.date_of_birth',
                'teachers.gender',
                'teachers.email',
                'teachers.contact_number',
                'teachers.address',
                'teachers.joined_date',
                'teachers.contract_end_date',
                'teachers.image',
                'teachers.description')
                ->where('teachers.id','=',$id)
                ->get();

         return $teachers;
    }
}
