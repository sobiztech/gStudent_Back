<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'role_name' => 'unique:roles,role_name',
        );

        $customMessages = [
            'role_name' => 'This Role Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $roles=new Roles;
        $roles->role_name=$request->role_name;
        $roles->description=$request->description;
        $roles->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        // return $roles;
    }

    public function update(Request $request)
    {
        $roles=Roles::Find($request->$id);
        $roles->role_name=$request->role_name;
        $roles->description=$request->description;
        $roles->update();

        return $roles;
    }

    public function destroy(Request $request)
    {
        $roles=Roles::Find($request->$id);
        $roles->delete();

        return $roles;
    }

    public function index()
    {
        $roles = DB::table('roles')
            ->select('roles.id',
            'roles.role_name',
            'roles.description')
            ->get();

        return $roles;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $roles = DB::table('roles')
            ->select('roles.id',
            'roles.role_name',
            'roles.description')
            ->where('roles.id','=',$id)
            ->get();

         return $roles;
    }
}
