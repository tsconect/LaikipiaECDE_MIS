<?php

namespace App\Http\Controllers;

use App\Models\VTCDepartments;
use Illuminate\Http\Request;

class VTCDepartmentsController extends Controller
{
    //
    //
   public function index()
   {
       $data = VTCDepartments::get();
       return view('backoffice.VocationalTrainingInstitute.Departments.index', compact('data'));
   }
   function create(){
        if(request()->has('vtc')){
            $dpt = request()->has('vtc');
          return  view('backoffice.VocationalTrainingInstitute.Departments.create', compact('dpt'));
        }
        $dpt = null;
       return view('backoffice.VocationalTrainingInstitute.Departments.create', compact('dpt'));
   }

   public function store(Request $request)
   {
     $_obj = VTCDepartments::create(request()->only([
        'vtc_id' ,
        'department_name',
        'capacity' ,
        'additional_description'
     ]));

    return   back()->with('success', $_obj->department_name . ' vocational department was created successfully!');
   }

   function delete(VTCDepartments $id){
       $id->delete();

       return back()->with('warning', $id->name . ' Constituency was created successfully!' );

   }


   function edit(VTCDepartments $id)
   {
       # code...

       $data = $id;

       return view('backoffice.VocationalTrainingInstitute.edit', compact('data'));

   }

   function update(Request $request, VTCDepartments $id)
   {
       $data = $request->only(['name']);

       $id->update(['name'=> $data['name']]);

       return back()->with('success',   $id['name'] . ' Constituency was updated successfully!');
   }

   function coursesWithinVtcDPT(VTCDepartments $dpt)
   {
        # code...
        $data = $dpt->courses;
        // vtc_dpt_profile.blade
        return view('backoffice.VocationalTrainingInstitute.Departments.vtc_dpt_profile', compact('data'));

   }

}
