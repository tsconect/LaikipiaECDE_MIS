<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unions;

class UnionController extends Controller
{
    //
    public function index()
    {
        $unions = Unions::get();
        return view('admin.unions.index', compact('unions'));
    }
    function create(){
        return view('admin.unions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:unions,name',
        ]);
        $obj = new Unions();
        $obj->name = $request->name;

        $obj->save();
        return redirect()->route('admin.unions.index')->with('success', $obj->name . ' Union was created successfully!');
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
