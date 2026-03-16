<?php

namespace App\Http\Controllers;

use App\Models\SubLocation;
use Illuminate\Http\Request;

use App\Models\Wards;

class SubLocationController extends Controller
{
    //

     //
     public function index(Wards $id)
     {
        $ward = $id;
        $data = $id->subLocation;

         return view('backoffice.subLocations.index', compact('data', 'ward'));
     }

    function create_view(Wards $id)
    {
        $ward = $id;
        return view('backoffice.sublocations.create',compact('ward'));
    }

    function store(Request $request)
    {
        $data = $request->only(["name","ward_id"]);
        $_ =  SubLocation::create($data);
       return back()->with('success', $_->name .  ' Sublocation was created successfully');
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
