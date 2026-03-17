<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\FeederSchools;
use App\Models\Teacher;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;

class FeederSchoolsController extends Controller
{
    //
    public function index()
       {
           $data = FeederSchools::latest()->get();
           return view('admin.feeder-schools.index', compact('data'));
       }
       function create(){
            $sub_counties =Constituency::get();
            $wards=Ward::get();
           
            $counties = County::get();
            $teachers = Teacher::all();
           return view('admin.feeder-schools.create',compact('wards','sub_counties', 'counties', 'teachers'));
       }


       function delete()
       {
        # code...
       }


       public function store(Request $request)
       {
          
        $request->validate([
           'school_name' => 'required',
           'number_of_classes' => 'required',
           'number_of_students' => 'required',
           'class_rooms_status' => 'required',
           'school_location' => 'required',
           'teacher_id' => 'required',
           'county_id' => 'required',
           'subcounty_id' => 'required',
           'ward_id' => 'required',
           'remarks' => 'nullable'

       ]);



           $school = New FeederSchools();
           $school->school_name = $request->school_name;
           $school->number_of_classes = $request->number_of_classes;
           $school->class_rooms_status = $request->class_rooms_status;
           $school->school_location = $request->school_location;
           $school->teacher_id = $request->teacher_id;
           $school->county_id = $request->county_id;
           $school->subcounty_id = $request->subcounty_id;
           $school->ward_id = $request->ward_id;
           $school->remarks = $request->remarks;    
           $school->save();
       
        return redirect()->route('admin.feeder-schools.index')->with('success','School Added Successfully');

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
