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

        // Infrastructure Distribution
        $infra_permanent = \App\Models\EcdeSchools::where('class_rooms_status', 'permanent')->count();
        $infra_semi = \App\Models\EcdeSchools::where('class_rooms_status', 'Semi_Permanent')->count();
        $infra_temp = \App\Models\EcdeSchools::where('class_rooms_status', 'temporary')->count();
        $infra_other = \App\Models\EcdeSchools::whereNotIn('class_rooms_status', ['permanent', 'Semi_Permanent', 'temporary'])->count();

        // Attendance Today (Placeholder for now, logic depends on LearnerAttendance model)
        $today = date('Y-m-d');
        $present_today = \App\Models\LearnerAttendance::where('date', $today)->where('status', 'present')->count();
        $absent_today = \App\Models\LearnerAttendance::where('date', $today)->where('status', 'absent')->count();

        $ethnicities = \App\Models\EthnicGroup::take(10)->get();
        $retiring_teachers = Teacher::whereBetween('retirement_date', [date('Y-m-d'), date('Y-m-d', strtotime('+70 years'))])->get();

        return view('admin.index', compact(
            'schoolsCount', 'teachersCount', 'studentsCount', 'ethnicities', 'retiring_teachers',
            'learner_female', 'learner_male', 'teacher_female', 'teacher_male',
            'pwd_teachers', 'pwd_learners', 'infra_permanent', 'infra_semi', 'infra_temp', 'infra_other',
            'present_today', 'absent_today'
        ));
    }
}
