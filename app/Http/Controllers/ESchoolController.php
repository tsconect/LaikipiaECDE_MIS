<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\FeederSchools;
use App\Models\Learner;
use App\Models\LearnerAttendance;
use App\Models\SubLocation;
use App\Models\Teacher;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;

class ESchoolController extends Controller
{
       public function index()
       {
            $user = auth()->user();

            if($user->role == 'cordinator'){
            
                $schools = EcdeSchools::where('ward_id', $user->coordinator->ward_id)->get();
            }else{
                $schools = EcdeSchools::latest()->get();
            }

           // $schools = EcdeSchools::latest()->get();
           log_user_activity(0, 'ecde_schools', 'index', 'User accessed the ECDE schools index page', 'admin/ecde-schools');
           return view('admin.schools.index', compact('schools'));
       }
       function create(){
       
            $sub_counties =Constituency::get();
            $wards=Ward::get();
            $ecde_schools = EcdeSchools::get();
            $counties = County::get();
            $feeder_schools = FeederSchools::all();
            $teachers = Teacher::all();
            $sub_locations =SubLocation::get();
           return view('admin.schools.create',compact('wards','sub_counties','ecde_schools', 'counties','feeder_schools', 'teachers', 'sub_locations'));
       }


       function delete()
       {
        # code...
       }

       public function show(EcdeSchools $ecde_school)
       {
           log_user_activity($ecde_school->id, 'ecde_schools', 'show', 'User viewed ECDE school with id ' . $ecde_school->id, url()->current(), json_encode($ecde_school));
           $school = $ecde_school;
           $learners = Learner::where('school_id', $ecde_school->id)->get();
           $teachers = Teacher::where('school_id', $ecde_school->id)->get();
            $learnerIds = $learners->pluck('id');

            $attendances = LearnerAttendance::whereIn('learner_id', $learnerIds)->get();
             $absents = LearnerAttendance::whereIn('learner_id', $learnerIds)->where('status', 'absent')->get();
             $classrooms = ClassRoom::where('school_id', $ecde_school->id)->get();
           return view('admin.schools.show', compact('school', 'learners', 'teachers', 'attendances', 'absents', 'classrooms'));
       }


       public function store(Request $request)
       {

       $request->validate([
           'school_name' => 'required',
           'teacher_id' => 'required',
           'county_id' => 'required',
           'subcounty_id' => 'required',
           'ward_id' => 'required',
           'sub_location_id' => 'required',
           'feeder_id' => 'nullable',
           'remarks' => 'nullable',
           'center_code' => 'required'

       ]);



           $school = New EcdeSchools();
           $school->school_name = $request->school_name;
           $school->number_of_classes = $request->number_of_classes;
           $school->class_rooms_status = $request->class_rooms_status;
           $school->school_location = $request->school_location;
           $school->teacher_id = $request->teacher_id;
           $school->county_id = $request->county_id;
           $school->subcounty_id = $request->subcounty_id;
           $school->ward_id = $request->ward_id;
           $school->feeder_id = $request->feeder_id;
           $school->remarks = $request->remarks;    
           $school->center_code = $request->center_code;

           $school->save();

           log_user_activity($school->id, 'ecde_schools', 'store', 'User created a new ECDE school: ' . $school->school_name, url()->current(), json_encode($school));

           return redirect()->route('admin.ecde-schools.index')->with('success','School Added Successfully');


       

        return back()->with('success','School Added Successfully');

       }


       public function edit(EcdeSchools $ecde_school)
       {
           $sub_counties =Constituency::where('county_id','xuFdFy6t9AH')->get();
           $wards = Ward::get();
           $sub_locations = SubLocation::get();
        //    $counties = County::get();
        //    $feeder_schools = FeederSchools::all();
        //    $teachers = Teacher::all();
           $school = $ecde_school;
           log_user_activity($ecde_school->id, 'ecde_schools', 'edit', 'User accessed edit page for ECDE school: ' . $ecde_school->school_name, 'admin/ecde-schools/' . $ecde_school->id . '/edit', json_encode($ecde_school));
           return view('admin.schools.edit', compact('school', 'sub_counties', 'wards','sub_locations'));
       }

       public function update(Request $request, EcdeSchools $ecde_school)
       {
            $current_object = json_encode($ecde_school);
            $request->validate([
                'school_name' => 'required',
                // 'number_of_classes' => 'required',
                // 'class_rooms_status' => 'required',
                // 'school_location' => 'nullable',
                'teacher_id' => 'nullable',
                'county_id' => 'nullable',
                'subcounty_id' => 'nullable',
                'ward_id' => 'nullable',
                'feeder_id' => 'nullable',
                'remarks' => 'nullable',
                'center_code' => 'nullable'
            ]);

            $ecde_school->update($request->only([
                'school_name',
                'number_of_classes',
                'number_of_students',
                'class_rooms_status',
                'school_location',
                'teacher_id',
                'county_id',
                'subcounty_id',
                'ward_id',
                'feeder_id',
                'remarks',
                'school_contact_first_name',
                'school_contact_middle_name',
                'school_contact_last_name',
                'school_contact_designation',
                'school_contact_tsc_number',
                'school_contact_id_number',
                'school_contact_phone_number',
                'school_contact_gender',
                'center_code',
                'sub_location_id'
            ]));

            log_user_activity($ecde_school->id, 'ecde_schools', 'update', 'User updated ECDE school with id ' . $ecde_school->id, url()->current(), json_encode($ecde_school), $current_object);

            return redirect()->route('admin.ecde-schools.index')->with('success', 'School updated successfully');
       }

       public function destroy(EcdeSchools $ecde_school)
       {
            $oldSchool = json_encode($ecde_school);
            $schoolId = $ecde_school->id;
            $ecde_school->delete();
            log_user_activity($schoolId, 'ecde_schools', 'destroy', 'User deleted ECDE school with id ' . $schoolId, url()->current(), null, $oldSchool);
            return redirect()->route('admin.ecde-schools.index')->with('success', 'School deleted successfully');
       }

}
