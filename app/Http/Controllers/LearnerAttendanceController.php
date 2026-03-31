<?php

namespace App\Http\Controllers;

use App\Models\EcdeSchools;
use App\Models\Learner;
use App\Models\LearnerAttendance;
use App\Models\Teacher;
use Illuminate\Http\Request;

class LearnerAttendanceController extends Controller
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
          
               $attendances = LearnerAttendance::where('user_id', $user->id)->latest()->get();

        } else{
               $attendances = LearnerAttendance::latest()->get();
        }
     

        return view('admin.learner-attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create( Request $request)
    {
        $user = auth()->user();
        $schools = EcdeSchools::latest()->get();

        
        if($user->role == 'Teacher'){
            $teacher = Teacher::where('user_id', $user->id)->first();

            if(!$teacher){
                return redirect()->back()->with('error', 'Teacher not found');
            }
            $learners = Learner::where('school_id', $teacher->school_id)->latest()->get();
        } else{
           
            $school_id = $request->input('school_id');
            
            if (!$school_id) {
                $school_id == null;
                $learners = Learner::latest()->get();
            } else {
                $learners = Learner::where('school_id', $school_id)->latest()->get();
            }

            

        }


        return view('admin.learner-attendances.create', compact('learners', 'school_id', 'schools'));
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
            'date' => 'required|date|before_or_equal:today'
        ]);

        $teacherId = auth()->user()->id;
        $date = $request->date;


        foreach ($request->attendance as $learnerId => $data) {

            $status = $data['status'] ?? 'absent';


            LearnerAttendance::updateOrCreate(
                [
                    'learner_id' => $learnerId,
                    'date' => $date
                ],
                [
                    'user_id' => $teacherId,
                      'status' => $status,
                'reason' => $status === 'absent' ? ($data['reason'] ?? null) : null
                ]
            );
        }

        if($request->input('school_id')){
            return redirect()->route('admin.ecde-schools.show', $request->input('school_id'))->with('success', 'Attendance saved successfully');
        }
        return redirect()->route('admin.learner-attendances.index')->with('success', 'Attendance saved successfully');

        return back()->with('success', 'Attendance saved successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LearnerAttendance  $learnerAttendance
     * @return \Illuminate\Http\Response
     */
    public function show(LearnerAttendance $learnerAttendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LearnerAttendance  $learnerAttendance
     * @return \Illuminate\Http\Response
     */
    public function edit(LearnerAttendance $learnerAttendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LearnerAttendance  $learnerAttendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LearnerAttendance $learnerAttendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LearnerAttendance  $learnerAttendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(LearnerAttendance $learnerAttendance)
    {
        //
    }
}
