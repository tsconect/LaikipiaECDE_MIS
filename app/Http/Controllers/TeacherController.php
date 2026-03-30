<?php

namespace App\Http\Controllers;

use App\Classes\SendSms;
use App\Helpers\PhoneHelper;
use App\Models\Beneficiary;
use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\EducationHistory;
use App\Models\EthnicGroup;
use App\Models\JobGroup;
use App\Models\NextOfKin;
use App\Models\Teacher;
use App\Models\TeacherEducation;
use App\Models\TeacherResidential;
use App\Models\TeacherSchoolContact;
use App\Models\TeachersUnions;
use App\Models\User;
use App\Models\UserDocument;
use App\Models\UserUnion;
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
   public function index(Request $request)
   {
       $perPage = $request->get('per_page', 50);
       $search = $request->get('search');

       $query = Teacher::with('user');

       if ($search) {
           $query->whereHas('user', function($q) use ($search) {
               $q->where('first_name', 'like', '%' . $search . '%')
                 ->orWhere('middle_name', 'like', '%' . $search . '%')
                 ->orWhere('last_name', 'like', '%' . $search . '%')
                 ->orWhere('email', 'like', '%' . $search . '%')
                 ->orWhere('phone_number', 'like', '%' . $search . '%');
           })
           ->orWhere('id_number', 'like', '%' . $search . '%')
           ->orWhere('gender', 'like', '%' . $search . '%');
       }

       $data = $query->latest()->paginate($perPage);
       return view('admin.teachers.index', compact('data'));
   }

   function create( Request $request){

        $school_id = $request->input('school_id');
        
        if (!$school_id) {
            $school_id == null;
        }


         $sub_counties =Constituency::get();
        $wards=Ward::get();
        $schools = EcdeSchools::get();
        $counties = County::get();
        $job_groups = JobGroup::all();
        $ethnicities = EthnicGroup::all();
        return view('admin.teachers.create',compact('wards','sub_counties','schools','counties', 'job_groups', 'ethnicities', 'school_id'));
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

              if ($request['dob']) {
                $dob = Carbon::parse($request['dob']);
                $retirement_date = ($request['pwd_status'] == 'yes') ? $dob->addYears(65)->toDateString() : $dob->addYears(60)->toDateString();
            } else {
                $retirement_date = null;
            }
            
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
            $teacher->terms_of_engagement=$request->terms_of_service;
            $teacher->job_group_id =$request->job_group_id;
            $teacher->contract_expiry =$request->contract_expiry;

            $teacher->ethnicity_id =$request->ethnicity_id;
            $teacher->school_id=$request->school_id;
            $teacher->pwd_status=$request->pwd_status;
            $teacher->disability_type=$request->disability_type;
            $teacher->impairment_details=$request->impairment_details;
            $teacher->pwd_number=$request->plwd_number;
            $teacher->county_id=$request->county_id;
            $teacher->subcounty_id=$request->subcounty_id;
            $teacher->ward_id=$request->ward_id;
            $teacher->school_id = $request->school_id;
            $teacher->retirement_date = $retirement_date;
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

          return redirect()->route('admin.ecde-schools.show', $teacher->school_id)->with('success', 'Teacher '. $obj->first_name .   ' Added Successfully');

    


       

       return back()->with('success', 'Teacher '. $obj->name .   ' Added Successfully');
   }



   function edit($id)
   {
    $teacher = Teacher::find($id);
    $sub_counties =Constituency::get();
        $wards=Ward::get();
        $ecde_schools = EcdeSchools::get();
        $counties = County::get();
        $job_groups = JobGroup::all();
        $ethnicities = EthnicGroup::all();
        return view('admin.teachers.edit',compact('wards','sub_counties','ecde_schools','counties', 'teacher', 'job_groups', 'ethnicities'));

   

   }

   public function update (Request $request, $id)
   {
        try{
            DB::beginTransaction();
            $characters = 'ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijklmnpqrstuvwxyz';
            $newPassword = Str::random(6, $characters);

            $teacher = Teacher::find($id);
            
            $obj = User::find($teacher->user_id);
            $obj->first_name = $request->first_name;
            $obj->middle_name = $request->middle_name;
            $obj->last_name = $request->last_name;
            $obj->email=$request->email;
            $obj->phone_number= PhoneHelper::normalizePhoneNumber($request->phone_number);
            $obj->role='Teacher';
            $obj->save();

            $obj->syncRoles('Teacher');

            if ($request['dob']) {
                $dob = Carbon::parse($request['dob']);
                $retirement_date = ($request['pwd_status'] == 'yes') ? $dob->addYears(65)->toDateString() : $dob->addYears(60)->toDateString();
            } else {
                $retirement_date = null;
            }


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
            $teacher->retirement_date = $retirement_date;
            $teacher->save();

            DB::commit();

        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
            return back()->with('error', $e->getMessage());

        }

        return redirect()->route('admin.teachers.index')->with('success', 'Teacher '. $obj->name .   ' updated Successfully');


       

       return back()->with('success', 'Teacher '. $obj->name .   ' updated Successfully');
       
   }

   function view(Teacher $id)
   {
    # code...

    $id->load('education', 'user');
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

       public function destroy(Teacher $teacher)
       {
            TeacherEducation::where('teacher_id', $teacher->id)->delete();
            TeacherSchoolContact::where('teacher_id', $teacher->id)->delete();
            TeacherResidential::where('teacher_id', $teacher->id)->delete();

            if ($teacher->user) {
                $teacher->user->delete();
            }

            $teacher->delete();

            return redirect()->route('admin.teachers.index')->with('success', 'Teacher deleted successfully');
       }

   public function show($id)
   {
       $teacher = Teacher::find($id);
       $next_of_kins = NextOfKin::where('user_id', $teacher->user_id)->latest()->get();
       $beneficiaries = Beneficiary::where('user_id', $teacher->user_id)->latest()->get();
       $unions = UserUnion::where('user_id', $teacher->user_id)->latest()->get();
       $documents = UserDocument::where('user_id', $teacher->user_id)->latest()->get();
       $academic_histories = EducationHistory::where('user_id', $teacher->user_id)->latest()->get();
       return view('admin.teachers.show', compact('teacher', 'next_of_kins', 'beneficiaries', 'unions', 'documents', 'academic_histories'));
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
        'job_group',
        //school info
        "school_name",
       
        // ------
      
        'ippd_number',
        'date_of_first_appointment',
        'terms_of_engagement',
       

    ]);

    // Add each user to the CSV
    foreach ($_ecde_teachers as $_) {
        $csv->insertOne([
            $_->id,
            $_->user->first_name . " " .$_->user->middle_name ,
            $_->user->email,
            $_->phone_number,
            $_->id_number,
            $_->kra_pin,
            $_->gender,
            $_->dob,
            $_->tsc_number,
            $_->jobGroup->name??'-',
            //school info
            $_->school->school_name??'-',
           
            // -----

            $_->ippd_number,
            $_->date_of_first_appointment,
            $_->terms_of_engagement,
           
        ]);
    }

    $filename = Carbon::now()->format('Ymd_His') . '_ecde_teachers.csv';

    return response($csv->toString(), 200, [
        'Content-Type' => 'text/csv; charset=UTF-8',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ]);
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
