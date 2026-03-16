<?php

namespace App\Http\Controllers\Student;

use App\Classes\SendSms;
use App\Models\Students;
use App\Models\Attachment;
use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\StudentParents;
use App\Models\StudentApplications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ApplicationsController extends Controller
{
    //

    function store(Request $request){
        $user = Auth::user();

        if (!$user){
            
            // return redirect()->back()->with('error', 'Login to make an application');

        }

        $student = auth()->user()->studentDetails;

        $application =new StudentApplications();
        $application->bursary_id =$request->bursary_id;
        $application->student_id=$student->id;
        $application->total_fees=$request->total_fees;
        $application->paid=$request->amount_paid;
        $application->balance=$request->balance;
        $application->additional_information= $request->additional_information;

        $application->bursary_ref=rand(1000000,10000000);

        $application->save();

       

       


        if($student->user->phone_number){
            $phoneNumber = $student->user->phone_number;   
            if (substr($phoneNumber, 0, 1) === '0') {
                $phoneNumber = '254' . substr($phoneNumber, 1);
            }
            $name = $request->name;
            $responseStatusCodes =[];
            $sendSms = new SendSms();
            $message = "Hello ".$student->user->first_name.", your  bursary application  has been received. The application is awaiting Chiefs Review. We will get back to you soon. Thank you.";

            $statusCode = $sendSms->sendSms($phoneNumber, $message);
      

        }

        return redirect()->route('student.dashboard')->with('success','Application Submitted Successfully');;


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
