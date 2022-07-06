<?php

namespace App\Http\Controllers;

use App\Models\Properties;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'property_code' => 'unique:properties,property_code',
        );

        $customMessages = [
            'property_code' => 'This Property Code Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $properties=new Properties;
        $properties->property_code=$request->property_code;
        $properties->property_name=$request->property_name;
        $properties->description=$request->description;
        $properties->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $properties;
    }

    public function update(Request $request)
    {
        $properties=Properties::Find($request->$id);
        $properties->property_code=$request->property_code;
        $properties->property_name=$request->property_name;
        $properties->description=$request->description;
        $properties->update();

        return $properties;
    }

    public function destroy(Request $request)
    {
        $properties=Properties::Find($request->$id);
        $properties->delete();
    }

    public function index()
    {
        $properties = DB::table('properties')
                ->select('properties.id',
                'properties.property_code',
                'properties.property_name',
                'properties.description')
                ->get();

        return $properties;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $properties = DB::table('properties')
                ->select('properties.id',
                'properties.property_code',
                'properties.property_name',
                'properties.description')
                ->where('properties.id','=',$id)
                ->get();

         return $properties;
    }
}
