<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\Students;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    //

    //
   public function index()
   {
        
        $students = Students::all();
        return view('admin.students.index', compact('students'));

   }

   function create(){
    $sub_counties =Constituency::get();
    $wards=Ward::get();
    $counties = County::get();
    $ecde_schools = EcdeSchools::get();
    return view('admin.students.create',compact('wards','sub_counties', 'counties', 'ecde_schools' ));
   }

   function store(Request $request){
    // return request();

  
    $request->validate([
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'pwd_status' => 'required',
        'disability_type' => 'nullable',
        'impairment_details' => 'nullable',
        'gender' => 'required',
        'dob' => 'required',
        'reg_no' => 'required',
        'student_type_id' => 'nullable',
        'ward_id' => 'required',
        'sub_location_id' => 'required',
        'village' => 'required',
        'school_id' => 'required'
    ]);

    $student = new \App\Models\Students();
    $student->first_name = $request->first_name;
    $student->middle_name = $request->middle_name;
    $student->last_name = $request->last_name;
    $student->pwd_status = $request->pwd_status;
    $student->disability_type = $request->disability_type;
    $student->impairment_details = $request->impairment_details;
    $student->gender = $request->gender;
    $student->dob = $request->dob;
    $student->reg_number = $request->reg_no;
    $student->student_type_id = $request->student_type_id;  
    $student->ward_id = $request->ward_id;
    $student->sub_location_id = $request->sub_location_id;
    $student->village = $request->village;
    $student->school_id = $request->school_id;

    $student->save();


   
   
    return redirect()->route('admin.ecde-students.index')->with('success', 'Student '. $student->name .   ' Added Successfully');

    return back()->with('success', 'Student '. $obj->name .   ' Added Successfully');

   }



}
