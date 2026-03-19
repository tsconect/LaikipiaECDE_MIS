<?php

namespace App\Http\Controllers;

use App\Models\Constituency;
use App\Models\County;
use App\Models\SubLocation;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;

class SubLocationController extends Controller
{
    //

     //
     public function index()
     {
        $sublocations = SubLocation::all();
         return view('admin.subLocations.index', compact('sublocations'));
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

    function editSubLocations(SubLocation $subLocation)
    {
        // return $ward;

        return view('backoffice.sublocations.edit', compact('subLocation'));
    }

    function updateSubLocations(SubLocation $subLocation)
    {
        // return request()->only(['name']);
        $subLocation->update(request()->only(['name']));

        return  redirect(route('admin.sublocation.edit', $subLocation->id))->with('success', 'Ward '. $subLocation->name .' was updated succesfully');

    }



}
