<?php

namespace App\Http\Controllers;

use App\Models\Mediums;
use Illuminate\Http\Request;

class MediumsController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'medium_name' => 'unique:mediums,medium_name',
        );

        $customMessages = [
            'medium_name' => 'This Medium Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }


        $mediums=new Mediums;
        $mediums->medium_name=$request->medium_name;
        $mediums->description=$request->description;
        $mediums->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $mediums;
    }

    public function update(Request $request)
    {
        $mediums=Mediums::Find($request->$id);
        $mediums->medium_name=$request->medium_name;
        $mediums->description=$request->description;
        $mediums->update();

        return $mediums;
    }

    public function destroy(Request $request)
    {
        $mediums=Mediums::Find($request->$id);
        $mediums->delete();

        return $mediums;
    }

    public function index()
    {
        $mediums = DB::table('mediums')
                ->select('mediums.id',
                'mediums.medium_name',
                'mediums.description')
                ->get();

        return $mediums;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $mediums = DB::table('mediums')
                ->select('mediums.id',
                'mediums.medium_name',
                'mediums.description')
                ->where('mediums.id','=',$id)
                ->get();

         return $mediums;
    }
}
