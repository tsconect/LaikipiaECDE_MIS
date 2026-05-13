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
        log_user_activity(0, 'sub_locations', 'index', 'User accessed the sub-locations index page', 'admin/sub-locations');
         return view('admin.sublocations.index', compact('sublocations'));
     }

    function create()
    {
        $sub_counties =Constituency::where('county_id','xuFdFy6t9AH')->get();
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

        log_user_activity($subLocation->id, 'sub_locations', 'store', 'User created a new sub-location: ' . $subLocation->name, url()->current(), json_encode($subLocation));

       return redirect()->route('admin.sub-locations.index')->with('success', $subLocation->name .  ' Sublocation was created successfully');
    }

    public function edit(SubLocation $sub_location)
    {
        $subLocation = $sub_location;
        log_user_activity($sub_location->id, 'sub_locations', 'edit', 'User accessed edit page for sub-location: ' . $sub_location->name, 'admin/sub-locations/' . $sub_location->id . '/edit', json_encode($sub_location));
        return view('admin.sublocations.edit', compact('subLocation'));
    }

    public function update(Request $request, SubLocation $sub_location)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $current_object = json_encode($sub_location);

        $sub_location->update($request->only(['name']));

        log_user_activity($sub_location->id, 'sub_locations', 'update', 'User updated sub-location with id ' . $sub_location->id, url()->current(), json_encode($sub_location), $current_object);

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
        $oldLocation = json_encode($sub_location);
        $locationId = $sub_location->id;
        $sub_location->delete();

        log_user_activity($locationId, 'sub_locations', 'destroy', 'User deleted sub-location with id ' . $locationId, url()->current(), null, $oldLocation);

        return redirect()->route('admin.sub-locations.index')
            ->with('success', 'Sub Location ' . $name . ' was deleted successfully');
    }



}
