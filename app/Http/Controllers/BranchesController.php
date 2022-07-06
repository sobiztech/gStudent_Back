<?php

namespace App\Http\Controllers;

use App\Models\Branches;
use Illuminate\Http\Request;

class BranchesController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'branch_code' => 'unique:branches,branch_code',
            'branch_name' => 'unique:branches,branch_name',
        );

        $customMessages = [
            'branch_code' => 'This Branch Code Already Added',
            'branch_name' => 'This Branch Name Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $branches=new Branches;
        $branches->branch_code=$request->branch_code;
        $branches->branch_name=$request->branch_name;
        $branches->description=$request->description;
        $branches->property_id=$request->property_id;
        $branches->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $branches;
    }

    public function update(Request $request)
    {
        $branches=Branches::Find($request->$id);
        $branches->branch_code=$request->branch_code;
        $branches->branch_name=$request->branch_name;
        $branches->description=$request->description;
        $branches->property_id=$request->property_id;
        $branches->update();

        return $branches;
    }

    public function destroy(Request $request)
    {
        $branches=Branches::Find($request->$id);
        $branches->delete();

        return $branches;
    }

    public function index()
    {
        $branches = DB::table('branches')
                ->select('branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'branches.description',
                'properties.id',
                'properties.property_code',
                'properties.property_name' )
                ->join('properties', 'branches.property_id', '=', 'properties.id')
                ->get();

        return $branches;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $branches = DB::table('branches')
                ->select('branches.id',
                'branches.branch_code',
                'branches.branch_name',
                'branches.description',
                'properties.id',
                'properties.property_code',
                'properties.property_name' )
                ->join('properties', 'branches.property_id', '=', 'properties.id')
                ->where('branches.id','=',$id)
                ->get();

         return $branches;
    }
}
