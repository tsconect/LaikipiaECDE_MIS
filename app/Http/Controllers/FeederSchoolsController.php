<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\FeederSchools;
use App\Models\Wards;
use Illuminate\Http\Request;

class FeederSchoolsController extends Controller
{
    //
    public function index()
       {
           $data = FeederSchools::with('const','ward')->get();
           return view('backoffice.FeederSchools.index', compact('data'));
       }
       function create(){
        $constituencies=Constituency::get();
        $wards=Wards::get();
           return view('backoffice.FeederSchools.create',compact('wards','constituencies'));
       }


       function delete()
       {
        # code...
       }


       public function store(Request $request)
       {
           // $obj = new EcdeSchools();
           // $obj->name = $request->name;
           // $obj->constituency_id=$request->const_id;
           // $obj->ward_id=$request->ward_id;
           // $obj->save();
           // return back()->with('success','School Added Successfully');

        FeederSchools::create($request->only([
            "school_name",
            "number_of_classes",
            "class_rooms_status",
            "constituency",
            "ward",
            "school_contact_first_name",
            "school_contact_middle_name",
            "school_contact_last_name",
            "school_contact_designation",
            "school_contact_tsc_number",
            "school_contact_id_number",
            "school_contact_phone_number",
            "school_contact_gender",
            "number_of_students",
            // "number_of_teachers",
            "remarks"
        ]));

        return back()->with('success','School Added Successfully');

       }


       function editView(FeederSchools $school)
       {
        # code...
        // return $school;
        return view('backoffice.FeederSchools.edit', compact('school'));
       }

       function update(FeederSchools $school)
       {
        # code...
        // {
        //     "id": 1,
        //     "school_name": "kjnsa",
        //     "number_of_classes": "12",
        //     "class_rooms_status": "Semi_Permanent",
        //     "constituency": 1,
        //     "ward": 1,
        //     "school_contact_first_name": "WER",
        //     "school_contact_middle_name": "QWEWW",
        //     "school_contact_last_name": "QWE",
        //     "school_contact_designation": "deputy_headteacher",
        //     "school_contact_tsc_number": "WEQ",
        //     "school_contact_id_number": "1233",
        //     "school_contact_phone_number": "1232",
        //     "school_contact_gender": "female",
        //     "created_at": "2023-03-08T02:09:16.000000Z",
        //     "updated_at": "2023-03-08T02:09:16.000000Z"
        //   }

        $school->update(request()->only([
            "school_name",
            "number_of_classes",
            "class_rooms_status",
            "school_contact_first_name",
            "school_contact_middle_name",
            "school_contact_last_name",
            "school_contact_designation",
            "school_contact_tsc_number",
            "school_contact_id_number",
            "school_contact_phone_number",
            "school_contact_gender",
            "remarks"
        ]));

        return redirect(route('admin.FeederSchools.edit', $school->id))->with('success', 'school was updated');

       }
}
