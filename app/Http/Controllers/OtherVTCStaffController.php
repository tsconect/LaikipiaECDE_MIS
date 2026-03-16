<?php

namespace App\Http\Controllers;

use App\Models\OtherVTCStaff;
use Carbon\Carbon;
use Illuminate\Http\Request;
use League\Csv\Writer;


class OtherVTCStaffController extends Controller
{
    //
    public function index()
    {
        $data = OtherVTCStaff::get();
        return view('backoffice.VocationalTrainingInstitute.other_staff.index', compact('data'));
    }

    function view(OtherVTCStaff $id)
    {
        # code...
        // return $id;
        $data = $id;

        return view('backoffice.VocationalTrainingInstitute.other_staff.other_staff_view_profile', compact('data'));
    }

    function create()
    {
        if (request()->has('vtc_id')) {
            $vtc_id = request()->input('vtc_id');
            return view('backoffice.VocationalTrainingInstitute.other_staff.create', compact('vtc_id'));
        }else{

            $vtc_id = null;
            return view('backoffice.VocationalTrainingInstitute.other_staff.create', compact('vtc_id'));
        }
    }

    public function store(Request $request)
    {

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
            'school_id',
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

        $__obj = OtherVTCStaff::create($_obj);

        return back()->with('success', $__obj->department_name . ' vtc staff was created successfully!');
    }

    function delete(OtherVTCStaff $id)
    {
        $id->delete();

        return back()->with('warning', $id->name . ' Constituency was created successfully!');
    }

    function edit(OtherVTCStaff $id)
    {
        # code...

        $data = $id;

        return view('backoffice.VocationalTrainingInstitute.Teachers.edit', compact('data'));
    }

    function update(Request $request, OtherVTCStaff $id)
    {
        $data = $request->only(['name']);

        // $id->update(['=> $data['name']]);

        return back()->with('success', $id['name'] . ' Constituency was updated successfully!');
    }

    function generateVTCStaffReturns()
    {
        # code...
        $_vtc_teachers = OtherVTCStaff::all();

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
            'school_name',
            'school_contact_name',
            'school_contact_designation',
            'school_contact_phone_number',
            'p_o_box',
            // ------
            'tsc_number',
            // 'date_of_first_appointment',
            // 'terms_of_engagement',
            // 'job_group',
        ]);

        // Add each user to the CSV
        foreach ($_vtc_teachers as $_) {
            $csv->insertOne([
                $_->id,
                $_->full_names,
                $_->email,
                $_->phone_number,
                $_->id_number,
                $_->kra_pin,
                $_->gender,
                $_->dob,
                $_->tsc_number,
                //school info
                $_->school->name,
                $_->school->full_names,
                $_->school->designation,
                $_->school->phone_number,
                $_->school->p_o_box,
                $_->school->tsc_number,
                // -----
                // $_->date_of_first_appointment,
                // $_->terms_of_engagement,
                // $_->job_group,
            ]);
        }

        // Output the CSV to the browser
        $csv->output(Carbon::now() . '_vtc_teachers.csv');
    }
}
