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
        log_user_activity(0, 'bursaries', 'index', 'User accessed the bursaries index page', 'admin/bursaries');
        return view('backoffice.bursaries.index', compact('data'));
    }
    public function create()
    {
        log_user_activity(0, 'bursaries', 'create', 'User accessed the bursaries create page', 'admin/bursaries/create');
        return view('backoffice.bursaries.create');
    }

    public function store(Request $request)
    {
        $obj = new BursaryApplications();
        $obj->name = $request->name;

        $obj->save();
        $obj->slug = sprintf("%04d",$obj->id)."-".str_replace(' ', '-', $request->name);

        $obj->save();

        log_user_activity($obj->id, 'bursaries', 'store', 'User created a new bursary: ' . $obj->name, url()->current(), json_encode($obj));

        return back()->with('success', 'Bursary Added Successfully');
    }
}
