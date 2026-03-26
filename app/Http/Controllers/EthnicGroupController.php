<?php

namespace App\Http\Controllers;

use App\Models\EthnicGroup;
use Illuminate\Http\Request;

class EthnicGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ethinic_groups = EthnicGroup::latest()->get();

        return view('admin.ethnic-groups.index', compact('ethinic_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ethnic-groups.create');
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
            'name' => 'required|string|max:255',
        ]);

        $ethnicGroup = new EthnicGroup();
        $ethnicGroup->name = $request->name;
        $ethnicGroup->save();

        return redirect()->route('admin.ethnic-groups.index')->with('success', 'Ethnic group created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EthnicGroup $ethnicGroup)
    {
        return view('admin.ethnic-groups.edit', compact('ethnicGroup'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EthnicGroup $ethnicGroup)
    {
        return view('admin.ethnic-groups.edit', compact('ethnicGroup'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EthnicGroup $ethnicGroup)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $ethnicGroup->name = $request->name;
        $ethnicGroup->save();

        return redirect()->route('admin.ethnic-groups.index')->with('success', 'Ethnic group updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(EthnicGroup $ethnicGroup)
    {
        $ethnicGroup->delete();

        return redirect()->route('admin.ethnic-groups.index')->with('success', 'Ethnic group deleted successfully.');
    }
}
