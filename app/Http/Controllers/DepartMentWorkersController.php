<?php

namespace App\Http\Controllers;

use App\Models\DepartMentWorkers;
use Illuminate\Http\Request;

use Carbon\Carbon;
use League\Csv\Writer;

class DepartMentWorkersController extends Controller
{
   //
   public function index()
   {
       $data = DepartMentWorkers::get();
       return view('backoffice.DepartmentsWorkers.index', compact('data'));
   }

   function view(DepartMentWorkers $id)
   {
       # code...
       // return $id;
       $data = $id;

       return view('backoffice.DepartmentsWorkers.staff_view_profile', compact('data'));
   }

   function create()
   {
       if (request()->has('vtc_id')) {
           $vtc_id = request()->input('vtc_id');
           return view('backoffice.DepartmentsWorkers.create', compact('vtc_id'));
       }else{

           $vtc_id = null;
           return view('backoffice.DepartmentsWorkers.create', compact('vtc_id'));
       }
   }

   public function store(Request $request)
   {

    // return $request;

       // return $request;
       if ($request->file('passport_photo_attachment')) {
           $photo_path = $request->file('passport_photo_attachment')->store('uploads');
       }

       if ($request->file('certification_attachment')) {
           $certificate_path = $request->file('certification_attachment')->store('uploads');
       }
       // return request();
       $_obj = request()->only([
           'full_names',
           'email',
           'phone_number',
           'id_number',
           'gender',
           'dob',
           'religion',
           'passport_photo_attachment',
           'constituency_id',
           'ward_id',
           'sublocation_id',
           'village',
           'next_of_kin_full_names',
           'next_of_kin_id_number',
           'next_of_kin_phone_number',
           'next_of_kin_relationship',
           'next_of_kin_gender',
           'kra_pin',
       ]);

       $_obj['passport_photo_attachment'] = basename($photo_path);

       $_obj['full_names'] = request()->input('first_name') . ' ' . request()->input('middle_name') . ' ' . request()->input('last_name');
       $_obj['next_of_kin_full_names'] = request()->input('next_kin_first_name') . ' ' . request()->input('next_kin_middle_name') . ' ' . request()->input('next_kin_last_name');

       $__obj = DepartMentWorkers::create($_obj);

       return back()->with('success', $__obj->department_name . 'Department staff was created successfully!');
   }

   function delete(DepartMentWorkers $id)
   {
       $id->delete();

       return back()->with('warning', $id->name . ' Constituency was created successfully!');
   }

   function edit(DepartMentWorkers $id)
   {
       # code...

       $data = $id;

       return view('backoffice.VocationalTrainingInstitute.Teachers.edit', compact('data'));
   }

   function update(Request $request, DepartMentWorkers $id)
   {
       $data = $request->only(['name']);

       // $id->update(['=> $data['name']]);

       return back()->with('success', $id['name'] . ' Constituency was updated successfully!');
   }

   function generateDPTStaffReturns()
   {
       # code...
       $_dpt_staff = DepartMentWorkers::all();

       // Create a new CSV writer instance
       $csv = Writer::createFromString('');

       // Add the CSV headers
       $csv->insertOne([
           'ID',
           'Name',
           'Email',
           'phone',
           'id_number',
           'kra_pin',
           'gender',
           'dob',
           //school info
           'religion',
           'constituency_id',
           'ward_id',
           'sublocation_id',
           // ------
           'village',
           'next_of_kin_full_names',
           'next_of_kin_phone_number'
       ]);

       // Add each user to the CSV
       foreach ($_dpt_staff as $_) {
           $csv->insertOne([
               $_->id,
               $_->full_names,
               $_->email,
               $_->phone_number,
               $_->id_number,
               $_->kra_pin,
               $_->gender,
               $_->dob,
               //school info
               $_->religion,
               $_->constituency_id,
               $_->ward_id,
               $_->sublocation_id,
               $_->village,
               $_->next_of_kin_full_names,
               $_->next_of_kin_phone_number
           ]);
       }

       // Output the CSV to the browser
       $csv->output(Carbon::now() . '_dpt_staff.csv');
   }
}
