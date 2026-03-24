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
        return view('admin.counties.index', compact('counties')) ;
        # code...
    }

    function create(County $county)
    {
        return view('admin.counties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:counties,name',
        ]);

        County::create([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.counties.index')->with('success', 'County created successfully.');
    }

    public function show(County $county)
    {
        return view('admin.counties.edit', compact('county'));
    }

    public function edit(County $county)
    {
        return view('admin.counties.edit', compact('county'));
    }

    public function update(Request $request, County $county)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:counties,name,' . $county->id,
        ]);

        $county->update([
            'name' => $request->name,
        ]);

        return redirect()->route('admin.counties.index')->with('success', 'County updated successfully.');
    }

    public function destroy(County $county)
    {
        $county->delete();
        return redirect()->route('admin.counties.index')->with('success', 'County deleted successfully.');
    }
}
