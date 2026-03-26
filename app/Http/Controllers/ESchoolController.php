<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\FeederSchools;
use App\Models\Teacher;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;

class ESchoolController extends Controller
{
       public function index()
       {
            
           $schools = EcdeSchools::latest()->get();
           return view('admin.schools.index', compact('schools'));
       }
       function create(){
       
            $sub_counties =Constituency::get();
            $wards=Ward::get();
            $ecde_schools = EcdeSchools::get();
            $counties = County::get();
            $feeder_schools = FeederSchools::all();
            $teachers = Teacher::all();
           return view('admin.schools.create',compact('wards','sub_counties','ecde_schools', 'counties','feeder_schools', 'teachers'));
       }


       function delete()
       {
        # code...
       }

       public function show(EcdeSchools $ecde_school)
       {
           $school = $ecde_school;
           return view('admin.schools.show', compact('school'));
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
           'feeder_id' => 'nullable',
           'remarks' => 'nullable'

       ]);



           $school = New EcdeSchools();
           $school->school_name = $request->school_name;
           $school->number_of_classes = $request->number_of_classes;
           $school->class_rooms_status = $request->class_rooms_status;
           $school->school_location = $request->school_location;
           $school->teacher_id = $request->teacher_id;
           $school->county_id = $request->county_id;
           $school->subcounty_id = $request->subcounty_id;
           $school->ward_id = $request->ward_id;
           $school->feeder_id = $request->feeder_id;
           $school->remarks = $request->remarks;    

           $school->save();

           return redirect()->route('admin.ecde-schools.index')->with('success','School Added Successfully');


       

        return back()->with('success','School Added Successfully');

       }


       public function edit(EcdeSchools $ecde_school)
       {
           $sub_counties = Constituency::get();
           $wards = Ward::get();
           $counties = County::get();
           $feeder_schools = FeederSchools::all();
           $teachers = Teacher::all();
           $school = $ecde_school;
           return view('admin.schools.edit', compact('school', 'sub_counties', 'wards', 'counties', 'feeder_schools', 'teachers'));
       }

       public function update(Request $request, EcdeSchools $ecde_school)
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
                'feeder_id' => 'nullable',
                'remarks' => 'nullable',
            ]);

            $ecde_school->update($request->only([
                'school_name',
                'number_of_classes',
                'number_of_students',
                'class_rooms_status',
                'school_location',
                'teacher_id',
                'county_id',
                'subcounty_id',
                'ward_id',
                'feeder_id',
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

            return redirect()->route('admin.ecde-schools.index')->with('success', 'School updated successfully');
       }

       public function destroy(EcdeSchools $ecde_school)
       {
            $ecde_school->delete();
            return redirect()->route('admin.ecde-schools.index')->with('success', 'School deleted successfully');
       }

}
