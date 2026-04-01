<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\EcdeSchools;
use App\Models\Learner;
use App\Models\LearnerParent;
use App\Models\Nationality;
use App\Models\SubLocation;
use App\Models\Teacher;
use App\Models\Ward;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create( Request $request)
    {
         $school_id = $request->input('school_id');
        
        if (!$school_id) {
            $school_id == null;
        }

       $sub_counties =Constituency::get();
        $wards=Ward::get();
        $counties = County::get();
        $sub_locations = SubLocation::get();
        $nationalities = Nationality::get();
        

        $user = auth()->user();



        

        if($user->role == 'Teacher'){
            $teacher = Teacher::where('user_id', $user->id)->first();
            $schools = EcdeSchools::where('id', $teacher->school_id)->get();
        } else{
            $schools = EcdeSchools::get();
        }




    return view('admin.learners.create',compact('wards','sub_counties', 'counties', 'schools', 'sub_locations', 'nationalities', 'school_id'));
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
        // 'sub_location_id' => 'required',
        'village' => 'required',
        'school_id' => 'required',
        'nationality_id' => 'required',
        'birth_certificate_number' => 'required|unique:learners,birth_certificate_number',
    ]);



       try{
            DB::beginTransaction();

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
            $student->sub_location_id = $request->sub_location_id??null;
            $student->village = $request->village;
            $student->school_id = $request->school_id;
            $student->nationality_id = $request->nationality_id;
            $student->pwd_number = $request->pwd_number;
            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = 'learners/passport-photos';
                $filePath = $request->file('photo')->store($path, 'public');
                $student->passport_photo = $filePath;
            }
            $student->admission_number = $request->admission_number;
            $student->date_of_admission = $request->date_of_admission;
            $student->class = $request->class;
            $student->mode_of_admission = $request->mode_of_admission;
            $student->birth_certificate_number = $request->birth_certificate_number;    

            $student->save();

            $parent = new LearnerParent();
            $parent->learner_id = $student->id;
            $parent->first_name = $request->parent_first_name;
            $parent->middle_name = $request->parent_middle_name;
            $parent->last_name = $request->parent_last_name;
            $parent->relationship = $request->parent_relationship;
            $parent->id_number = $request->parent_id_number;
            $parent->phone_number = $request->parent_phone_number;
            $parent->alernative_phone_number = $request->parent_alernative_phone_number;
            $parent->email = $request->parent_email;
            $parent->ward_id = $request->parent_ward_id;
            $parent->village = $request->parent_village;
            $parent->save();

            DB::commit();   

        } catch (\Exception $e) {
            DB::rollBack();
            return $e->getMessage();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }


     return redirect()->route('admin.ecde-schools.show', $student->school_id)->with('success', 'leaners '. $student->name .   ' Added Successfully');
   
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
       $sub_locations = SubLocation::get();
       $nationalities = Nationality::get();

       return view('admin.learners.edit', compact('learner', 'wards', 'sub_counties', 'counties', 'ecde_schools', 'sub_locations', 'nationalities'));
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
          'village' => 'required',
          'school_id' => 'required',
          'nationality_id' => 'required',
          'birth_certificate_number' => 'required|unique:learners,birth_certificate_number,'.$learner->id,
       ]);

       try {
            DB::beginTransaction();

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
            $learner->nationality_id = $request->nationality_id;
            $learner->pwd_number = $request->pwd_number;
            $learner->admission_number = $request->admission_number;
            $learner->date_of_admission = $request->date_of_admission;
            $learner->class = $request->class;
            $learner->mode_of_admission = $request->mode_of_admission;
            $learner->birth_certificate_number = $request->birth_certificate_number;

            if ($request->hasFile('photo')) {
                $file = $request->file('photo');
                $path = 'learners/passport-photos';
                $filePath = $request->file('photo')->store($path, 'public');
                $learner->passport_photo = $filePath;
            }

            $learner->save();

            $parent = LearnerParent::where('learner_id', $learner->id)->first();
            if (!$parent) {
                $parent = new LearnerParent();
                $parent->learner_id = $learner->id;
            }
            $parent->first_name = $request->parent_first_name;
            $parent->middle_name = $request->parent_middle_name;
            $parent->last_name = $request->parent_last_name;
            $parent->relationship = $request->parent_relationship;
            $parent->id_number = $request->parent_id_number;
            $parent->phone_number = $request->parent_phone_number;
            $parent->alernative_phone_number = $request->parent_alernative_phone_number;
            $parent->email = $request->parent_email;
            $parent->ward_id = $request->parent_ward_id;
            $parent->village = $request->parent_village;
            $parent->save();

            DB::commit();

            return redirect()->route('admin.learners.index')->with('success', 'Learner updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Error: ' . $e->getMessage());
        }
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

    public function showParent(Learner $learner)
    {
        $parent = LearnerParent::where('learner_id', $learner->id)->first();

        if (!$parent) {
            return redirect()
                ->route('admin.learners.show', $learner->id)
                ->with('error', 'No parent/guardian record found for this learner.');
        }

        return view('admin.learners.parent-show', compact('learner', 'parent'));
    }

    public function destroyParent(Learner $learner)
    {
        LearnerParent::where('learner_id', $learner->id)->delete();

        return redirect()
            ->route('admin.learners.show', $learner->id)
            ->with('success', 'Parent/Guardian removed successfully');
    }
}
