<?php

namespace App\Http\Controllers;

use App\Models\Authentication_keys;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;

class AuthenticationKeysController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'route' => 'unique:authentication_keys,route',
        );

        $customMessages = [
            'route' => 'This Route Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $authenticationKeys=new Authentication_keys;
        $authenticationKeys->name=$request->name;
        $authenticationKeys->route=$request->route;
        $authenticationKeys->description=$request->description;
        $authenticationKeys->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $authenticationKeys;
    }

    public function update(Request $request)
    {
        $authenticationKeys=Authentication_keys::Find($request->$id);
        $authenticationKeys->name=$request->name;
        $authenticationKeys->route=$request->route;
        $authenticationKeys->description=$request->description;
        $authenticationKeys->update();

        return $authenticationKeys;
    }

    public function destroy(Request $request)
    {
        $authenticationKeys=Authentication_keys::Find($request->$id);
        $authenticationKeys->delete();

        return $authenticationKeys;
    }

    public function index()
    {
        $authenticationKeys = DB::table('authentication_keys')
                        ->select('authentication_keys.id',
                        'authentication_keys.name',
                        'authentication_keys.route',
                        'authentication_keys.description')
                        ->get();

        return $authenticationKeys;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $authenticationKeys = DB::table('authentication_keys')
                            ->select('authentication_keys.id',
                            'authentication_keys.name',
                            'authentication_keys.route',
                            'authentication_keys.description')
                            ->where('authentication_keys.id','=',$id)
                            ->get();

         return $authenticationKeys;
    }
}
