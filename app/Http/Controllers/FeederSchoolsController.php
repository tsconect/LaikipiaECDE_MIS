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

      public function show(FeederSchools $feeder_school)
      {
          $school = $feeder_school;
          return view('admin.feeder-schools.show', compact('school'));
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


       public function edit(FeederSchools $feeder_school)
       {
            $sub_counties = Constituency::get();
            $wards = Ward::get();
            $counties = County::get();
            $teachers = Teacher::all();
            $school = $feeder_school;
            return view('admin.feeder-schools.edit', compact('school', 'sub_counties', 'wards', 'counties', 'teachers'));
       }

       public function update(Request $request, FeederSchools $feeder_school)
       {
            $request->validate([
                'school_name' => 'required',
                'number_of_classes' => 'required',
                'class_rooms_status' => 'required',
                'school_location' => 'nullable',
                'teacher_id' => 'nullable',
                'county_id' => 'nullable',
                'subcounty_id' => 'nullable',
                'ward_id' => 'nullable',
                'remarks' => 'nullable',
            ]);

            $feeder_school->update($request->only([
                'school_name',
                'number_of_classes',
                'number_of_students',
                'class_rooms_status',
                'school_location',
                'teacher_id',
                'county_id',
                'subcounty_id',
                'ward_id',
                'remarks',
                'school_contact_first_name',
                'school_contact_middle_name',
                'school_contact_last_name',
                'school_contact_designation',
                'school_contact_tsc_number',
                'school_contact_id_number',
                'school_contact_phone_number',
                'school_contact_gender',
            ]));

            return redirect()->route('admin.feeder-schools.index')->with('success', 'Feeder school updated successfully');
       }

       public function destroy(FeederSchools $feeder_school)
       {
            $feeder_school->delete();
            return redirect()->route('admin.feeder-schools.index')->with('success', 'Feeder school deleted successfully');
       }
}
