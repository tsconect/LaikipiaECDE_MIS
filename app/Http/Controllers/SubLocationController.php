<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\SubLocation;
use App\Models\Ward;
use Illuminate\Http\Request;

class SubLocationController extends Controller
{
    //

     //
     public function index()
     {
        $sublocations = SubLocation::all();
         return view('admin.sublocations.index', compact('sublocations'));
     }

    function create()
    {
        $sub_counties =Constituency::get();
        $wards=Ward::get();
        $counties = County::get();
        return view('admin.sublocations.create',compact('wards', 'sub_counties', 'counties'));
    }

    function store(Request $request)
    {
        $request->validate(['name' => 'required',
        'ward_id' => 'required'
        ]);
        $subLocation =  New SubLocation();
        $subLocation->name = $request->name;
        $subLocation->ward_id = $request->ward_id;
        $subLocation->save();
      
       return redirect()->route('admin.sub-locations.index')->with('success', $subLocation->name .  ' Sublocation was created successfully');
    }

    public function edit(SubLocation $sub_location)
    {
        $subLocation = $sub_location;

        return view('admin.sublocations.edit', compact('subLocation'));
    }

    public function update(Request $request, SubLocation $sub_location)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $sub_location->update($request->only(['name']));

        return redirect()->route('admin.sub-locations.index')
            ->with('success', 'Sub Location ' . $sub_location->name . ' was updated successfully');
    }

    public function show(SubLocation $sub_location)
    {
        return redirect()->route('admin.sub-locations.edit', $sub_location->id);
    }

    public function destroy(SubLocation $sub_location)
    {
        $name = $sub_location->name;
        $sub_location->delete();

        return redirect()->route('admin.sub-locations.index')
            ->with('success', 'Sub Location ' . $name . ' was deleted successfully');
    }



}
