<?php

namespace App\Http\Controllers;

use App\Classes\SendSms;
use App\Helpers\PhoneHelper;
use App\Models\Constituency;
use App\Models\Coordinators;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\SchoolCordination;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CoordinatorsController extends Controller
{
    //

    //
   public function index()
   {
       $coordinators = Coordinators::with(['user', 'constituency'])->latest()->paginate(15);
       return view('admin.coordinators.index', compact('coordinators'));
   }
   function create(){
    $sub_counties =Constituency::get();
        $wards=Ward::get();
        $ecde_schools = EcdeSchools::get();
        $counties = County::get();
    return view('admin.coordinators.create',compact('wards','sub_counties','ecde_schools','counties'));
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
            $obj->role='cordinator';
            $obj->password=Hash::make($newPassword);
            $obj->save();

            $user_id=$obj->id;
            $teacher=new \App\Models\Coordinators();
            $teacher->user_id=$user_id;
            $teacher->id_number=$request->id_number;
            $teacher->kra_pin=$request->kra_pin;
            $teacher->gender=$request->gender;
            $teacher->dob=$request->dob;
           
        

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
            $message = 'Dear ' . $obj->first_name . ' ' . $obj->last_name . ' You have been successfully registered as a cordinator at Ecde School Management System. Use your email and '. $newPassword .' to login and start using the system.';

            $phoneNumber = $request->phone_number;
            $statusCode = $sendSms->sendSms($phoneNumber, $message);
        }catch(\Exception $e){
            DB::rollBack();
            return $e->getMessage();
            return back()->with('error', $e->getMessage());

        }

        return redirect()->route('admin.coordinators.index')->with('success', 'Coordinator '. $obj->name .   ' Added Successfully');


       

       return back()->with('success', 'Teacher '. $obj->name .   ' Added Successfully');
   }


   function edit($id)
   {
    $coordinator = Coordinators::findOrFail($id);
    $sub_counties = Constituency::get();
    $wards = Ward::get();
    $ecde_schools = EcdeSchools::get();
    $counties = County::get();

    return view('admin.coordinators.edit', compact('coordinator', 'wards', 'sub_counties', 'ecde_schools', 'counties'));

   }

   public function show(Coordinators $coordinator)
   {
    $coordinator->load('education', 'user', 'resident.const', 'resident.ward', 'school_contact');
    return view('admin.coordinators.teacher_view_profile', ['data' => $coordinator]);
   }

   public function update(Request $request, Coordinators $coordinator)
   {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'required',
            'pwd_status' => 'required',
            'disability_type' => 'nullable',
            'ethnicity_id' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'id_number' => 'required',
            'kra_pin' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'county_id' => 'required',
            'subcounty_id' => 'required',
            'ward_id' => 'required',
            'school_id' => 'nullable',
        ]);

        DB::beginTransaction();
        try {
            $user = $coordinator->user;
            if ($user) {
                $user->first_name = $request->first_name;
                $user->middle_name = $request->middle_name;
                $user->last_name = $request->last_name;
                $user->email = $request->email;
                $user->phone_number = PhoneHelper::normalizePhoneNumber($request->phone_number);
                $user->role = 'cordinator';
                $user->save();
            }

            $coordinator->update([
                'id_number' => $request->id_number,
                'kra_pin' => $request->kra_pin,
                'gender' => $request->gender,
                'dob' => $request->dob,
                'ethnicity_id' => $request->ethnicity_id,
                'school_id' => $request->school_id,
                'pwd_status' => $request->pwd_status,
                'disability_type' => $request->disability_type,
                'impairment_details' => $request->impairment_details,
                'pwd_number' => $request->pwd_number,
                'county_id' => $request->county_id,
                'subcounty_id' => $request->subcounty_id,
                'ward_id' => $request->ward_id,
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return back()->with('error', $th->getMessage());
        }

        return redirect()->route('admin.coordinators.index')->with('success', 'Coordinator updated successfully');
   }

   function view(Coordinators $id)
   {
    # code...

    $data = $id;

    return view('backoffice.coordinators.teacher_view_profile', compact('data'));

   }

   function delete($id)
   {
    //     # code...
    // //     $teacher = Coordinators::find($id);

    // //     TeacherEducation::where('teacher_id', $teacher->id)->delete();
    // //     TeacherSchoolContact::where('teacher_id', $teacher->id)->delete();
    // //     TeacherResidential::where('teacher_id', $teacher->id)->delete();

    // //     $teacher->user->delete();
    // //     $teacher->delete();

    // //     $data = Teacher::all();

    // //    return redirect('admin/all-teachers')->with('info', 'Teacher deleted Successfully');

   }

   public function destroy(Coordinators $coordinator)
   {
        if ($coordinator->user) {
            $coordinator->user->delete();
        }
        $coordinator->delete();

        return redirect()->route('admin.coordinators.index')->with('success', 'Coordinator deleted successfully');
   }

}
