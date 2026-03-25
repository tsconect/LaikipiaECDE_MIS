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
        return view('admin.unions.edit', compact('union'));
    }

    function update(Request $request, Unions $union)
    {
        $request->validate([
            'name' => 'required|unique:unions,name,' . $union->id,
        ]);

        $union->update($request->only(['name']));
        return redirect()->route('admin.unions.index')->with('success', $union->name . ' updated successfully');
    }

    public function show(Unions $union)
    {
        return view('admin.unions.edit', compact('union'));
    }

    public function destroy(Unions $union)
    {
        $union->delete();
        return redirect()->route('admin.unions.index')->with('success', 'Union deleted successfully');
    }
}
