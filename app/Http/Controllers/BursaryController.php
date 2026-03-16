<?php

namespace App\Http\Controllers;

use App\Models\BursaryApplications;
use Illuminate\Http\Request;

class BursaryController extends Controller
{
    //
    //
    public function index()
    {
        $data = BursaryApplications::get();
        return view('backoffice.bursaries.index', compact('data'));
    }
    public function create()
    {
        return view('backoffice.bursaries.create');
    }

    public function store(Request $request)
    {
        $obj = new BursaryApplications();
        $obj->name = $request->name;

        $obj->save();
        $obj->slug = sprintf("%04d",$obj->id)."-".str_replace(' ', '-', $request->name);

        $obj->save();
        return back()->with('success', 'Bursary Added Successfully');
    }
}
