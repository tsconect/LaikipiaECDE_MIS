<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\County;
use App\Models\Location;
use App\Models\SubCounty;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function index()
    {
        $counties = County::all();
        $subCounties = SubCounty::all();
        $wards = Ward::all(); 
        $data = Location::all();
        return view('backoffice.locations.index', compact('counties', 'subCounties', 'wards', 'data'));
    }
    public function create(){
        $counties = County::all();
        $subCounties = SubCounty::all();
        $wards = Ward::all(); 
        return view('backoffice.locations.create', compact('counties', 'subCounties', 'wards'));
    }
    public function store(Request $request){
        $this->validate($request, [
            'ward_id' => 'required',
            'name' => 'required|unique:locations'
        ]);
        $location = new Location();
        $location->ward_id = $request->ward_id;
        $location->name = $request->name;
        $location->save();
        return redirect()->route('admin.location.all')->with('success', 'Location added successfully');
    }
}
