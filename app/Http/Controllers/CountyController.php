<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;

class CountyController extends Controller
{
    //
    function index()
    {
        $counties = County::latest()->get();
        log_user_activity(0, 'counties', 'index', 'User accessed the counties index page', 'admin/counties');
        return view('admin.counties.index', compact('counties')) ;
        # code...
    }

    function create(County $county)
    {
        log_user_activity(0, 'counties', 'create', 'User accessed the counties create page', 'admin/counties/create');
        return view('admin.counties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:counties,name',
        ]);

        $county = County::create([
            'name' => $request->name,
        ]);

        log_user_activity($county->id, 'counties', 'store', 'User created a new county: ' . $county->name, url()->current(), json_encode($county));

        return redirect()->route('admin.counties.index')->with('success', 'County created successfully.');
    }

    public function show(County $county)
    {
        log_user_activity($county->id, 'counties', 'show', 'User viewed county with id ' . $county->id, url()->current(), json_encode($county));
        return view('admin.counties.show', compact('county'));
    }

    public function edit(County $county)
    {
        log_user_activity($county->id, 'counties', 'edit', 'User accessed edit page for county: ' . $county->name, 'admin/counties/' . $county->id . '/edit', json_encode($county));
        return view('admin.counties.edit', compact('county'));
    }

    public function update(Request $request, County $county)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:counties,name,' . $county->id,
        ]);

        $current_object = json_encode($county);

        $county->update([
            'name' => $request->name,
        ]);

        log_user_activity($county->id, 'counties', 'update', 'User updated county with id ' . $county->id, url()->current(), json_encode($county), $current_object);

        return redirect()->route('admin.counties.index')->with('success', 'County updated successfully.');
    }

    public function destroy(County $county)
    {
        $oldCounty = json_encode($county);
        $countyId = $county->id;
        $county->delete();
        log_user_activity($countyId, 'counties', 'destroy', 'User deleted county with id ' . $countyId, url()->current(), null, $oldCounty);
        return redirect()->route('admin.counties.index')->with('success', 'County deleted successfully.');
    }
}
