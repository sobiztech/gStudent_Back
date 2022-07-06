<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'email' => 'unique:users,email',
        );

        $customMessages = [
            'email' => 'This Email Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $users=new Users;
        $users->name=$request->name;
        $users->email=$request->email;
        $users->email_verified_at=$request->email_verified_at;
        $users->password=$request->password;
        $users->remember_token=$request->remember_token;
        $users->role_id=$request->role_id;
        $users->authentication_id=$request->authentication_id;
        $users->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $users;
    }

    public function update(Request $request)
    {
        $users=Users::Find($request->$id);
        $users->name=$request->name;
        $users->email=$request->email;
        $users->email_verified_at=$request->email_verified_at;
        $users->password=$request->password;
        $users->remember_token=$request->remember_token;
        $users->role_id=$request->role_id;
        $users->authentication_id=$request->authentication_id;
        $users->update();

        return $users;
    }

    public function destroy(Request $request)
    {
        $users=Users::Find($request->$id);
        $users->delete();

        return $users;
    }

    public function index()
    {
        $users = DB::table('users')
            ->select('users.id',
            'users.name',
            'users.email',
            'users.email_verified_at',
            'users.password',
            'users.remember_token',
            'authentications.id',
            'roles.id',
            'roles.role_name',
            'roles.description',
            'authentication_keys.id',
            'authentication_keys.name',
            'authentication_keys.route' )
            ->join('authentications', 'users.authentication_id', '=', 'authentications.id')
            ->join('roles', 'authentications.role_id', '=', 'roles.id')
            ->join('authentication_keys', 'authentications.authentication_key_id', '=', 'authentication_keys.id')
            ->get();

        return $authentication;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $users = DB::table('users')
            ->select('users.id',
            'users.name',
            'users.email',
            'users.email_verified_at',
            'users.password',
            'users.remember_token',
            'authentications.id',
            'roles.id',
            'roles.role_name',
            'roles.description',
            'authentication_keys.id',
            'authentication_keys.name',
            'authentication_keys.route' )
            ->join('authentications', 'users.authentication_id', '=', 'authentications.id')
            ->join('roles', 'authentications.role_id', '=', 'roles.id')
            ->join('authentication_keys', 'authentications.authentication_key_id', '=', 'authentication_keys.id')
            ->where('users.id','=',$id)
            ->get();

         return $authentication;
    }
}
