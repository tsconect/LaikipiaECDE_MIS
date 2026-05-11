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

        log_user_activity(0, 'job_groups', 'index', 'User accessed the job groups index page', 'admin/job-groups');

        return view('admin.job-groups.index', compact('job_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log_user_activity(0, 'job_groups', 'create', 'User accessed the job groups create page', 'admin/job-groups/create');
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

        log_user_activity($group->id, 'job_groups', 'store', 'User created a new job group: ' . $group->name, url()->current(), json_encode($group));

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
        log_user_activity($jobGroup->id, 'job_groups', 'show', 'User viewed job group with id ' . $jobGroup->id, url()->current(), json_encode($jobGroup));
        return view('admin.job-groups.show', compact('jobGroup'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JobGroup  $jobGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(JobGroup $jobGroup)
    {
        log_user_activity($jobGroup->id, 'job_groups', 'edit', 'User accessed edit page for job group: ' . $jobGroup->name, 'admin/job-groups/' . $jobGroup->id . '/edit', json_encode($jobGroup));
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

        $current_object = json_encode($jobGroup);

        $jobGroup->name = $request->name;
        $jobGroup->save();

        log_user_activity($jobGroup->id, 'job_groups', 'update', 'User updated job group with id ' . $jobGroup->id, url()->current(), json_encode($jobGroup), $current_object);

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
        $oldGroup = json_encode($jobGroup);
        $groupId = $jobGroup->id;
        $jobGroup->delete();

        log_user_activity($groupId, 'job_groups', 'destroy', 'User deleted job group with id ' . $groupId, url()->current(), null, $oldGroup);

        return redirect()->route('admin.job-groups.index')->with('success', 'Job Group deleted successfully.');
    }
}
