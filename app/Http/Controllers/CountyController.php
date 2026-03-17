<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountyController extends Controller
{
    //
    function index()
    {
        $counties = County::latest()->get();
        return view('admin.counties.index', compact('counties')) ;
        # code...
    }

    function create(County $county)
    {
        return view('backoffice.counties.create') ;
        # code...
    }
}
