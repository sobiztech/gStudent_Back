<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'name' => 'unique:classes,name',
        );

        $customMessages = [
            'name' => 'This Class Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $classes=new Classes;
        $classes->name=$request->name;
        $classes->description=$request->description;
        $classes->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        //return $classes;
    }

    public function update(Request $request)
    {
        $classes=Classes::Find($request->$id);
        $classes->name=$request->name;
        $classes->description=$request->description;
        $classes->update();

        return $classes;
    }

    public function destroy(Request $request)
    {
        $classes=Classes::Find($request->$id);
        $classes->delete();

        return $classes;
    }

    public function index()
    {
        $classes = DB::table('classes')
                ->select('classes.id',
                'classes.name',
                'classes.description')
                ->get();

        return $classes;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $classes = DB::table('classes')
                ->select('classes.id',
                'classes.name',
                'classes.description')
                ->where('classes.id','=',$id)
                ->get();

         return $classes;
    }
}
