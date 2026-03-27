<?php

namespace App\Http\Controllers;

use App\Models\Learner;
use App\Models\LearnerAttendance;
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
        $attendances = LearnerAttendance::latest()->get();

        return view('admin.learner-attendances.index', compact('attendances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $learners = Learner::latest()->get();

        return view('admin.learner-attendances.create', compact('learners'));
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
