<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use App\Http\Controllers\PaymentDetailsController;
use App\Http\Controllers\GuardiansController;

class StudentsController extends Controller
{
    public function store(Request $request)
    {
        $guardian_controller = new GuardiansController;

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
        $students->save();

        $last_save_student_id=Guardians::Find($id);

        $guardian_array = [
            'guardian_code' => $request->guardian_code,
            'guardian_name' =>  $request->guardian_name,
            'guardian_nic' =>  $request->guardian_nic,
            'guardian_contact_number' => $request->guardian_contact_number,
            'description' => $request->description,
            'student_id' => $last_save_student_id,
        ];
        $guardian_controller->store($guardian_array);

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
                'branches.branch_name')
                ->join('branches', 'students.branch_id', '=', 'branches.id')
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
                'branches.branch_name')
                ->join('branches', 'students.branch_id', '=', 'branches.id')
                ->where('students.id','=',$id)
                ->get();

         return $students;
    }
}
