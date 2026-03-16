<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\EcdeSchools;
use App\Models\Students;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    //

    //
   public function index()
   {
        // request has ecde
        if(request()->has('ecde')){
            $data = Students::where('stundent_type_id', 1)->get();
            return view('backoffice.students.ecde_student', compact('data'));
        }elseif(request()->has('vtc')){
            $data = Students::where('stundent_type_id', 2)->get();
            return view('backoffice.students.vtc_student', compact('data'));
        }

        $data = Students::all();
            return view('backoffice.students.vtc_student', compact('data'));

   }

   function create(){
    $constituencies=Constituency::get();
    $wards=Wards::get();
    $ecde_schools = EcdeSchools::get();
    return view('backoffice.students.create',compact('wards','constituencies','ecde_schools' ));
   }

   function store(Request $request){
    // return request();

    $obj = new \App\Models\User();

    $obj->first_name = $request->first_name;
    $obj->middle_name = $request->middle_name;
    $obj->last_name = $request->last_name;
    $obj->email=$request->email;
    $obj->role='student';
    $obj->password=Hash::make("student");

    $obj->save();

    $user_id=$obj->id;
    $student=new \App\Models\Students();
    $student->user_id= $user_id;
    $student->student_type_id = $request->stundent_type_id;
    //nullable
    $student->plwd_number=$request->plwd_number;
    $student->dob=$request->dob;
    $student->identity_number=$request->reg_no;
    $student->sublocation_id=$request->sub_location_id;
    $student->gender=$request->dob;
    $student->stundent_type_id = $request->stundent_type_id;
    $student->village = $request->village;
    $student->save();

    return back()->with('success', 'Student '. $obj->name .   ' Added Successfully');

   }



}
