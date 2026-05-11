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
       log_user_activity(0, 'vtc_departments', 'index', 'User accessed the VTC departments index page', 'admin/vtc-departments');
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

    log_user_activity($_obj->id, 'vtc_departments', 'store', 'User created a new VTC department: ' . $_obj->department_name, url()->current(), json_encode($_obj));

    return   back()->with('success', $_obj->department_name . ' vocational department was created successfully!');
   }

   function delete(VTCDepartments $id){
       $id->delete();

       return back()->with('warning', $id->name . ' Constituency was created successfully!' );

   }


   function edit(VTCDepartments $id)
   {
       $data = $id;

       log_user_activity($id->id, 'vtc_departments', 'edit', 'User accessed edit page for VTC department: ' . $id->department_name, 'admin/vtc-departments/' . $id->id . '/edit', json_encode($id));

       return view('backoffice.VocationalTrainingInstitute.edit', compact('data'));

   }

   function update(Request $request, VTCDepartments $id)
   {
       $current_object = json_encode($id);
       $data = $request->only(['name']);

       $id->update(['name'=> $data['name']]);

       log_user_activity($id->id, 'vtc_departments', 'update', 'User updated VTC department with id ' . $id->id, url()->current(), json_encode($id), $current_object);

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
