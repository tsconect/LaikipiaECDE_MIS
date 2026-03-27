<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
      public function index()
    {
   
        $schoolsCount = \App\Models\EcdeSchools::count();
        $teachersCount = \App\Models\Teacher::count();
        $studentsCount = \App\Models\Students::count();
        $unionsCount = \App\Models\Unions::count();
        $ethnicities = \App\Models\EthnicGroup::take(10)->get();
        $retiring_teachers = Teacher::whereBetween('retirement_date', [date('Y-m-d'), date('Y-m-d', strtotime('+70 years'))])->get();



        return view('admin.index', compact('schoolsCount', 'teachersCount', 'studentsCount', 'unionsCount', 'ethnicities', 'retiring_teachers'));
    }
}
