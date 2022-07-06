<?php

namespace App\Http\Controllers;

use App\Models\Employees;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'employee_code' => 'unique:employees,employee_code',
            'nic' => 'unique:employees,nic',
            'email' => 'unique:employees,email',
            'contact_number' => 'unique:employees,contact_number',
        );

        $customMessages = [
            'employee_code' => 'This Employee Code Already Added',
            'nic' => 'This NIC Already Added',
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

        $employees=new Employees;
        $employees->employee_code=$request->employee_code;
        $employees->employee_first_name=$request->employee_first_name;
        $employees->employee_sur_name=$request->employee_sur_name;
        $employees->nic=$request->nic;
        $employees->date_of_birth=$request->date_of_birth;
        $employees->gender=$request->gender;
        $employees->email=$request->email;
        $employees->contact_number=$request->contact_number;
        $employees->address=$request->address;
        $employees->joined_date=$request->joined_date;
        $employees->contract_end_date=$request->contract_end_date;
        $employees->image=$request->image;
        $employees->description=$request->description;
        $employees->branch_id=$request->branch_id;
        $employees->role_id=$request->role_id;
        $employees->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $employees;
    }

    public function update(Request $request)
    {
        $employees=Employees::Find($request->$id);
        $employees->employee_code=$request->employee_code;
        $employees->employee_first_name=$request->employee_first_name;
        $employees->employee_sur_name=$request->employee_sur_name;
        $employees->nic=$request->nic;
        $employees->date_of_birth=$request->date_of_birth;
        $employees->gender=$request->gender;
        $employees->email=$request->email;
        $employees->contact_number=$request->contact_number;
        $employees->address=$request->address;
        $employees->joined_date=$request->joined_date;
        $employees->contract_end_date=$request->contract_end_date;
        $employees->image=$request->image;
        $employees->description=$request->description;
        $employees->branch_id=$request->branch_id;
        $employees->role_id=$request->role_id;
        $employees->update();

        return $employees;
    }

    public function destroy(Request $request)
    {
        $employees=Employees::Find($request->$id);
        $employees->delete();

        return $employees;
    }

    public function index()
    {
        $employees = DB::table('employees')
                    ->select('employees.id',
                    'employees.employee_code',
                    'employees.employee_first_name',
                    'employees.employee_sur_name',
                    'employees.nic',
                    'employees.date_of_birth',
                    'employees.gender',
                    'employees.email',
                    'employees.contact_number',
                    'employees.address',
                    'employees.joined_date',
                    'employees.contract_end_date',
                    'employees.image',
                    'employees.description',
                    'branches.id',
                    'branches.branch_code',
                    'branches.branch_name',
                    'properties.id',
                    'properties.property_code',
                    'properties.property_name')
                    ->leftjoin('roles', 'employees.role_id', '=', 'roles.id')
                    ->leftjoin('branches', 'employees.branch_id', '=', 'branches.id')
                    ->leftjoin('properties', 'branches.property_id', '=', 'properties.id')
                    ->get();

        return $employees;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $employees = DB::table('employees')
                    ->select('employees.id',
                    'employees.employee_code',
                    'employees.employee_first_name',
                    'employees.employee_sur_name',
                    'employees.nic',
                    'employees.date_of_birth',
                    'employees.gender',
                    'employees.email',
                    'employees.contact_number',
                    'employees.address',
                    'employees.joined_date',
                    'employees.contract_end_date',
                    'employees.image',
                    'employees.description',
                    'branches.id',
                    'branches.branch_code',
                    'branches.branch_name',
                    'properties.id',
                    'properties.property_code',
                    'properties.property_name')
                    ->leftjoin('roles', 'employees.role_id', '=', 'roles.id')
                    ->leftjoin('branches', 'employees.branch_id', '=', 'branches.id')
                    ->leftjoin('properties', 'branches.property_id', '=', 'properties.id')
                    ->where('employees.id','=',$id)
                    ->get();

         return $employees;
    }
}
