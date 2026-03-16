<?php

namespace App\Http\Controllers;

use App\Models\Ward;
use App\Models\Wards;
use App\Models\County;
use App\Models\Location;
use App\Models\Students;
use App\Models\SubCounty;
use App\Models\EcdeSchools;
use App\Models\Constituency;
use Illuminate\Http\Request;
use App\Models\BursaryApplications;

class FrontController extends Controller
{
    //
    function index(Request $request){
        $latestOpenApplication = BursaryApplications::where('status', 'open')->latest('created_at')->first();
        // $applications=BursaryApplications::get();

        // $constituencies = Constituency::all();
        // $wards = Wards::all();
        // $ecde_schools = EcdeSchools::all();

        // return view('welcome',compact('applications', 'constituencies', 'wards','ecde_schools'));

        return view('frontend.index', compact('latestOpenApplication'));
    }

    function register(Request $request){
        $counties = County::all();
        $subCounties = SubCounty::all();
        $wards = Ward::all(); 
        $locations = Location::all();
        return view('frontend.register' , compact('counties', 'subCounties', 'wards', 'locations'));
    }
}
