<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function store(Request $request)
    {
        $settings=new Settings;
        $settings->key_name=$request->key_name;
        $settings->key_value=$request->key_value;
        $settings->description=$request->description;
        $settings->save();

        return $settings;
    }

    public function update(Request $request)
    {
        $settings=Settings::Find($request->$id);
        $settings->key_name=$request->key_name;
        $settings->key_value=$request->key_value;
        $settings->description=$request->description;
        $settings->update();

        return $settings;
    }

    public function destroy(Request $request)
    {
        $settings=Settings::Find($request->$id);
        $settings->delete();

        return $settings;
    }

    public function index()
    {
        $settings = DB::table('settings')
                ->select('settings.id',
                'settings.key_name',
                'settings.key_value',
                'settings.description')
                ->get();

        return $settings;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $settings = DB::table('settings')
                ->select('settings.id',
                'settings.key_name',
                'settings.key_value',
                'settings.description')
                ->where('settings.id','=',$id)
                ->get();

         return $settings;
    }
}
