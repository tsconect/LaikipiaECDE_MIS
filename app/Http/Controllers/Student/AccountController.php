<?php

namespace App\Http\Controllers\Student;

use App\Models\Ward;
use App\Models\Wards;
use App\Models\County;
use GuzzleHttp\Client;
use App\Classes\SendSms;
use App\Models\Siblings;
use App\Models\SubCounty;
use App\Models\Attachment;
use App\Models\EcdeSchools;
use App\Models\Constituency;
use Illuminate\Http\Request;
use App\Models\SchoolDetails;
use App\Models\StudentParents;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use App\Models\BursaryApplications;
use App\Models\StudentApplications;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AccountController extends Controller
{
    public function dashboard()
    {
        $items = BursaryApplications::all();
        $counties = County::all();
        $student = auth()->user()->studentDetails;


 




        return view('frontend.account.dashboard', compact('items' , 'counties', 'student'));
    }

    public function details_update(Request $request)
    {

        $request->validate([
            'parental_status' => 'required|string|max:255',
            
        ]);


        try {

            DB::beginTransaction();
          

            $user = Auth::user();

            if (!$user) {
                // return redirect()->back()->with('error', 'Login to make an application');
            }

            $user = $user->studentDetails;
            $student_id = $user->id;


           

           
  

            // school details
            $schoolDetails = SchoolDetails::create([
                'student_id' => $student_id,
                'school_name' => $request->school_name,
                'level_of_study' => $request->level_of_study,
                'admission_number' => $request->admission_number,
                'school_category' => $request->school_category,
                'year_of_study' => $request->year_of_study,
                'county' => $request->school_county,
                'physical_address' => $request->physical_address,
                'contact_person' => $request->contact_person,
            ]);

            // Handle file uploads
            $fileInputs = ['attachements', 'transcript', 'national_id', 'fees_structure', 'death_certificate', 'birth_certificate'];
            foreach ($fileInputs as $input) {
                if ($request->hasFile($input)) {
                    $attachmentFile = $request->file($input);
                    $inputName = str_replace('_', ' ', ucfirst($input)); 
                    $attachmentType = $attachmentFile->getClientMimeType();
    
                    $newAttachmentName = time() . '-' . $inputName . '.' . $attachmentFile->extension();
    
                    $attachmentFile->move(public_path('attachments/student-attachments'), $newAttachmentName);
         
    
                    Attachment::create([
                        'filename' => $newAttachmentName,
                        'name' =>  $inputName ,
                        'type' => $attachmentType,
                        'student_id' => $student_id,
                    ]);
                }
            }

            // Parents details
            if($request->parental_status === "parents_alive" || $request->parental_status === "father_alive" || $request->parental_status === "single_father" || $request->parental_status === "total_orphan"  ){
                $object=new StudentParents();
                $object->student_id= $student_id;
                $object->gender = "MALE";
                $object->first_name =$request->parent_first_name;
                $object->last_name =$request->parent_last_name;
                $object->parental_status = $request->parental_status;
                $object->phone = $request->parent_phone;
                $object->parents_status = $request->parent_status;
                $object->id_number= $request->parent_id_number;
                $object->occupation =$request->parent_occupation;
                $object->disability_status = $request->parent_status;
                $object->who_pays_fees = $request->who_pays_fees;
                $object->parent_type = $request->first_parent_type;
                $object->annual_salary = $request->parent_annual_salary;
                $object->plwd_number=$request->parent_plwd_id;
                $object->save();
            }
            

            foreach ($request->sibling_name as $key => $value) {
                Siblings::create([
                    'name' => $value,
                    'gender' => $request->sibling_gender[$key],
                    'school' => $request->sibling_school[$key],
                    'fees' => $request->sibling_fees[$key],
                    'student_details_id' => $student_id,
                    'dob' => '2024-03-14',
                    'admission' => '0'
                    

                ]);
            }

            // Second parent details (if applicable)
            if($request->parental_status === "parents_alive" || $request->parental_status === "mother_alive" || $request->parental_status === "single_mother"   ){
                $object=new StudentParents();
                $object->student_id= $student_id;
                $object->gender = "FEMALE";
                $object->parental_status = $request->parental_status;
                $object->first_name =$request->second_parent_first_name;
                $object->last_name =$request->second_parent_last_name;
                $object->phone = $request->second_parent_phone;
                $object->parents_status = $request->second_parent_status;
                $object->id_number= $request->second_parent_id_number;
                $object->occupation =$request->second_parent_occupation;
                $object->disability_status = $request->second_parent_status;
                $object->who_pays_fees = $request->who_pays_fees;
                $object->parent_type = "Mother";
                $object->annual_salary = $request->second_parent_annual_salary;

                $object->plwd_number=$request->second_plwd_number;
                $object->save();
            }




         
    
            // Send SMS notification (if applicable)
            if($user->phone_number){
                $phoneNumber = $user->phone_number;   
                if (substr($phoneNumber, 0, 1) === '0') {
                    $phoneNumber = '254' . substr($phoneNumber, 1);
                }
                $name = $request->name;
                $responseStatusCodes =[];
                $sendSms = new SendSms();
                $message = "Hello ".$user->first_name.", your  profile has been updated Successfully you can now apply for open Bursaries. LAIKIPIA CDF";
    
                $statusCode = $sendSms->sendSms($phoneNumber, $message);
            
                $responseData = json_decode($statusCode, true); 
                $reason = $responseData['reason']; 
    
            }

            // Commit the transaction
     
            Auth::user()->studentDetails->update([
                'profile_status' => 'pending',
                'marital_status' => $request->marital_status,
                'religion' => $request->religion,
                'employment_status' => $request->employment_status,
                'kra_pin' => $request->kra_pin,
            ]);

            DB::commit();

            return back()->with('success', 'Profile Updated Successfully');
        } catch (\Exception $e) {
           
            DB::rollback();

            return back()->with('error', 'An error occurred. Please try again later.');
        }
    }


    public function profile_update(Request $request)
    {
            // Start a database transaction
            DB::beginTransaction();
            
            $user = Auth::user();
            
            if (!$user) {
                // Handle case where user is not logged in
            }
            
            $studentDetails = $user->studentDetails;
            
            if (!$studentDetails) {
                // Handle case where student details are not found
            }
            
            // Update school details
            $studentDetails->school->update([
                'school_name' => $request->school_name,
                'level_of_study' => $request->level_of_study,
                'admission_number' => $request->admission_number,
                'school_category' => $request->school_category,
                'year_of_study' => $request->year_of_study,
                'county' => $request->school_county,
                'physical_address' => $request->physical_address,
                'contact_person' => $request->contact_person,
            ]);
            
            // $siblings = $studentDetails->siblings;
            // foreach ($siblings as $sibling) {
            //     $sibling->update([
            //         'name' => $request->sibling_name[$sibling->id],
            //         'gender' => $request->sibling_gender[$sibling->id],
            //         'school' => $request->sibling_school[$sibling->id],
            //         'fees' => $request->sibling_fees[$sibling->id],
            //     ]);
            // }
            
            
            $parent = $studentDetails->parent;
            $parent->first()->update([
                'first_name' => $request->parent_first_name,
                'last_name' => $request->parent_last_name,
                'parental_status' => $request->parental_status,
                'phone' => $request->parent_phone,
                'parents_status' => $request->parent_status,
                'id_number' => $request->parent_id_number,
                'occupation' => $request->parent_occupation,
                'disability_status' => $request->parent_status,
                'who_pays_fees' => $request->who_pays_fees,
                'parent_type' => $request->first_parent_type,
                'annual_salary' => $request->parent_annual_salary,
                'plwd_number' => $request->parent_plwd_id,
            ]);

            if ($request->parental_status === "parents_alive") {
                $secondParent = $studentDetails->secondParent;
                if ($secondParent) {
                    $secondParent->first()->update([
                        'first_name' => $request->second_parent_first_name,
                        'last_name' => $request->second_parent_last_name,
                        'phone' => $request->second_parent_phone,
                        'parents_status' => $request->second_parent_status,
                        'id_number' => $request->second_parent_id_number,
                        'occupation' => $request->second_parent_occupation,
                        'disability_status' => $request->second_parent_status,
                        'who_pays_fees' => $request->who_pays_fees,
                        'parent_type' => "Mother", // Assuming the second parent is always a mother
                        'annual_salary' => $request->second_parent_annual_salary,
                        'plwd_number' => $request->second_plwd_number,
                    ]);
                } else {
                    StudentParents::create([
                        'student_id' => $studentDetails->id,
                        'gender' => "FEMALE",
                        'parent_status' => $request->parental_status,
                        'first_name' => $request->second_parent_first_name,
                        'last_name' => $request->second_parent_last_name,
                        'phone' => $request->second_parent_phone,
                        'parents_status' => $request->second_parent_status,
                        'id_number' => $request->second_parent_id_number,
                        'occupation' => $request->second_parent_occupation,
                        'disability_status' => $request->second_parent_status,
                        'who_pays_fees' => $request->who_pays_fees,
                        'parent_type' => "Mother", 
                        'annual_salary' => $request->second_parent_annual_salary,
                        'plwd_number' => $request->second_plwd_number,
                    ]);
                }
            }

            Auth::user()->studentDetails->update([
                'profile_status' => 'pending',
                'marital_status' => $request->marital_status,
                'religion' => $request->religion,
                'employment_status' => $request->employment_status,
                'kra_pin' => $request->kra_pin,
            ]);
            
 
            DB::commit();
            
            return back()->with('success', 'Profile Updated Successfully');

      
        
        }
    




    public function student_profile(){

        $counties = County::all();
        $student = auth()->user()->studentDetails;


        return view('frontend.account.student_profile', compact('counties', 'student'));

    }

    public function myApplications()
    {
        $user = Auth::user();
    
        // Check if the user is logged in
        if (!$user) {
            return redirect()->back()->with('error', 'Login to see your applications');
        }
    
        // Check if the user has studentDetails and applications
        if ($user->studentDetails && $user->studentDetails->applications->count() > 0) {
            $applications = $user->studentDetails->applications;
        } else {
            $applications = [];
            return view('frontend.account.applications', compact('applications'));
        }
    
        return view('frontend.account.applications', compact('applications'));
    }
    public function account(){
        return view('frontend.account.account');
    }

    public function bursary_appplication($id)
    {
  
        
        $student = auth()->user()->studentDetails;
        $application = BursaryApplications::find($id);

        if(!$student){
            return redirect()->back()->with('error', 'Please update your profile to apply for bursaries');
        }
    
        if (!$application) {
            abort(404);
        }  
        $counties = County::all();
        $subCounties = SubCounty::all();
        $wards = Ward::all();
            
  
        return view('frontend.account.bursaryapplication', compact('application','counties', 'student', 'wards',));
    }

    public function application_view($id){
   
        $application = StudentApplications::find($id);

        return view('frontend.applications.view', compact('application'));
    }

    public function update(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email', 'max:255',  Rule::unique('users')->ignore(auth()->user()->id),],
        ]);
        

        auth()->user()->update([
            'first_name' => $request->get('firstname'),
            'last_name' => $request->get('lastname'),
            'email' => $request->get('email') ,
            'phone_number' => $request->get('phone'),
            'role' => 'student',
        ]);

       

        return back()->with('success', 'Profile updated successfully');
    }



    

    public function test()
    {
        $phoneNumber = '0798985851' ;   
        if (substr($phoneNumber, 0, 1) === '0') {
            $phoneNumber = '254' . substr($phoneNumber, 1);
        }
        $responseStatusCodes =[];
        $sendSms = new SendSms();
        $message = "Hello  your cheque of Ksh has been disbursed. Contact for more information. LAIKIPIA CDF";

        $statusCode = $sendSms->sendSms($phoneNumber, $message);

        return $statusCode;
    
       
        

    }
}
