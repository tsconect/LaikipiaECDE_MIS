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

            log_user_activity($obj->id, 'wards', 'store', 'User created a new ward: ' . $obj->name, url()->current(), json_encode($obj));

            return back()->with('success','Ward Added Successfully');
        }

        function editWard(Wards $ward)
        {
            log_user_activity($ward->id, 'wards', 'edit', 'User accessed edit page for ward: ' . $ward->name, 'admin/wards/' . $ward->id . '/edit', json_encode($ward));

            return view('backoffice.wards.edit', compact('ward'));
        }

        function updateWard(Wards $ward)
        {
            $current_object = json_encode($ward);
            $ward->update(request()->only(['name']));

            log_user_activity($ward->id, 'wards', 'update', 'User updated ward with id ' . $ward->id, url()->current(), json_encode($ward), $current_object);

            return  redirect(route('admin.ward.edit', $ward->id))->with('success', 'Ward '. $ward->name .' was updated succesfully');
        }

}
