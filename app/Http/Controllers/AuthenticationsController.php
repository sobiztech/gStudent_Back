<?php

namespace App\Http\Controllers;

use App\Models\Authentications;
use Illuminate\Http\Request;

class AuthenticationsController extends Controller
{
    public function store(Request $request)
    {
        $authentication=new Authentications;
        $authentication->role_id=$request->role_id;
        $authentication->authentication_key_id=$request->authentication_key_id;
        $authentication->save();

        return $authentication;
    }

    public function update(Request $request)
    {
        $authentication=Authentications::Find($request->$id);
        $authentication->role_id=$request->role_id;
        $authentication->authentication_key_id=$request->authentication_key_id;
        $authentication->update();

        return $authentication;
    }

    public function destroy(Request $request)
    {
        $authentication=Authentications::Find($request->$id);
        $authentication->delete();

        return $authentication;
    }

    public function index()
    {
        $authentication = DB::table('authentications')
                        ->select('authentications.id',
                        'roles.id',
                        'roles.role_name',
                        'authentication_keys.id',
                        'authentication_keys.name',
                        'authentication_keys.route')
                        ->join('roles', 'authentications.role_id', '=', 'roles.id')
                        ->join('authentication_keys', 'authentications.authentication_key_id', '=', 'authentication_keys.id')
                        ->get();

        return $authentication;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $authentication = DB::table('authentication_keys')
                        ->select('authentications.id',
                        'roles.id',
                        'roles.role_name',
                        'authentication_keys.id',
                        'authentication_keys.name',
                        'authentication_keys.route')
                        ->join('roles', 'authentications.role_id', '=', 'roles.id')
                        ->join('authentication_keys', 'authentications.authentication_key_id', '=', 'authentication_keys.id')
                        ->where('authentication_keys.id','=',$id)
                        ->get();

         return $authentication;
    }
}
