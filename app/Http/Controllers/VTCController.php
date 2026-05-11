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
        log_user_activity(0, 'vtcs', 'index', 'User accessed the VTCs index page', 'admin/vtcs');
        return view('backoffice.VocationalTrainingInstitute.index', compact('data'));
    }
    function create()
    {
        log_user_activity(0, 'vtcs', 'create', 'User accessed the VTC create page', 'admin/vtcs/create');
        return view('backoffice.VocationalTrainingInstitute.create');
    }

    public function store(Request $request)
    {
        $_pay_load = request()->only(['name', 'registration_number', 'area_in_hectares', 'legal_ownership', 'infrastracture', 'designation', 'full_names', 'id_number', 'kra_pin', 'phone_number', 'p_o_box']);

        $_pay_load['full_names'] = request()->input('first_name') . ' ' . request()->input('middle_name') . ' ' . request()->input('last_name');

        $_obj = VTC::create($_pay_load);

        log_user_activity($_obj->id, 'vtcs', 'store', 'User created a new VTC: ' . $_obj->name, url()->current(), json_encode($_obj));

        return back()->with('success', $_obj->name . ' vocational training center was created successfully!');
    }

    function delete(VTC $id)
    {
        $oldVtc = json_encode($id);
        $vtcId = $id->id;
        $id->delete();

        log_user_activity($vtcId, 'vtcs', 'destroy', 'User deleted VTC with id ' . $vtcId, url()->current(), null, $oldVtc);

        return back()->with('warning', $id->name . ' Constituency was created successfully!');
    }

    function edit(VTC $id)
    {
        $data = $id;

        log_user_activity($id->id, 'vtcs', 'edit', 'User accessed edit page for VTC: ' . $id->name, 'admin/vtcs/' . $id->id . '/edit', json_encode($id));

        return view('backoffice.VocationalTrainingInstitute.edit', compact('data'));
    }

    function update(Request $request, VTC $id)
    {
        $current_object = json_encode($id);
        $data = $request->only(['name']);

        $id->update(['name' => $data['name']]);

        log_user_activity($id->id, 'vtcs', 'update', 'User updated VTC with id ' . $id->id, url()->current(), json_encode($id), $current_object);

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
