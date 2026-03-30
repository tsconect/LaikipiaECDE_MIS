<?php

namespace App\Http\Controllers;

use App\Models\ClassRoom;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = ClassRoom::latest()->get();
        return view('admin.classrooms.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $school_id = $request->input('school_id');
        $schools = \App\Models\EcdeSchools::all();
        if (!$school_id) {
            $school_id == null;
        }

      
        return view('admin.classrooms.create', compact('school_id', 'schools'));
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
            'status' => 'required|string|max:255',
            'number_of_students' => 'required|integer',
            'description' => 'nullable|string',
            'school_id' => 'required|exists:ecde_schools,id',
        ]);

        $classRoom = new ClassRoom();
        $classRoom->name = $request->input('name');
        $classRoom->status = $request->input('status');
        $classRoom->number_of_students = $request->input('number_of_students');
        $classRoom->description = $request->input('description');
        $classRoom->school_id = $request->input('school_id');
        $classRoom->save();

        return redirect()->route('admin.ecde-schools.show', $classRoom->school_id)->with('success', 'Class Room created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ClassRoom $classRoom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy(ClassRoom $classRoom)
    {
        //
    }
}
