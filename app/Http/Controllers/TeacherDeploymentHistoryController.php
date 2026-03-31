<?php

namespace App\Http\Controllers;

use App\Models\EcdeSchools;
use App\Models\TeacherDeploymentHistory;
use Illuminate\Http\Request;

class TeacherDeploymentHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $deployments = TeacherDeploymentHistory::where('user_id', auth()->user()->id)->latest()->get();

        return view('admin.deployment-histories.index', compact('deployments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = EcdeSchools::all();
        return view('admin.deployment-histories.create', compact('schools'));
      
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
            'school_id' => 'required',
            // 'deployment_date' => 'required|date',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'reason' => 'nullable|string',
            'file_attachment' => 'required|file|max:2048',
        ]);

        $history = new TeacherDeploymentHistory();
        $history->user_id = auth()->user()->id;
        $history->school_id = $request->school_id;
        // $history->deployment_date = $request->deployment_date;
        $history->start_date = $request->start_date;
        $history->end_date = $request->end_date;
        $history->reason = $request->reason;

        if ($request->hasFile('file_attachment')) {
            $file = $request->file('file_attachment');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/deployment_histories', $filename);
            $history->file_attachment = 'deployment_histories/' . $filename;
        }

        $history->save();

        return redirect()->route('admin.deployment-histories.index')->with([
            'success' => 'Deployment history added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TeacherDeploymentHistory  $teacherDeploymentHistory
     * @return \Illuminate\Http\Response
     */
    public function show(TeacherDeploymentHistory $teacherDeploymentHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TeacherDeploymentHistory  $teacherDeploymentHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(TeacherDeploymentHistory $teacherDeploymentHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TeacherDeploymentHistory  $teacherDeploymentHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TeacherDeploymentHistory $teacherDeploymentHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TeacherDeploymentHistory  $teacherDeploymentHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeacherDeploymentHistory $teacherDeploymentHistory)
    {
        //
    }
}
