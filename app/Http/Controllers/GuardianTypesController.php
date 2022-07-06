<?php

namespace App\Http\Controllers;

use App\Models\Guardian_types;
use Illuminate\Http\Request;

class GuardianTypesController extends Controller
{
    public function store(Request $request)
    {
        $guardians=new Guardian_types;
        $guardians->guardian_type_name=$request->guardian_type_name;
        $guardians->description=$request->description;
        $guardians->save();

        return $guardians;
    }

    public function update(Request $request)
    {
        $guardians=Guardian_types::Find($request->$id);
        $guardians->guardian_type_name=$request->guardian_type_name;
        $guardians->description=$request->description;
        $guardians->update();

        return $guardians;
    }

    public function destroy(Request $request)
    {
        $guardians=Guardian_types::Find($request->$id);
        $guardians->delete();

        return $guardians;
    }

    public function index()
    {
        $guardiansTypes = DB::table('guardian_types')
                        ->select('guardian_types.id',
                        'guardian_types.guardian_type_name',
                        'guardian_types.description')
                        ->get();

        return $guardiansTypes;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $guardiansTypes = DB::table('guardian_types')
                        ->select('guardian_types.id',
                        'guardian_types.guardian_type_name',
                        'guardian_types.description')
                        ->where('guardian_types.id','=',$id)
                        ->get();

         return $guardiansTypes;
    }
}
