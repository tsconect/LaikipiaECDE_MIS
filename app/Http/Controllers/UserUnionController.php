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
        return view('admin.user-unions.edit', compact('userUnion', 'unions'));
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

        $userUnion->union_id = $request->union_id;
        $userUnion->membership_number = $request->membership_no;
        $userUnion->save();

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
        $userUnion->delete();

        return redirect()->route('admin.user-unions.index')->with('success', 'User Union deleted successfully');
    }
}
