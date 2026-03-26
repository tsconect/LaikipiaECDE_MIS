<?php

namespace App\Http\Controllers;

use App\Models\JobGroup;
use Illuminate\Http\Request;

class JobGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $job_groups = JobGroup::latest()->get();

        return view('admin.job-groups.index', compact('job_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.job-groups.create');
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
            'name' => 'required',
        ]);

        $group = new JobGroup();
        $group->name = $request->name;

        $group->save();

        return redirect()->route('admin.job-groups.index')
            ->with('success', 'Job Group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JobGroup  $jobGroup
     * @return \Illuminate\Http\Response
     */
    public function show(JobGroup $jobGroup)
    {
        return view('admin.job-groups.edit', compact('jobGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobGroup  $jobGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(JobGroup $jobGroup)
    {
        return view('admin.job-groups.edit', compact('jobGroup'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JobGroup  $jobGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobGroup $jobGroup)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $jobGroup->name = $request->name;
        $jobGroup->save();

        return redirect()->route('admin.job-groups.index')->with('success', 'Job Group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JobGroup  $jobGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(JobGroup $jobGroup)
    {
        $jobGroup->delete();

        return redirect()->route('admin.job-groups.index')->with('success', 'Job Group deleted successfully.');
    }
}
