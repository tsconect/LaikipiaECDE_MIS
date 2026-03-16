<?php

namespace App\Http\Controllers;

use App\Models\Wards;
use App\Classes\SendSms;
use App\Models\Students;
use App\Models\EcdeSchools;
use App\Models\Constituency;
use Illuminate\Http\Request;
use App\Models\StudentDetails;
use App\Models\StudentApplications;
use Illuminate\Support\Facades\Hash;

class StudentsController extends Controller
{
    

    public function index()
    {
        $data = StudentDetails::all();
        return view('backoffice.students.index', compact('data'));
    }

    public function approved_students()
    {
        $data = StudentDetails::where('profile_status', 'approved')->get();
        return view('backoffice.students.index', compact('data'));
    }

    public function pending_students()
    {
        $data = StudentDetails::where('profile_status', 'pending')->orWhere('profile_status', 'profile_incomplete')->get();
        return view('backoffice.students.index', compact('data'));
    }

    public function student_view($id){
        $student = StudentDetails::find($id);
        return view('backoffice.students.view', compact('student'));

    }

    public function approve_students($id)
    {
        $student = StudentDetails::find($id);
        return view('backoffice.students.approve', compact('student'));
    }

    public function approve_student_account(Request $request)
    {
        $request->validate([
            'status' => 'required',
            'student_id' => 'required'
        ]);

        $student = StudentDetails::find($request->student_id);

       
        if($request->status == 'approved'){
            $student->update([
                'profile_status' => $request->status,
                'comment' => $request->remark
            ]);
    
            if($student->user->phone_number){
                $phoneNumber = $student->user->phone_number;   
                if (substr($phoneNumber, 0, 1) === '0') {
                    $phoneNumber = '254' . substr($phoneNumber, 1);
                }
                $name = $request->name;
                $responseStatusCodes =[];
                $sendSms = new SendSms();
                $message = "Hello ".$student->user->first_name.", your  account has been ". $request->status .".  You can now apply for open Bursaries. LAIKIPIA CDF";
    
                $statusCode = $sendSms->sendSms($phoneNumber, $message);
            
           
    
            }
        }
        elseif($request->status == 'declined'){
            $student->update([
                'profile_status' => $request->status,
                'comment' => $request->remark
            ]);
    
            if($student->user->phone_number){
                $phoneNumber = $student->user->phone_number;   
                if (substr($phoneNumber, 0, 1) === '0') {
                    $phoneNumber = '254' . substr($phoneNumber, 1);
                }
                $name = $request->name;
                $responseStatusCodes =[];
                $sendSms = new SendSms();
                $message = "Hello ".$student->user->first_name.", your  account has been declined,  make the neccessary changes to your profile. ";
    
                $statusCode = $sendSms->sendSms($phoneNumber, $message);
            }
    
        }



     

        
        return back()->with('success','Account Reviewed Successfully'); 
     
    }




}
