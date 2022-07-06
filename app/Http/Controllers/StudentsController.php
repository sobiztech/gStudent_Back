<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'student_code' => 'unique:students,student_code',
            'student_nic' => 'unique:students,student_nic',
            'email' => 'unique:students,email',
            'contact_number' => 'unique:students,contact_number',
        );

        $customMessages = [
            'student_code' => 'This Student Code Already Added',
            'student_nic' => 'This NIC Already Added',
            'email' => 'This Email Already Added',
            'contact_number' => 'This contact_number Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $students=new Students;
        $students->student_code=$request->student_code;
        $students->student_first_name=$request->student_first_name;
        $students->student_sur_name=$request->student_sur_name;
        $students->student_nic=$request->student_nic;
        $students->date_of_birth=$request->date_of_birth;
        $students->gender=$request->gender;
        $students->email=$request->email;
        $students->contact_number=$request->contact_number;
        $students->address=$request->address;
        $students->joined_date=$request->joined_date;
        $students->image=$request->image;
        $students->description=$request->description;
        $students->branch_id=$request->branch_id;
        $students->guardian_id=$request->guardian_id;
        $students->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $students;
    }

    public function update(Request $request)
    {
        $students=Students::Find($request->$id);
        $students->student_code=$request->student_code;
        $students->student_first_name=$request->student_first_name;
        $students->student_sur_name=$request->student_sur_name;
        $students->student_nic=$request->student_nic;
        $students->date_of_birth=$request->date_of_birth;
        $students->gender=$request->gender;
        $students->email=$request->email;
        $students->contact_number=$request->contact_number;
        $students->address=$request->address;
        $students->joined_date=$request->joined_date;
        $students->image=$request->image;
        $students->description=$request->description;
        $students->branch_id=$request->branch_id;
        $students->guardian_id=$request->guardian_id;
        $students->update();

        return $students;
    }

    public function destroy(Request $request)
    {
        $students=Students::Find($request->$id);
        $students->delete();

        return $students;
    }

    public function index()
    {
        $students = DB::table('students')
                ->select('students.id',
                'students.student_code',
                'students.student_first_name',
                'students.student_sur_name',
                'students.student_nic',
                'students.date_of_birth',
                'students.email',
                'students.contact_number',
                'students.address',
                'students.joined_date',
                'students.image',
                'students.description',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'guardians.id',
                'guardians.guardian_code',
                'guardians.guardian_name',
                'guardians.guardian_contact_number',
                'guardian_types.id',
                'guardian_types.guardian_type_name')
                ->join('branches', 'students.branch_id', '=', 'branches.id')
                ->join('guardians', 'students.guardian_id', '=', 'guardians.id')
                ->join('guardian_types', 'guardians.guardian_type_id', '=', 'guardian_types.id')
                ->get();

        return $students;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $students = DB::table('students')
                ->select('students.id',
                'students.student_code',
                'students.student_first_name',
                'students.student_sur_name',
                'students.student_nic',
                'students.date_of_birth',
                'students.email',
                'students.contact_number',
                'students.address',
                'students.joined_date',
                'students.image',
                'students.description',
                'branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'guardians.id',
                'guardians.guardian_code',
                'guardians.guardian_name',
                'guardians.guardian_contact_number',
                'guardian_types.id',
                'guardian_types.guardian_type_name')
                ->join('branches', 'students.branch_id', '=', 'branches.id')
                ->join('guardians', 'students.guardian_id', '=', 'guardians.id')
                ->join('guardian_types', 'guardians.guardian_type_id', '=', 'guardian_types.id')
                ->where('students.id','=',$id)
                ->get();

         return $students;
    }
}
