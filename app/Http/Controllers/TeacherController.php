<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Constituency;
use App\Models\EcdeSchools;
use App\Models\TeacherEducation;
use App\Models\TeacherResidential;
use App\Models\TeacherSchoolContact;
use App\Models\TeachersUnions;
use App\Models\User;
use App\Models\Wards;
use Carbon\Carbon;
use Faker\Core\File;
use Illuminate\Support\Facades\File as FacadesFile;
use Illuminate\Support\Facades\Hash;

use League\Csv\Writer;

class TeacherController extends Controller
{
   //
   public function index()
   {
       $data = Teacher::all();
       return view('backoffice.teachers.index', compact('data'));
   }

   function create(){
    $constituencies=Constituency::get();
    $wards=Wards::get();
    $ecde_schools = EcdeSchools::get();
    return view('backoffice.teachers.create',compact('wards','constituencies','ecde_schools' ));
   }

   public function store(Request $request)
   {
        // return $request;

        // $validatedData = $request->validate([
        //     'photo' => 'required|file|max:1024|mimes:jpeg,png',
        // ]);

        if($request->file('photo')){

            $photo_path = $request->file('photo')->store('uploads');
        }

        if($request->file('certificate')){
            $certificate_path = $request->file('certificate')->store('uploads');
        }


       $obj = new \App\Models\User();
       $obj->first_name = $request->first_name;
       $obj->middle_name = $request->middle_name;
       $obj->last_name = $request->last_name;
       $obj->email=$request->email;
       $obj->role='teacher';
       $obj->password=Hash::make('teacher');
       $obj->save();

       $user_id=$obj->id;
       $teacher=new \App\Models\Teacher();
       $teacher->user_id=$user_id;
       $teacher->phone=$request->phone;
       $teacher->id_number=$request->id_number;
       $teacher->kra_pin=$request->kra_pin;
       $teacher->gender=$request->gender;
       $teacher->dob=$request->dob;
       $teacher->tsc_number=$request->tsc_number;
       $teacher->next_kin_first_name=$request->next_kin_first_name;
       $teacher->next_kin_middle_name=$request->next_kin_middle_name;
       $teacher->next_kin_last_name=$request->next_kin_last_name;
       $teacher->next_kin_id_number=$request->next_kin_id_number;
       $teacher->next_kin_phone=$request->next_kin_phone;
       $teacher->next_kin_relationship=$request->next_kin_relationship;
       $teacher->next_kin_gender=$request->next_kin_gender;
       $teacher->ippd_number=$request->ippd_number;
       $teacher->ethnicity=$request->ethnicity;
       $teacher->date_of_first_appointment=$request->date_of_first_appointment;
       $teacher->terms_of_engagement=$request->terms_of_engagement;
       $teacher->job_group=$request->job_group;
       $teacher->school_id=$request->school_id;
       $teacher->image_path = basename($photo_path);
       $teacher->save();

        //add to union
        if($request->union){
            foreach($request->union as $_){
                TeachersUnions::create([
                    'teachers_id' => $teacher->id,
                    'union_id' => $_
                ]);
            }
        }


       $teacher_id=$teacher->id;

       $teacher_education=new \App\Models\TeacherEducation();
       $teacher_education->teacher_id=$teacher_id;
       $teacher_education->education_level=$request->education_level;
       $teacher_education->doc_path=basename($certificate_path);
       $teacher_education->save();

       $teacher_residential=new \App\Models\TeacherResidential();
       $teacher_residential->teacher_id=$teacher_id;
       $teacher_residential->constituency_id=$request->const_id;
       $teacher_residential->ward_id=$request->ward_id;
       $teacher_residential->Sub_location=$request->sub_location_id;
       $teacher_residential->village=$request->village;
       $teacher_residential->save();

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

    return view('backoffice.teachers.teacher_view_profile', compact('data'));

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
