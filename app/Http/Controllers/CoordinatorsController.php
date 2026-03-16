<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\Coordinators;
use App\Models\EcdeSchools;
use App\Models\SchoolCordination;
use App\Models\Wards;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CoordinatorsController extends Controller
{
    //

    //
   public function index()
   {
       $data = Coordinators::all();
       return view('backoffice.coordinators.index', compact('data'));
   }
   function create(){
    $constituencies=Constituency::get();
    $wards=Wards::get();
    $ecde_schools = EcdeSchools::get();
    return view('backoffice.coordinators.create',compact('wards','constituencies','ecde_schools' ));
   }

   public function store()
   {
    return request();

    // 'plwd_number',
    //'email',
    // 'phone',
    //
        $_cordinator = Coordinators::create(request()->only([
            'first_name',
            'middle_name',
            'last_name',
            "email",
            'disability_status',
            'id_number',
            'kra_pin',
            'gender',
            'photo',
            'phone_no',
            'education_level',
            'level_of_education_attachment',
            'sub_location_id'
        ]));

        SchoolCordination::create([
            'school_id' => request()->input('school_id'),
            'coordinator' => $_cordinator->id
        ]);


        return back()->with('success', 'coordinator created succes fully');
   }

   function edit(Coordinators $id)
   {
    # code...
    return $id;

   }

   function view(Coordinators $id)
   {
    # code...

    $data = $id;

    return view('backoffice.coordinators.teacher_view_profile', compact('data'));

   }

   function delete($id)
   {
    //     # code...
    // //     $teacher = Coordinators::find($id);

    // //     TeacherEducation::where('teacher_id', $teacher->id)->delete();
    // //     TeacherSchoolContact::where('teacher_id', $teacher->id)->delete();
    // //     TeacherResidential::where('teacher_id', $teacher->id)->delete();

    // //     $teacher->user->delete();
    // //     $teacher->delete();

    // //     $data = Teacher::all();

    // //    return redirect('admin/all-teachers')->with('info', 'Teacher deleted Successfully');

   }

}
