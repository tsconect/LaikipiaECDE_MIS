<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BursaryApplications;
use App\Models\Constituency;
use App\Models\EcdeSchools;
use App\Models\Students;
use App\Models\Wards;

class FrontController extends Controller
{
    //
    function index(Request $request){
        $applications=BursaryApplications::get();

        $constituencies = Constituency::all();
        $wards = Wards::all();
        $ecde_schools = EcdeSchools::all();

        return view('welcome',compact('applications', 'constituencies', 'wards','ecde_schools'));
    }
}
