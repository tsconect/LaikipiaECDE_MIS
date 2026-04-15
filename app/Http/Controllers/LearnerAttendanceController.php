<?php

namespace App\Http\Controllers;

use App\Models\EcdeSchools;
use App\Models\Learner;
use App\Models\LearnerAttendance;
use App\Models\NonAttendanceDay;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LearnerAttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {
        $user = auth()->user();

        // Default dates (last 7 days → today)
        $startDate = $request->start_date ?? Carbon::now()->subDays(7)->toDateString();
        $endDate = $request->end_date ?? Carbon::now()->toDateString();

        $query = LearnerAttendance::with(['learner', 'teacher'])
            ->whereBetween('date', [$startDate, $endDate]);

        // Restrict for teacher
        if ($user->role == 'Teacher') {
            $query->where('user_id', $user->id);
        }

        $attendances = $query->latest()->get();

    
    
        $summary = $query->get()
            ->groupBy('learner_id')
            ->map(function ($records) {
                return [
                    'name' => optional($records->first()->learner)->first_name . ' ' .
                            optional($records->first()->learner)->last_name,
                    'school' =>optional($records->first()->learner)->school->school_name ?? 'N/A',

                    'present' => $records->where('status', 'present')->count(),
                    'absent' => $records->where('status', 'absent')->count(),
                ];
            });

        return view('admin.learner-attendances.index', compact(
            'attendances',
            'startDate',
            'endDate',
            'summary'
        ));
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
        $blockedDays = NonAttendanceDay::select('date', 'title')
                        ->whereNotNull('date')
                        ->get()
                        ->groupBy(fn($item) => $item->date->format('Y-m-d'));


        return view('admin.learner-attendances.create', compact('learners', 'school_id', 'schools','blockedDays'));
    }
public function blockedDates()
{
    $days = NonAttendanceDay::all();

    $result = [];

 foreach ($days as $day) {

    try {

        // 🚫 skip if missing type
        if (!isset($day->type)) {
            continue;
        }

        // ========================
        // CLASURE (range of dates)
        // ========================
        if ($day->type === 'closure') {

            if (!$day->start_date || !$day->end_date) {
                continue; // skip invalid
            }

            $start = \Carbon\Carbon::parse($day->start_date);
            $end   = \Carbon\Carbon::parse($day->end_date);

            for ($d = $start->copy(); $d->lte($end); $d->addDay()) {

                $result[$d->format('Y-m-d')] = [
                    'type'  => 'closure',
                    'title' => $day->title ?? 'Closure'
                ];
            }
        }

        // ========================
        // HOLIDAY (single date)
        // ========================
        // elseif ($day->type === 'holiday') {

        //     if (empty($day->date) || !strtotime($day->date)) {
        //         continue;
        //     }

        //     $result[$day->date] = [
        //         'type'  => 'holiday',
        //         'title' => $day->title ?? 'Holiday'
        //     ];

            
        // }

        // ========================
        // WEEKEND
        // ========================
        elseif ($day->type === 'weekend') {

            if (!$day->date) {
                continue;
            }

            $result[$day->date] = [
                'type'  => 'weekend',
                'title' => $day->title ?? 'Weekend'
            ];
        }

    } catch (\Exception $e) {
        // 🚫 silently skip broken record
        continue;
    }
}


    return response()->json($result);
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
