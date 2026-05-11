<?php

namespace App\Http\Controllers;

use App\Models\NextOfKin;
use Illuminate\Http\Request;

class NextOfKinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = NextOfKin::where('user_id', auth()->user()->id)->latest()->get();

        log_user_activity(0, 'next_of_kins', 'index', 'User accessed the next of kins index page', 'admin/next-of-kins');

        return view('admin.next-of-kins.index', compact('items'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log_user_activity(0, 'next_of_kins', 'create', 'User accessed the next of kins create page', 'admin/next-of-kins/create');
        return view('admin.next-of-kins.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'dob' => 'required',
            'phone_number' => 'nullable',
            'email' => 'nullable',
        ]);

        $nextOfKin = new NextOfKin();
        $nextOfKin->user_id = auth()->user()->id;
        $nextOfKin->first_name = $request->first_name;
        $nextOfKin->last_name = $request->last_name;
        $nextOfKin->middle_name = $request->middle_name;
        $nextOfKin->gender = $request->gender;
        $nextOfKin->relationship = $request->relationship;
        $nextOfKin->phone_number = $request->phone_number;
        $nextOfKin->email = $request->email;
        $nextOfKin->dob = $request->dob;
        $nextOfKin->id_number = $request->id_number;
        $nextOfKin->save();

        log_user_activity($nextOfKin->id, 'next_of_kins', 'store', 'User created a new next of kin: ' . $nextOfKin->first_name . ' ' . $nextOfKin->last_name, url()->current(), json_encode($nextOfKin));

        return redirect()->route('admin.next-of-kins.index')->with('success', 'Next of Kin created successfully');
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function show(NextOfKin $nextOfKin)
    {
        log_user_activity($nextOfKin->id, 'next_of_kins', 'show', 'User viewed next of kin with id ' . $nextOfKin->id, url()->current(), json_encode($nextOfKin));
        return view('admin.next-of-kins.show', compact('nextOfKin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function edit(NextOfKin $nextOfKin)
    {
        log_user_activity($nextOfKin->id, 'next_of_kins', 'edit', 'User accessed edit page for next of kin: ' . $nextOfKin->first_name . ' ' . $nextOfKin->last_name, 'admin/next-of-kins/' . $nextOfKin->id . '/edit', json_encode($nextOfKin));
        return view('admin.next-of-kins.edit', compact('nextOfKin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, NextOfKin $nextOfKin)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'dob' => 'required',
            'phone_number' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $current_object = json_encode($nextOfKin);

        $nextOfKin->first_name = $request->first_name;
        $nextOfKin->last_name = $request->last_name;
        $nextOfKin->middle_name = $request->middle_name;
        $nextOfKin->gender = $request->gender;
        $nextOfKin->relationship = $request->relationship;
        $nextOfKin->phone_number = $request->phone_number;
        $nextOfKin->email = $request->email;
        $nextOfKin->dob = $request->dob;
        $nextOfKin->id_number = $request->id_number;
        $nextOfKin->save();

        log_user_activity($nextOfKin->id, 'next_of_kins', 'update', 'User updated next of kin with id ' . $nextOfKin->id, url()->current(), json_encode($nextOfKin), $current_object);

        return redirect()->route('admin.next-of-kins.index')->with('success', 'Next of Kin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function destroy(NextOfKin $nextOfKin)
    {
        $oldKin = json_encode($nextOfKin);
        $kinId = $nextOfKin->id;
        $nextOfKin->delete();

        log_user_activity($kinId, 'next_of_kins', 'destroy', 'User deleted next of kin with id ' . $kinId, url()->current(), null, $oldKin);

        return redirect()->route('admin.next-of-kins.index')->with('success', 'Next of Kin deleted successfully');
    }
}
