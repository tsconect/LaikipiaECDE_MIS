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
        log_user_activity(0, 'unions', 'index', 'User accessed the unions index page', 'admin/unions');
        return view('admin.unions.index', compact('unions'));
    }
    function create(){
        log_user_activity(0, 'unions', 'create', 'User accessed the unions create page', 'admin/unions/create');
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

        log_user_activity($obj->id, 'unions', 'store', 'User created a new union: ' . $obj->name, url()->current(), json_encode($obj));

        return redirect()->route('admin.unions.index')->with('success', $obj->name . ' Union was created successfully!');
    }

    function edit(Unions $union)
    {
        log_user_activity($union->id, 'unions', 'edit', 'User accessed edit page for union: ' . $union->name, 'admin/unions/' . $union->id . '/edit', json_encode($union));
        return view('admin.unions.edit', compact('union'));
    }

    function update(Request $request, Unions $union)
    {
        $request->validate([
            'name' => 'required|unique:unions,name,' . $union->id,
        ]);

        $current_object = json_encode($union);

        $union->update($request->only(['name']));

        log_user_activity($union->id, 'unions', 'update', 'User updated union with id ' . $union->id, url()->current(), json_encode($union), $current_object);

        return redirect()->route('admin.unions.index')->with('success', $union->name . ' updated successfully');
    }

    public function show(Unions $union)
    {
        log_user_activity($union->id, 'unions', 'show', 'User viewed union with id ' . $union->id, url()->current(), json_encode($union));
        return view('admin.unions.edit', compact('union'));
    }

    public function destroy(Unions $union)
    {
        $oldUnion = json_encode($union);
        $unionId = $union->id;
        $union->delete();
        log_user_activity($unionId, 'unions', 'destroy', 'User deleted union with id ' . $unionId, url()->current(), null, $oldUnion);
        return redirect()->route('admin.unions.index')->with('success', 'Union deleted successfully');
    }
}
