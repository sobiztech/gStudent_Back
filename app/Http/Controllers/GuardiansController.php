<?php

namespace App\Http\Controllers;

use App\Models\Guardians;
use Illuminate\Http\Request;

class GuardiansController extends Controller
{
    public function store(Request $request)
    {
        $rules = array(
            'guardian_code' => 'unique:guardians,guardian_code',
            'guardian_nic' => 'unique:guardians,guardian_nic',
            'guardian_contact_number' => 'unique:guardians,guardian_contact_number',
        );

        $customMessages = [
            'guardian_code' => 'This Guardin Code Already Added',
            'guardian_nic' => 'This NIC Already Added',
            'guardian_contact_number' => 'This Contact Number Already Added',
        ];

        $validator = Validator::make($request->all(), $rules, $customMessages);

        if ($validator->fails()) {  // check back end validator
            $data = [
                'is_create' => false,
                'error' => $validator
            ];
            return $data;
        }


        $guardian=new Guardians;
        $guardian->guardian_code=$request->guardian_code;
        $guardian->guardian_name=$request->guardian_name;
        $guardian->guardian_nic=$request->guardian_nic;
        $guardian->guardian_contact_number=$request->guardian_contact_number;
        $guardian->description=$request->description;
        $guardian->save();

        $data = [
            'is_create' => true,
            'error' => []
        ];

        return $data;

        // return $guardian;
    }

    public function update(Request $request)
    {
        $guardian=Guardians::Find($request->$id);
        $guardian->guardian_code=$request->guardian_code;
        $guardian->guardian_name=$request->guardian_name;
        $guardian->guardian_nic=$request->guardian_nic;
        $guardian->guardian_contact_number=$request->guardian_contact_number;
        $guardian->description=$request->description;
        $guardian->update();

        return $guardian;
    }

    public function destroy(Request $request)
    {
        $guardian=Guardians::Find($request->$id);
        $guardian->delete();

        return $guardian;
    }

    public function index()
    {
        $guardians = DB::table('guardians')
                ->select('guardians.id',
                'guardians.guardian_code',
                'guardians.guardian_name',
                'guardians.guardian_nic',
                'guardians.guardian_contact_number',
                'guardian_types.id',
                'guardian_types.guardian_type_name' )
                ->join('guardian_types', 'guardians.guardian_type_id', '=', 'guardian_types.id')
                ->get();

        return $guardians;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $guardians = DB::table('guardians')
                ->select('guardians.id',
                'guardians.guardian_code',
                'guardians.guardian_name',
                'guardians.guardian_nic',
                'guardians.guardian_contact_number',
                'guardian_types.id',
                'guardian_types.guardian_type_name')
                ->join('guardian_types', 'guardians.guardian_type_id', '=', 'guardian_types.id')
                ->where('guardians.id','=',$id)
                ->get();

         return $guardians;
    }
}
