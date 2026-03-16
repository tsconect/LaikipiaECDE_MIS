<?php

namespace App\Http\Controllers;

use App\Models\Cheque;
use Illuminate\Http\Request;
use App\Models\BursaryApplications;
use App\Models\StudentApplications;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $data = BursaryApplications::latest()->first();

        $all_data = BursaryApplications::with( 'studentApplications.student')->get();

        $levelCounts = $all_data->pluck('studentApplications')
        ->flatten()
        ->pluck('schoolDetails.level_of_study')
        ->countBy();


        $ward_counts = $all_data->pluck('studentApplications')
            ->flatten()
            ->pluck('student.ward')
            ->countBy();
        $wardCountArray = $ward_counts->toArray();

        $cheques = Cheque::all();

        $rejected_applications = StudentApplications::where('status', 'rejected')->get();
        $approved_applications = StudentApplications::where('status', 'Cheque released')->get();
        $pending_applications = StudentApplications::where('status', 'pending')->get();
        $all_applications = StudentApplications::all();
   

        $levelCountsArray = $levelCounts->toArray();

        return view('backoffice.dashboard', compact('data', 'levelCountsArray', 'wardCountArray', 'cheques', 'rejected_applications', 'approved_applications', 'pending_applications', 'all_applications'));


    }
}
