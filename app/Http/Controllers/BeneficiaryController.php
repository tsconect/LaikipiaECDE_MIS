<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Beneficiary::where('user_id', auth()->user()->id)->latest()->get();

        log_user_activity(0, 'beneficiaries', 'index', 'User accessed the beneficiaries index page', 'admin/beneficiaries');

        return view('admin.beneficiaries.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        log_user_activity(0, 'beneficiaries', 'create', 'User accessed the beneficiaries create page', 'admin/beneficiaries/create');
        return view('admin.beneficiaries.create');
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

        $nextOfKin = new Beneficiary();
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

        log_user_activity($nextOfKin->id, 'beneficiaries', 'store', 'User created a new beneficiary: ' . $nextOfKin->first_name . ' ' . $nextOfKin->last_name, url()->current(), json_encode($nextOfKin));

        return redirect()->route('admin.beneficiaries.index')->with('success', 'Beneficiary created successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficiary $beneficiary)
    {
        log_user_activity($beneficiary->id, 'beneficiaries', 'show', 'User viewed beneficiary with id ' . $beneficiary->id, url()->current(), json_encode($beneficiary));
        return view('admin.beneficiaries.show', compact('beneficiary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficiary $beneficiary)
    {
        log_user_activity($beneficiary->id, 'beneficiaries', 'edit', 'User accessed edit page for beneficiary: ' . $beneficiary->first_name . ' ' . $beneficiary->last_name, 'admin/beneficiaries/' . $beneficiary->id . '/edit', json_encode($beneficiary));
        return view('admin.beneficiaries.edit', compact('beneficiary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficiary $beneficiary)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'relationship' => 'required',
            'dob' => 'required',
            'phone_number' => 'nullable',
            'email' => 'nullable|email',
        ]);

        $current_object = json_encode($beneficiary);

        $beneficiary->first_name = $request->first_name;
        $beneficiary->last_name = $request->last_name;
        $beneficiary->middle_name = $request->middle_name;
        $beneficiary->gender = $request->gender;
        $beneficiary->relationship = $request->relationship;
        $beneficiary->phone_number = $request->phone_number;
        $beneficiary->email = $request->email;
        $beneficiary->dob = $request->dob;
        $beneficiary->id_number = $request->id_number;
        $beneficiary->save();

        log_user_activity($beneficiary->id, 'beneficiaries', 'update', 'User updated beneficiary with id ' . $beneficiary->id, url()->current(), json_encode($beneficiary), $current_object);

        return redirect()->route('admin.beneficiaries.index')->with('success', 'Beneficiary updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Beneficiary  $beneficiary
     * @return \Illuminate\Http\Response
     */
    public function destroy(Beneficiary $beneficiary)
    {
        $oldBeneficiary = json_encode($beneficiary);
        $beneficiaryId = $beneficiary->id;
        $beneficiary->delete();

        log_user_activity($beneficiaryId, 'beneficiaries', 'destroy', 'User deleted beneficiary with id ' . $beneficiaryId, url()->current(), null, $oldBeneficiary);

        return redirect()->route('admin.beneficiaries.index')->with('success', 'Beneficiary deleted successfully');
    }
}
