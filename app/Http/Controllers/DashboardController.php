<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $schoolsCount = \App\Models\EcdeSchools::count();
        $teachersCount = \App\Models\Teacher::count();
        $studentsCount = \App\Models\Learner::count(); // Using Learner model as it seems to be the active one
        
        // Learner Gender Distribution
        $learner_female = \App\Models\Learner::where('gender', 'female')->count();
        $learner_male = \App\Models\Learner::where('gender', 'male')->count();
        
        // Teacher Gender Distribution (assuming gender is in the User model linked to Teacher)
        $teacher_female = \App\Models\Teacher::whereHas('user', function($q) {
            $q->where('gender', 'female');
        })->count();
        $teacher_male = \App\Models\Teacher::whereHas('user', function($q) {
            $q->where('gender', 'male');
        })->count();

        // PWD Stats
        $pwd_teachers = \App\Models\Teacher::where('pwd_status', 'yes')->orWhere('pwd_status', 'Yes')->count();
        $pwd_learners = \App\Models\Learner::where('pwd_status', 'yes')->orWhere('pwd_status', 'Yes')->count();

        
        // Attendance Today (Placeholder for now, logic depends on LearnerAttendance model)
        $today = date('Y-m-d');
        $present_today = \App\Models\LearnerAttendance::where('date', $today)->where('status', 'present')->count();
        $absent_today = \App\Models\LearnerAttendance::where('date', $today)->where('status', 'absent')->count();

        $ethnicities = \App\Models\EthnicGroup::all();
        $retiring_teachers = Teacher::whereBetween('retirement_date', [date('Y-m-d'), date('Y-m-d', strtotime('+5 years'))])->get();

        $days = collect(range(1, 14))->map(function ($i) {
            return Carbon::now()->subDays(14 - $i)->format('Y-m-d');
        });

        // Teachers per day
        $teachersData = \App\Models\Teacher::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as total')
            )
            ->where('created_at', '>=', now()->subDays(14))
            ->groupBy('date')
            ->pluck('total', 'date');

        // Learners per day
        $learnersData = \App\Models\Learner::select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('count(*) as total')
            )
            ->where('created_at', '>=', now()->subDays(14))
            ->groupBy('date')
            ->pluck('total', 'date');

        // Fill missing days with 0
        $teachers = $days->map(fn($day) => $teachersData[$day] ?? 0);
        $learners = $days->map(fn($day) => $learnersData[$day] ?? 0);
        
        $ageGroups = [
            'Under 3' => [0, 3],
            '4 Years' => [4, 4],
            '5 Years' => [5, 5],
            '6 Years' => [6, 6],
            '7 Years' => [7, 7],
            '8 Years' => [8, 8],
            '9 Years' => [9, 9],
            '10 Years' => [10, 10],
            '10+' => [11, 100],
        ];

        $maleData = [];
        $femaleData = [];

       foreach ($ageGroups as $label => [$min, $max]) {

            $maleData[] = \App\Models\Learner::whereRaw(
                    "TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN ? AND ?",
                    [$min, $max]
                )
                ->where('gender', 'male')
                ->count();

            $femaleData[] = \App\Models\Learner::whereRaw(
                    "TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN ? AND ?",
                    [$min, $max]
                )
                ->where('gender', 'female')
                ->count();
        }

        $teacherAgeGroups = [
            '18–20' => [18, 20],
            '21–24' => [21, 24],
            '25–29' => [25, 29],
            '30–34' => [30, 34],
            '35–39' => [35, 39],
            '40–44' => [40, 44],
            '45–49' => [45, 49],
            '50–54' => [50, 54],
            '55–59' => [55, 59],
            '60 and above' => [60, 120],
        ];

        $teacherAgeCounts = [];

        foreach ($teacherAgeGroups as $label => [$min, $max]) {
            $teacherAgeCounts[$label] = \App\Models\Teacher::whereRaw(
                "TIMESTAMPDIFF(YEAR, dob, CURDATE()) BETWEEN ? AND ?",
                [$min, $max]
            )->count();
        }
        $teacherEthnicityCounts = \App\Models\Teacher::select('ethnicity_id', DB::raw('count(*) as total'))
            ->groupBy('ethnicity_id')
            ->pluck('total', 'ethnicity_id');
        $infraCounts = \App\Models\ClassRoom::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status');

        $infra_permanent = $infraCounts['permanent'] ?? 0;
        $infra_semi = $infraCounts['semi_permanent'] ?? 0;
        $infra_temp = $infraCounts['temporary'] ?? 0;
        $infra_other = $infraCounts['other'] ?? 0;
        $infra_counts = $infraCounts;




        return view('admin.index', compact(
            'schoolsCount', 'teachersCount', 'studentsCount', 'ethnicities', 'retiring_teachers',
            'learner_female', 'learner_male', 'teacher_female', 'teacher_male',
            'pwd_teachers', 'pwd_learners', 'infra_permanent', 'infra_semi', 'infra_temp', 'infra_other',
            'present_today', 'absent_today', 'teachers', 'learners', 'days', 'maleData', 'femaleData', 'teacherAgeCounts', 'teacherEthnicityCounts', 'infra_counts',
            'infra_permanent', 'infra_semi', 'infra_temp', 'infra_other'
        ));
    }
}
