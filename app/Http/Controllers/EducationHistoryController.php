<?php

namespace App\Http\Controllers;

use App\Models\EducationHistory;
use Illuminate\Http\Request;

class EducationHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $histories = EducationHistory::where('user_id', auth()->user()->id)->latest()->get();

        log_user_activity(0, 'education_histories', 'index', 'User accessed the education history index page', 'admin/education-histories');

        return view('admin.education-history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log_user_activity(0, 'education_histories', 'create', 'User accessed the education history create page', 'admin/education-histories/create');
        return view('admin.education-history.create');
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
            'institution_name' => 'required',
            'award' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'certificate_no' => 'required|unique:education_histories,certificate_no',
        ]);

        $educationHistory = new EducationHistory();
        $educationHistory->user_id = auth()->user()->id;
        $educationHistory->institution_name = $request->institution_name;
        $educationHistory->award = $request->award;
        $educationHistory->start_date = $request->start_date;
        $educationHistory->end_date = $request->end_date;
        $educationHistory->grade = $request->grade;
        $educationHistory->certificate_no = $request->certificate_no;
        $educationHistory->save();

        log_user_activity($educationHistory->id, 'education_histories', 'store', 'User created a new education history: ' . $educationHistory->institution_name, url()->current(), json_encode($educationHistory));

        return redirect()->route('admin.education-histories.index')->with([
            'success' => 'Education history added successfully'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EducationHistory  $educationHistory
     * @return \Illuminate\Http\Response
     */
    public function show(EducationHistory $educationHistory)
    {
        log_user_activity($educationHistory->id, 'education_histories', 'show', 'User viewed education history with id ' . $educationHistory->id, url()->current(), json_encode($educationHistory));
        return view('admin.education-history.show', compact('educationHistory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EducationHistory  $educationHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(EducationHistory $educationHistory)
    {
        log_user_activity($educationHistory->id, 'education_histories', 'edit', 'User accessed edit page for education history: ' . $educationHistory->institution_name, 'admin/education-histories/' . $educationHistory->id . '/edit', json_encode($educationHistory));
        return view('admin.education-history.edit', compact('educationHistory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EducationHistory  $educationHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EducationHistory $educationHistory)
    {
        $request->validate([
            'institution_name' => 'required',
            'award' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'certificate_no' => 'required|unique:education_histories,certificate_no,' . $educationHistory->id,
        ]);

        $current_object = json_encode($educationHistory);

        $educationHistory->institution_name = $request->institution_name;
        $educationHistory->award = $request->award;
        $educationHistory->start_date = $request->start_date;
        $educationHistory->end_date = $request->end_date;
        $educationHistory->grade = $request->grade;
        $educationHistory->certificate_no = $request->certificate_no;
        $educationHistory->save();

        log_user_activity($educationHistory->id, 'education_histories', 'update', 'User updated education history with id ' . $educationHistory->id, url()->current(), json_encode($educationHistory), $current_object);

        return redirect()->route('admin.education-histories.index')->with('success', 'Education history updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EducationHistory  $educationHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(EducationHistory $educationHistory)
    {
        $oldHistory = json_encode($educationHistory);
        $historyId = $educationHistory->id;
        $educationHistory->delete();

        log_user_activity($historyId, 'education_histories', 'destroy', 'User deleted education history with id ' . $historyId, url()->current(), null, $oldHistory);

        return redirect()->route('admin.education-histories.index')->with('success', 'Education history deleted successfully');
    }
}
