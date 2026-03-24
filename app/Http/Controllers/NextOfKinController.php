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

        return view('admin.next-of-kins.index', compact('items'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function edit(NextOfKin $nextOfKin)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NextOfKin  $nextOfKin
     * @return \Illuminate\Http\Response
     */
    public function destroy(NextOfKin $nextOfKin)
    {
        //
    }
}
