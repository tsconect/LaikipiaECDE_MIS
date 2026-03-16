<?php

namespace App\Http\Controllers;

use App\Models\County;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;

class CountyController extends Controller
{
    //
    function index(County $county)
    {
        $county = $county->all();
        return view('backoffice.counties.index', compact('county')) ;
        # code...
    }

    function create(County $county)
    {
        return view('backoffice.counties.create') ;
        # code...
    }
}
