<?php

namespace App\Http\Controllers;

use App\Models\Unions;
use App\Models\UserUnion;
use Illuminate\Http\Request;

class UserUnionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $unions = UserUnion::where('user_id', auth()->user()->id)->latest()->get();

        log_user_activity(0, 'user_unions', 'index', 'User accessed the user unions index page', 'admin/user-unions');

        return view('admin.user-unions.index', compact('unions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $unions = Unions::latest()->get();
        log_user_activity(0, 'user_unions', 'create', 'User accessed the user unions create page', 'admin/user-unions/create');
        return view('admin.user-unions.create', compact('unions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'union_id' => 'required',
            'membership_no' => 'required|unique:user_unions,membership_number',
        ]);

        $userUnion = new UserUnion();
        $userUnion->user_id = auth()->user()->id;
        $userUnion->union_id = $request->union_id;
        $userUnion->membership_number = $request->membership_no;
        $userUnion->save();

        log_user_activity($userUnion->id, 'user_unions', 'store', 'User added a new union membership: ' . $userUnion->membership_number, url()->current(), json_encode($userUnion));

        return redirect()->route('admin.user-unions.index')->with([
            'success' => 'User Union added successfully'
        ]);
       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UserUnion  $userUnion
     * @return \Illuminate\Http\Response
     */
    public function show(UserUnion $userUnion)
    {
        $unions = Unions::latest()->get();
        log_user_activity($userUnion->id, 'user_unions', 'show', 'User viewed union membership with id ' . $userUnion->id, url()->current(), json_encode($userUnion));
        return view('admin.user-unions.show', compact('userUnion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UserUnion  $userUnion
     * @return \Illuminate\Http\Response
     */
    public function edit(UserUnion $userUnion)
    {
        $unions = Unions::latest()->get();
        log_user_activity($userUnion->id, 'user_unions', 'edit', 'User accessed edit page for union membership with id ' . $userUnion->id, 'admin/user-unions/' . $userUnion->id . '/edit', json_encode($userUnion));
        return view('admin.user-unions.edit', compact('userUnion', 'unions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UserUnion  $userUnion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserUnion $userUnion)
    {
        $request->validate([
            'union_id' => 'required',
            'membership_no' => 'required|unique:user_unions,membership_number,' . $userUnion->id,
        ]);

        $current_object = json_encode($userUnion);

        $userUnion->union_id = $request->union_id;
        $userUnion->membership_number = $request->membership_no;
        $userUnion->save();

        log_user_activity($userUnion->id, 'user_unions', 'update', 'User updated union membership with id ' . $userUnion->id, url()->current(), json_encode($userUnion), $current_object);

        return redirect()->route('admin.user-unions.index')->with('success', 'User Union updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UserUnion  $userUnion
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserUnion $userUnion)
    {
        $oldUnion = json_encode($userUnion);
        $unionId = $userUnion->id;
        $userUnion->delete();

        log_user_activity($unionId, 'user_unions', 'destroy', 'User deleted union membership with id ' . $unionId, url()->current(), null, $oldUnion);

        return redirect()->route('admin.user-unions.index')->with('success', 'User Union deleted successfully');
    }
}
