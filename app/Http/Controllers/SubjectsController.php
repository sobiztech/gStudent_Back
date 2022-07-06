<?php

namespace App\Http\Controllers;

use App\Models\Subjects;
use Illuminate\Http\Request;

class SubjectsController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'subject_code' => 'unique:subjects,subject_code',
            'subject_name' => 'unique:subjects,subject_name',
        );

        $customMessages = [
            'subject_code' => 'unique:subjects,subject_code',
            'subject_name' => 'unique:subjects,subject_name',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }

        $subjects=new Subjects;
        $subjects->subject_code=$request->subject_code;
        $subjects->subject_name=$request->subject_name;
        $subjects->description=$request->description;
        $subjects->medium_id=$request->medium_id;
        $subjects->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $subjects;
    }

    public function update(Request $request)
    {
        $subjects=Subjects::Find($request->$id);
        $subjects->subject_code=$request->subject_code;
        $subjects->subject_name=$request->subject_name;
        $subjects->description=$request->description;
        $subjects->medium_id=$request->medium_id;
        $subjects->update();

        return $subjects;
    }

    public function destroy(Request $request)
    {
        $subjects=Subjects::Find($request->$id);
        $subjects->delete();

        return $subjects;
    }

    public function index()
    {
        $subjects = DB::table('subjects')
                    ->select('subjects.id',
                    'subjects.id',
                    'subjects.subject_code',
                    'subjects.subject_name',
                    'subjects.description',
                    'mediums.id',
                    'mediums.medium_name' )
                    ->join('mediums', 'authentications.medium_id', '=', 'mediums.id')
                    ->get();

        return $subjects;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $subjects = DB::table('subjects')
                    ->select('subjects.id',
                    'subjects.id',
                    'subjects.subject_code',
                    'subjects.subject_name',
                    'subjects.description',
                    'mediums.id',
                    'mediums.medium_name')
                    ->join('mediums', 'authentications.medium_id', '=', 'mediums.id')
                    ->where('subjects.id','=',$id)
                    ->get();

         return $subjects;
    }
}
