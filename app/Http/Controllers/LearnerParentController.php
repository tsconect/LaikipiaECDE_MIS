<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\LearnerParent;
use Illuminate\Http\Request;

class LearnerParentController extends Controller
{
    public function create(Request $request){
        $learner_id = $request->learner_id;
        $counties = \App\Models\County::all();
                $sub_counties =Constituency::get();

        $wards = \App\Models\Ward::all();
        $sub_locations = \App\Models\SubLocation::all();
        return view('admin.learners.parents.create', compact('learner_id', 'counties', 'sub_counties', 'wards', 'sub_locations'));
    }

    public function store(Request $request){
        $familySetup = $request->family_setup; // 'both', 'father_only', 'mother_only', 'guardian_only'
        $student = \App\Models\Learner::find($request->learner_id);
       if ($familySetup === 'both') {

                // Father
                $father = new LearnerParent();
                $father->learner_id = $student->id;
                $father->first_name = $request->father_first_name;
                $father->middle_name = $request->father_middle_name;
                $father->last_name = $request->father_last_name;
                $father->relationship = 'father';
                $father->id_number = $request->father_id_number;
                $father->phone_number = $request->father_phone;
                $father->email = $request->father_email;
                $father->county_id = $request->father_county_id;
                $father->sub_county_id = $request->father_subcounty_id;
                $father->ward_id = $request->father_ward_id;
                $father->village = $request->father_village;
                $father->save();

                // Mother
                $mother = new LearnerParent();
                $mother->learner_id = $student->id;
                $mother->first_name = $request->mother_first_name;
                $mother->middle_name = $request->mother_middle_name;
                $mother->last_name = $request->mother_last_name;
                $mother->relationship = 'mother';
                $mother->id_number = $request->mother_id_number;
                $mother->phone_number = $request->mother_phone;
                $mother->email = $request->mother_email;
                $mother->county_id = $request->mother_county_id;
                $mother->sub_county_id = $request->mother_subcounty_id;
                $mother->ward_id = $request->mother_ward_id;
                $mother->village = $request->mother_village;
                $mother->save();
            }

        
            elseif ($familySetup === 'father_only') {
                $father = LearnerParent::where('learner_id', $student->id)->where('relationship', 'father')->first();

                if (!$father) {
                    $father = new LearnerParent();  
                }
                $father->learner_id = $student->id;
                $father->first_name = $request->father_first_name;
                $father->middle_name = $request->father_middle_name;
                $father->last_name = $request->father_last_name;
                $father->relationship = 'father';
                $father->id_number = $request->father_id_number;
                $father->phone_number = $request->father_phone;
                $father->email = $request->father_email;
                $father->county_id = $request->father_county_id;
                $father->sub_county_id = $request->father_subcounty_id;
                $father->ward_id = $request->father_ward_id;
                $father->village = $request->father_village;
                $father->save();
            }

           
            elseif ($familySetup === 'mother_only') {

                $mother = LearnerParent::where('learner_id', $student->id)->where('relationship', 'mother')->first();
                if (!$mother) {
                    $mother = new LearnerParent();  
                }
                $mother->learner_id = $student->id;
                $mother->first_name = $request->mother_first_name;
                $mother->middle_name = $request->mother_middle_name;
                $mother->last_name = $request->mother_last_name;
                $mother->relationship = 'mother';
                $mother->id_number = $request->mother_id_number;
                $mother->phone_number = $request->mother_phone;
                $mother->email = $request->mother_email;
                $mother->county_id = $request->mother_county_id;
                $mother->sub_county_id = $request->mother_subcounty_id;
                $mother->ward_id = $request->mother_ward_id;
                $mother->village = $request->mother_village;
                $mother->save();
            }

          
            else {

                $guardian = new LearnerParent();
                $guardian->learner_id = $student->id;
                $guardian->first_name = $request->guardian_first_name;
                $guardian->middle_name = $request->guardian_middle_name;
                $guardian->last_name = $request->guardian_last_name;
                $guardian->relationship = 'guardian';
                $guardian->id_number = $request->guardian_id_number;
                $guardian->phone_number = $request->guardian_phone;
                $guardian->email = $request->guardian_email;
                $guardian->county_id = $request->guardian_county_id;
                $guardian->sub_county_id = $request->guardian_subcounty_id;
                $guardian->ward_id = $request->guardian_ward_id;
                $guardian->village = $request->guardian_village;
                $guardian->save();
            }

            


        return redirect()->route('admin.learners.show', $student->id)->with('success', 'Parent/Guardian added successfully.');
    }
}
