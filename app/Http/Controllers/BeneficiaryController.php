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

        return view('admin.beneficiaries.index', compact('items'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        $beneficiary->delete();

        return redirect()->route('admin.beneficiaries.index')->with('success', 'Beneficiary deleted successfully');
    }
}
