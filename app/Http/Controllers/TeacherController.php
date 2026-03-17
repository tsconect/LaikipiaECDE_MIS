<?php

namespace App\Http\Controllers;

use App\Classes\SendSms;
use App\Helpers\PhoneHelper;
use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\Teacher;
use App\Models\TeacherEducation;
use App\Models\TeacherResidential;
use App\Models\TeacherSchoolContact;
use App\Models\TeachersUnions;
use App\Models\User;
use App\Models\Ward;
use App\Models\Wards;
use Carbon\Carbon;
use Faker\Core\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use League\Csv\Writer;

class TeacherController extends Controller
{
   //
   public function index()
   {
       $data = Teacher::latest()->get();
       return view('admin.teachers.index', compact('data'));
   }

   function create(){
        $sub_counties =Constituency::get();
        $wards=Ward::get();
        $ecde_schools = EcdeSchools::get();
        $counties = County::get();
    return view('admin.teachers.create',compact('wards','sub_counties','ecde_schools', 'counties')); 
   }

   public function store(Request $request)
   {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'pwd_status' => 'required',
            'disability_type' => 'nullable',
            'ethnicity_id' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'id_number' => 'required',
            'kra_pin' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            // 'tsc_number' => 'required',
            'date_of_first_appointment' => 'required',
            'terms_of_service' => 'required',
            'job_group_id' => 'required',
            'county_id' => 'required',
            'subcounty_id' => 'required',
            'ward_id' => 'required',
            // 'school_id' => 'required',
        ]);

        try{
            DB::beginTransaction();
            $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz';
            $newPassword = Str::random(6, $characters);
            
            $obj = new \App\Models\User();
            $obj->first_name = $request->first_name;
            $obj->middle_name = $request->middle_name;
            $obj->last_name = $request->last_name;
            $obj->email=$request->email;
            $obj->phone_number= PhoneHelper::normalizePhoneNumber($request->phone_number);
            $obj->role='teacher';
            $obj->password=Hash::make('teacher');
            $obj->save();

            $user_id=$obj->id;
            $teacher=new \App\Models\Teacher();
            $teacher->user_id=$user_id;
            $teacher->id_number=$request->id_number;
            $teacher->kra_pin=$request->kra_pin;
            $teacher->gender=$request->gender;
            $teacher->dob=$request->dob;
            $teacher->tsc_number=$request->tsc_number;
            $teacher->ippd_number=$request->ippd_number;
            $teacher->date_of_first_appointment=$request->date_of_first_appointment;
            $teacher->terms_of_engagement=$request->terms_of_engagement;
            $teacher->job_group_id =$request->job_group_id;

            $teacher->ethnicity_id =$request->ethnicity_id;
            $teacher->school_id=$request->school_id;
            $teacher->pwd_status=$request->pwd_status;
            $teacher->disability_type=$request->disability_type;
            $teacher->impairment_details=$request->impairment_details;
            $teacher->pwd_number=$request->pwd_number;
            $teacher->county_id=$request->county_id;
            $teacher->subcounty_id=$request->subcounty_id;
            $teacher->ward_id=$request->ward_id;
            $teacher->school_id = $request->school_id;
            $teacher->save();

            DB::commit();

            $sendSms = new SendSms();
            $message = 'Dear ' . $obj->first_name . ' ' . $obj->last_name . ' You have been successfully registered as a teacher at Ecde School Management System. Use your email and '. $newPassword .' to login and start using the system.';

            $phoneNumber = $request->phone_number;
            $statusCode = $sendSms->sendSms($phoneNumber, $message);
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
            return back()->with('error', $e->getMessage());

        }

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher '. $obj->name .   ' Added Successfully');


       

       return back()->with('success', 'Teacher '. $obj->name .   ' Added Successfully');
   }



   function edit(Teacher $id)
   {
    # code...
    return $id;

   }

   function view(Teacher $id)
   {
    # code...

    $data = $id;

    return view('admin.teachers.teacher_view_profile', compact('data'));

   }

   function delete($id)
   {
        # code...
        $teacher = Teacher::find($id);

        TeacherEducation::where('teacher_id', $teacher->id)->delete();
        TeacherSchoolContact::where('teacher_id', $teacher->id)->delete();
        TeacherResidential::where('teacher_id', $teacher->id)->delete();

        $teacher->user->delete();
        $teacher->delete();

        $data = Teacher::all();

       return redirect('admin/all-teachers')->with('info', 'Teacher deleted Successfully');

   }

   function generateStaffReturns()
   {
     # code...
     $_ecde_teachers = Teacher::all();

   // Create a new CSV writer instance
    $csv = Writer::createFromString('');

    // Add the CSV headers
    $csv->insertOne([
        'ID',
        'Name',
        'Email',
        'phone',
        'id_number',
        'kra_pin',
        'gender',
        'dob',
        'tsc_number',
        //school info
        "school_name",
        "school_contact_name",
        "school_contact_designation",
        "school_contact_phone_number",
        // ------
        'school_id',
        'ippd_number',
        'date_of_first_appointment',
        'terms_of_engagement',
        'job_group'

    ]);

    // Add each user to the CSV
    foreach ($_ecde_teachers as $_) {
        $csv->insertOne([
            $_->id,
            $_->user->first_name . " " .$_->user->middle_name ,
            $_->user->email,
            $_->phone,
            $_->id_number,
            $_->kra_pin,
            $_->gender,
            $_->dob,
            $_->tsc_number,
            //school info
            $_->school->school_name,
            $_->school->school_contact_first_name . " " . $_->school->school_contact_middle_name,
            $_->school->school_contact_designation,
            $_->school->school_contact_phone_number,
            // -----
            $_->school_id,
            $_->ippd_number,
            $_->date_of_first_appointment,
            $_->terms_of_engagement,
            $_->job_group,
        ]);
    }

    // Output the CSV to the browser
    $csv->output(Carbon::now().'_ecde_teachers.csv');
   }

   public function downloadCert()
   {
       $filename = request()->input('cert');
       // Get the path to the file
       // C:\Users\Omen 16\workspace\tsconect\cdf-fund-management\storage\app\uploads
       $path = storage_path('app\uploads\\' . $filename);

       // Check if the file exists
       if (!FacadesFile::exists($path)) {
           // abort(404);
           // dump($path);
           return "file not found";
       }

       // Set the content-type and file name
       $headers = [
           'Content-Type' => 'application/octet-stream',
           'Content-Disposition' => 'attachment; filename="' . $filename . '"',
       ];

       // Create and return the HTTP response with the file contents
       return response()->download($path, $filename, $headers);
   }


}
