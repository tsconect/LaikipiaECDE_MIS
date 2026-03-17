<?php

namespace App\Http\Controllers;

use App\Models\BursaryApplications;
use App\Models\Constituency;
use App\Models\EcdeSchools;
use App\Models\Students;
use App\Models\Ward;
use App\Models\Wards;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    function index(Request $request){
        $applications=BursaryApplications::get();

        $constituencies = Constituency::all();
        $wards = Ward::all();
        $ecde_schools = EcdeSchools::all();

        return view('welcome',compact('applications', 'constituencies', 'wards','ecde_schools'));
    }
}
