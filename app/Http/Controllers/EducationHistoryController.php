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

        return view('admin.education-history.index', compact('histories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $educationHistory->institution_name = $request->institution_name;
        $educationHistory->award = $request->award;
        $educationHistory->start_date = $request->start_date;
        $educationHistory->end_date = $request->end_date;
        $educationHistory->grade = $request->grade;
        $educationHistory->certificate_no = $request->certificate_no;
        $educationHistory->save();

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
        $educationHistory->delete();

        return redirect()->route('admin.education-histories.index')->with('success', 'Education history deleted successfully');
    }
}
