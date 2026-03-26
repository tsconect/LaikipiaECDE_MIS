<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\Learner;
use App\Models\Teacher;
use App\Models\Ward;
use Illuminate\Http\Request;

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();

        

        if($user->role == 'Teacher'){
            $teacher = Teacher::where('user_id', $user->id)->first();

            if(!$teacher){
                return redirect()->back()->with('error', 'Teacher not found');
            }
            $learners = Learner::where('school_id', $teacher->school_id)->latest()->get();
        } else{
            $learners = Learner::latest()->get();
        }

        
        return view('admin.learners.index', compact('learners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $sub_counties =Constituency::get();
        $wards=Ward::get();
        $counties = County::get();
        

        $user = auth()->user();



        

    if($user->role == 'Teacher'){
        $teacher = Teacher::where('user_id', $user->id)->first();
        $ecde_schools = EcdeSchools::where('id', $teacher->school_id)->get();
    } else{
        $ecde_schools = EcdeSchools::get();
    }




    return view('admin.learners.create',compact('wards','sub_counties', 'counties', 'ecde_schools' ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
  
    $request->validate([
        'first_name' => 'required',
        'middle_name' => 'nullable',
        'last_name' => 'required',
        'pwd_status' => 'required',
        'disability_type' => 'nullable',
        'impairment_details' => 'nullable',
        'gender' => 'required',
        'dob' => 'required',
        'nemis_number' => 'required',
      
        'ward_id' => 'required',
        'sub_location_id' => 'required',
        'village' => 'required',
        'school_id' => 'required'
    ]);

    $student = new \App\Models\Learner();
    $student->first_name = $request->first_name;
    $student->middle_name = $request->middle_name;
    $student->last_name = $request->last_name;
    $student->pwd_status = $request->pwd_status;
    $student->disability_type = $request->disability_type;
    $student->impairment_details = $request->impairment_details;
    $student->gender = $request->gender;
    $student->dob = $request->dob;
    $student->nemis_number = $request->nemis_number;
    $student->student_type_id = $request->student_type_id;  
    $student->ward_id = $request->ward_id;
    $student->sub_location_id = $request->sub_location_id;
    $student->village = $request->village;
    $student->school_id = $request->school_id;

    $student->save();


   
   
    return redirect()->route('admin.learners.index')->with('success', 'leaners '. $student->name .   ' Added Successfully');

    return back()->with('success', 'leaner '. $obj->name .   ' Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function show(Learner $learner)
    {
         return view('admin.learners.show', compact('learner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function edit(Learner $learner)
    {
         $sub_counties = Constituency::get();
       $wards = Ward::get();
       $counties = County::get();
       $ecde_schools = EcdeSchools::get();

       return view('admin.learners.edit', compact('learner', 'wards', 'sub_counties', 'counties', 'ecde_schools'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Learner $learner)
    {
         $request->validate([
          'first_name' => 'required',
          'middle_name' => 'nullable',
          'last_name' => 'required',
          'pwd_status' => 'required',
          'disability_type' => 'nullable',
          'impairment_details' => 'nullable',
          'gender' => 'required',
          'dob' => 'required',

          'nemis_number' => 'required',
          'ward_id' => 'required',
          'sub_location_id' => 'required',
          'village' => 'required',
          'school_id' => 'required'
       ]);

       $learner->first_name = $request->first_name;
       $learner->middle_name = $request->middle_name;
       $learner->last_name = $request->last_name;
       $learner->pwd_status = $request->pwd_status;
       $learner->disability_type = $request->disability_type;
       $learner->impairment_details = $request->impairment_details;
       $learner->gender = $request->gender;
       $learner->dob = $request->dob;
       $learner->nemis_number = $request->nemis_number;
       $learner->student_type_id = $request->student_type_id;
       $learner->ward_id = $request->ward_id;
       $learner->sub_location_id = $request->sub_location_id;
       $learner->village = $request->village;
       $learner->school_id = $request->school_id;
       $learner->save();

       return redirect()->route('admin.learners.index')->with('success', 'learners updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Learner  $learner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Learner $learner)
    {
        $learner->delete();
       return redirect()->route('admin.learners.index')->with('success', 'learners deleted successfully');
    }
}
