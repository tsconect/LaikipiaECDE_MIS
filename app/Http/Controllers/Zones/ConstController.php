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
        log_user_activity(0, 'constituencies', 'index', 'User accessed the constituencies index page', 'admin/constituencies');
        return view('backoffice.constituency.index', compact('data'));
    }
    function create(){
        log_user_activity(0, 'constituencies', 'create', 'User accessed the constituencies create page', 'admin/constituencies/create');
        return view('backoffice.constituency.create');
    }

    public function store(Request $request)
    {
        $obj = new Constituency();
        $obj->name = $request->name;
        $obj->save();

        log_user_activity($obj->id, 'constituencies', 'store', 'User created a new constituency: ' . $obj->name, url()->current(), json_encode($obj));

        return back()->with('success', $obj->name . ' Constituency was created successfully!');
    }

    function delete(Constituency $id){
        $oldConst = json_encode($id);
        $constId = $id->id;
        $id->delete();

        log_user_activity($constId, 'constituencies', 'destroy', 'User deleted constituency with id ' . $constId, url()->current(), null, $oldConst);

        return back()->with('warning', $id->name . ' Constituency was created successfully!' );

    }


    function edit(Constituency $id)
    {
        $data = $id;

        log_user_activity($id->id, 'constituencies', 'edit', 'User accessed edit page for constituency: ' . $id->name, 'admin/constituencies/' . $id->id . '/edit', json_encode($id));

        return view('backoffice.constituency.edit', compact('data'));

    }

    function update(Request $request, Constituency $id)
    {
        $current_object = json_encode($id);
        $data = $request->only(['name']);

        $id->update(['name'=> $data['name']]);

        log_user_activity($id->id, 'constituencies', 'update', 'User updated constituency with id ' . $id->id, url()->current(), json_encode($id), $current_object);

        return back()->with('success',   $id['name'] . ' Constituency was updated successfully!');
    }
}
