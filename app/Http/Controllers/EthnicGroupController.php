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

        log_user_activity(0, 'ethnic_groups', 'index', 'User accessed the ethnic groups index page', 'admin/ethnic-groups');

        return view('admin.ethnic-groups.index', compact('ethinic_groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log_user_activity(0, 'ethnic_groups', 'create', 'User accessed the ethnic groups create page', 'admin/ethnic-groups/create');
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

        log_user_activity($ethnicGroup->id, 'ethnic_groups', 'store', 'User created a new ethnic group: ' . $ethnicGroup->name, url()->current(), json_encode($ethnicGroup));

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
        log_user_activity($ethnicGroup->id, 'ethnic_groups', 'show', 'User viewed ethnic group with id ' . $ethnicGroup->id, url()->current(), json_encode($ethnicGroup));
        return view('admin.ethnic-groups.show', compact('ethnicGroup'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EthnicGroup $ethnicGroup)
    {
        log_user_activity($ethnicGroup->id, 'ethnic_groups', 'edit', 'User accessed edit page for ethnic group: ' . $ethnicGroup->name, 'admin/ethnic-groups/' . $ethnicGroup->id . '/edit', json_encode($ethnicGroup));
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

        $current_object = json_encode($ethnicGroup);

        $ethnicGroup->name = $request->name;
        $ethnicGroup->save();

        log_user_activity($ethnicGroup->id, 'ethnic_groups', 'update', 'User updated ethnic group with id ' . $ethnicGroup->id, url()->current(), json_encode($ethnicGroup), $current_object);

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
        $oldGroup = json_encode($ethnicGroup);
        $groupId = $ethnicGroup->id;
        $ethnicGroup->delete();

        log_user_activity($groupId, 'ethnic_groups', 'destroy', 'User deleted ethnic group with id ' . $groupId, url()->current(), null, $oldGroup);

        return redirect()->route('admin.ethnic-groups.index')->with('success', 'Ethnic group deleted successfully.');
    }
}
