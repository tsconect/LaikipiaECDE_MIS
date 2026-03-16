<?php

namespace App\Http\Controllers;

use App\Models\VTC;
use Illuminate\Http\Request;

class VTCController extends Controller
{
    //
    public function index()
    {
        $data = VTC::get();
        return view('backoffice.VocationalTrainingInstitute.index', compact('data'));
    }
    function create()
    {
        return view('backoffice.VocationalTrainingInstitute.create');
    }

    public function store(Request $request)
    {
        $_pay_load = request()->only(['name', 'registration_number', 'area_in_hectares', 'legal_ownership', 'infrastracture', 'designation', 'full_names', 'id_number', 'kra_pin', 'phone_number', 'p_o_box']);

        $_pay_load['full_names'] = request()->input('first_name') . ' ' . request()->input('middle_name') . ' ' . request()->input('last_name');

        $_obj = VTC::create($_pay_load);

        return back()->with('success', $_obj->name . ' vocational training center was created successfully!');
    }

    function delete(VTC $id)
    {
        $id->delete();

        return back()->with('warning', $id->name . ' Constituency was created successfully!');
    }

    function edit(VTC $id)
    {
        # code...

        $data = $id;

        return view('backoffice.VocationalTrainingInstitute.edit', compact('data'));
    }

    function update(Request $request, VTC $id)
    {
        $data = $request->only(['name']);

        $id->update(['name' => $data['name']]);

        return back()->with('success', $id['name'] . ' Constituency was updated successfully!');
    }

    function dptsWithinVtc(VTC $vtc)
    {
        # code...
        $data = $vtc->departments;

        return view('backoffice.VocationalTrainingInstitute.vtc_profile', compact('data'));
    }

    function vtcHome(VTC $vtc)
    {
        # code...
        return view('backoffice.VocationalTrainingInstitute.vtc_dash', compact('vtc'));
    }
}
