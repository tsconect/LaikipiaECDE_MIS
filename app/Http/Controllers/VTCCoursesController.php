<?php

namespace App\Http\Controllers;

use App\Models\VTC;
use App\Models\VTCCourses;
use App\Models\VTCDepartments;
use Illuminate\Http\Request;

class VTCCoursesController extends Controller
{
   //
    //
    public function index()
    {
        $data = VTCCourses::get();
        return view('backoffice.VocationalTrainingInstitute.Departments.Courses.index', compact('data'));
    }
    function create(){
        $dpt = request()->input('dpt');
        if(request()->has('dpt')){
           return view('backoffice.VocationalTrainingInstitute.Departments.Courses.create', compact('dpt'));
        }



        return view('backoffice.VocationalTrainingInstitute.Departments.Courses.create', compact('dpt'));

    }

    public function store(Request $request)
    {
        // vtc
        $_data = request()->only([
            "vtc_id",
            "vtc_dpt_id",
            'course_name',
            "duration",
            'capacity',
            'registration_code',
            'examination_body_or_creteria',
            'addtional_description',
            'name',
        ]);

        $_data['vtc_id'] = VTCDepartments::find(request()->vtc_dpt_id)->vtc_id;
        $_data['vtc_dpt_id'] = request()->vtc_dpt_id;

        $_obj =  VTCCourses::create($_data);


        return   back()->with('success', $_obj->department_name . ' vocational course was created successfully!');
    }

    function delete( VTCCourses $id){
        $id->delete();

        return back()->with('warning', $id->name . ' Constituency was created successfully!' );

    }


    function edit( VTCCourses $id)
    {
        # code...

        $data = $id;

        return view('backoffice.VocationalTrainingInstitute.Courses.edit', compact('data'));

    }

    function update(Request $request,  VTCCourses $id)
    {
        $data = $request->only(['name']);

        // $id->update(['=> $data['name']]);

        return back()->with('success',   $id['name'] . ' Constituency was updated successfully!');
    }
}
