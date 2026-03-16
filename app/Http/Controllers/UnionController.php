<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unions;

class UnionController extends Controller
{
    //
    public function index()
    {
        $data = Unions::get();
        return view('backoffice.unions.index', compact('data'));
    }
    function create(){
        return view('backoffice.unions.create');
    }

    public function store(Request $request)
    {
        $obj = new Unions();
        $obj->name = $request->name;

        $obj->save();
        return back()->with('success','Union Added Successfully');
    }

    function edit(Unions $union)
    {
        return view('backoffice.unions.edit', compact('union'));
        # code...
    }

    function update(Unions $union)
    {
        $union->update(request()->only(['name']));
        return redirect(route('admin.edit.union', $union->id))->with('success', $union->name ." Update successfully");
        # code...
    }
}
