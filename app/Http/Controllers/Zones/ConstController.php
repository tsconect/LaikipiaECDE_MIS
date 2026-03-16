<?php

namespace App\Http\Controllers\Zones;

use App\Http\Controllers\Controller;
use App\Models\Constituency;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Const_;

class ConstController extends Controller
{
    //
    public function index()
    {
        $data = Constituency::get();
        return view('backoffice.constituency.index', compact('data'));
    }
    function create(){
        return view('backoffice.constituency.create');
    }

    public function store(Request $request)
    {
        $obj = new Constituency();
        $obj->name = $request->name;
        $obj->save();

        return back()->with('success', $obj->name . ' Constituency was created successfully!');
    }

    function delete(Constituency $id){
        $id->delete();

        return back()->with('warning', $id->name . ' Constituency was created successfully!' );

    }


    function edit(Constituency $id)
    {
        # code...

        $data = $id;

        return view('backoffice.constituency.edit', compact('data'));

    }

    function update(Request $request, Constituency $id)
    {
        $data = $request->only(['name']);

        $id->update(['name'=> $data['name']]);

        return back()->with('success',   $id['name'] . ' Constituency was updated successfully!');
    }
}
