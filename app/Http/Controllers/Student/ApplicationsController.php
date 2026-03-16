<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Students;
use App\Models\StudentApplications;
use App\Models\StudentParents;
class ApplicationsController extends Controller
{
    //

    function store(Request $request){

        $user=new Students();
        $user->plwd_number=$request->plwd_number;
        $user->name=$request->middle_name;
        $user->dob=$request->dob;
        $user->identity_number=$request->identity_number;
        $user->gender=$request->student_gender;

        $user->save();
        $student_id=$user->id;
        $application =new StudentApplications();
        $application->student_id=$student_id;
        $application->type=$request->school_type;
        $application->type=$request->school_type;
        $application->branch_name=$request->branch_name;
        $application->admission_number=$request->admission_number;
        $application->year_of_study=$request->year_of_study;
        $application->total_fees=$request->total_fees;
        $application->paid=$request->amount_paid;
        $application->balance=$request->balance;
        $application->program=$request->program;
        $application->ward_id=$request->ward_id??0;
        $application->sub_location=$request->sub_location;

        $application->ac_no=$request->ac_no;
        $application->bank=$request->bank;
        $application->tel_no=$request->tel_no;
        $application->address=$request->address;
        $application->code=$request->code;
        $application->town=$request->town;
        $application->bursary_ref=rand(1000000,10000000);

        $application->save();


        $object=new StudentParents();
        $object->student_id=$student_id;
        $object->name=$request->parent_first_name;
        $object->phone=$request->parent_phone;
        $object->id_number=$request->parent_id_number;
        $object->occupation=$request->parent_occupation;
        $object->disability_status=$request->parent_status;
        $object->annex_doc='';
        $object->other_docs='';
        $object->plwd_number=$request->plwd_number;
        $object->save();


        return back()->with('success','Application Submitted Successfully');
    }

    function applicationStatus(Request $request){

        if($request->bursary_ref==null){
            return view('bursary_status');
        }
        else{
            $student_applications=StudentApplications::where('bursary_ref',$request->bursary_ref)->first();
            if($student_applications==null){
                return back()->with('error',"No details found ");
            }
            else{
                return back()->with('data', $student_applications);
            }

        }

    }



}
