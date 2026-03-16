<?php

namespace App\Http\Controllers\Zones;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use Illuminate\Http\Request;
use App\Models\Wards;

class WardController extends Controller
{
    //
        //
        public function index($id)
        {
            // return $id;

            $data = Wards::with('const')->whereConstituency_id($id)->get();
            return view('backoffice.wards.index', compact('data','id'));
        }
        function create(Constituency $id){

            $data = $id;

            return view('backoffice.wards.create',compact('data'));
        }

        public function store(Request $request)
        {
            $obj = new Wards();
            $obj->name = $request->name;
            $obj->constituency_id=$request->const_id;
            $obj->save();
            return back()->with('success','Ward Added Successfully');
        }

        function editWard(Wards $ward)
        {
            // return $ward;

            return view('backoffice.wards.edit', compact('ward'));
        }

        function updateWard(Wards $ward)
        {
            // return request()->only(['name']);
            $ward->update(request()->only(['name']));

            return  redirect(route('admin.ward.edit', $ward->id))->with('success', 'Ward '. $ward->name .' was updated succesfully');
        }

}
