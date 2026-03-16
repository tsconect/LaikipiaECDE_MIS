<?php

use App\Http\Controllers\DepartMentWorkersController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubLocationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VTCStudentController;
use App\Http\Controllers\VTCTeacherController;
use App\Http\Controllers\Zones\ConstController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::get('/bursary-status-query', [App\Http\Controllers\Student\ApplicationsController::class, 'applicationStatus'])->name('applicationStatus');
Route::get('/view-bursary-application', [App\Http\Controllers\Student\ApplicationsController::class, 'viewApplication'])->name('viewApplication');

Route::post('/store', [App\Http\Controllers\Student\ApplicationsController::class, 'store'])->name('student.store');
// register.custom
Route::any('register_custom', [UsersController::class, 'register'])->name('register.custom');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth']], function () {

    Route::get('/admin/dashboard', function () {
        // Only users with the required permissions can access this route
        return "ok";

    })->middleware('permission:Performace Appraisal');

    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {

            //constituencies
            Route::get('/new-constituency', [App\Http\Controllers\Zones\ConstController::class, 'create'])->name('const.create');
            Route::any('/all-constituency', [App\Http\Controllers\Zones\ConstController::class, 'index'])->name('const.all');
            Route::post('/save-constituency', [App\Http\Controllers\Zones\ConstController::class, 'store'])->name('const.store');
            Route::get('edit-constituency/{id}', [App\Http\Controllers\Zones\ConstController::class, 'edit'])->name('const.edit');
            Route::get('constituency/delete/{id}', [ConstController::class, 'delete'])->name('delete-constituency');
            Route::get('constituency/edit/{id}', [ConstController::class, 'edit'])->name('edit-constituency');
            Route::post('constituency/edit/{id}', [ConstController::class, 'update'])->name('const.edit');
            //

            //wards
            Route::get('/new-ward/{id}', [App\Http\Controllers\Zones\WardController::class, 'create'])->name('wards.create');
            Route::any('/all-wards/{id}', [App\Http\Controllers\Zones\WardController::class, 'index'])->name('wards.all');
            Route::post('/save-ward', [App\Http\Controllers\Zones\WardController::class, 'store'])->name('wards.store');
            Route::get('edit-ward/{id}', [App\Http\Controllers\Zones\WardController::class, 'edit'])->name('wards.edit');
            Route::get('/ward/{ward}/edit', [WardController::class, 'editWard'])->name('ward.edit');
            Route::post('/ward/{ward}/update', [WardController::class, 'updateWard'])->name('ward.update');

            //sublocation
            // admin/
            //
            Route::get('create/{id}/sublocations', [SubLocationController::class, 'create_view'])->name('sublocation.create');
            Route::any('wards/{id}/sublocations', [SubLocationController::class, 'index'])->name('sub-location.all');

            Route::get('/sublocation/{subLocation}/edit', [SubLocationController::class, 'editSubLocations'])->name('sublocation.edit');
            Route::post('/sublocation/{subLocation}/update', [SubLocationController::class, 'updateSubLocations'])->name('sublocation.update');


            //
            //
            Route::get('/ward/{ward}/edit', [SubLocationController::class, 'editWard'])->name('ward.edit');
            Route::post('/ward/{ward}/update', [SubLocationController::class, 'updateWard'])->name('ward.update');

            Route::post('wards/sublocations', [SubLocationController::class, 'store'])->name('sub-location.store');
            //

            //Unions
            Route::get('/new-unions', [App\Http\Controllers\UnionController::class, 'create'])->name('unions.create');
            Route::any('/all-unions', [App\Http\Controllers\UnionController::class, 'index'])->name('unions.all');
            Route::post('/save-unions', [App\Http\Controllers\UnionController::class, 'store'])->name('unions.store');
            Route::get('edit-unions/{union}', [App\Http\Controllers\UnionController::class, 'edit'])->name('edit.union');
            Route::post('update-unions/{union}', [App\Http\Controllers\UnionController::class, 'update'])->name('union.update');


            //school
            Route::get('/new-school', [App\Http\Controllers\ESchoolController::class, 'create'])->name('school.create');
            Route::any('/all-school', [App\Http\Controllers\ESchoolController::class, 'index'])->name('school.all');
            Route::post('/save-school', [App\Http\Controllers\ESchoolController::class, 'store'])->name('school.store');
            Route::get('edit-school/{school}', [App\Http\Controllers\ESchoolController::class, 'editView'])->name('school.edit');
            Route::post('update-school/{school}', [App\Http\Controllers\ESchoolController::class, 'update'])->name('school.update');

            //feeder school
            Route::get('/new-feeder_school', [App\Http\Controllers\FeederSchoolsController::class, 'create'])->name('feeder_school.create');
            Route::any('/all-feeder_school', [App\Http\Controllers\FeederSchoolsController::class, 'index'])->name('feeder_school.all');
            Route::post('/save-feeder_school', [App\Http\Controllers\FeederSchoolsController::class, 'store'])->name('feeder_school.store');
            Route::get('edit-feeder_school/{school}', [App\Http\Controllers\FeederSchoolsController::class, 'editView'])->name('feeder_school.edit');
            Route::post('update-feeder_school/{school}', [App\Http\Controllers\FeederSchoolsController::class, 'update'])->name('feeder_school.update');


            //teachers
            Route::get('/new-teachers', [App\Http\Controllers\TeacherController::class, 'create'])->name('teachers.create');
            Route::any('/all-teachers', [App\Http\Controllers\TeacherController::class, 'index'])->name('teachers.all');
            Route::post('/save-teachers', [App\Http\Controllers\TeacherController::class, 'store'])->name('teachers.store');
            Route::get('edit-teachers/{id}', [App\Http\Controllers\TeacherController::class, 'edit'])->name('teachers.edit');
            Route::get('delete-teacher/{id}', [App\Http\Controllers\TeacherController::class, 'delete'])->name('teachers.delete');
            // download teachers cert
            Route::get('download', [TeacherController::class, 'downloadCert'])->name('download.cert');

            //coordinators
            Route::get('/new-coordinators', [App\Http\Controllers\CoordinatorsController::class, 'create'])->name('coordinators.create');
            Route::any('/all-coordinators', [App\Http\Controllers\CoordinatorsController::class, 'index'])->name('coordinators.all');
            Route::post('/save-coordinators', [App\Http\Controllers\CoordinatorsController::class, 'store'])->name('coordinators.store');
            Route::get('edit-coordinators/{id}', [App\Http\Controllers\CoordinatorsController::class, 'edit'])->name('coordinators.edit');
            Route::get('delete-coordinators/{id}', [App\Http\Controllers\CoordinatorsController::class, 'delete'])->name('coordinators.delete');


             //bursary applications
             Route::get('/new-bursary-application', [App\Http\Controllers\BursaryController::class, 'create'])->name('bursary.application.create');
             Route::any('/all-bursary-application', [App\Http\Controllers\BursaryController::class, 'index'])->name('bursary.application.all');
             Route::post('/save-bursary-application', [App\Http\Controllers\BursaryController::class, 'store'])->name('bursary.application.store');
             Route::get('edit-bursary-application/{id}', [App\Http\Controllers\BursaryController::class, 'edit'])->name('bursary.application.edit');

              //teachers
            Route::get('edit-teacher/{id}', [TeacherController::class, 'edit'])->name('teacher-edit-view');
            Route::get('view-teacher/{id}', [TeacherController::class, 'view'])->name('teacher-view');
            Route::get('view-vtc-teacher/{id}', [VTCTeacherController::class, 'view'])->name('vtc-teacher-view');
            // {{ route('admin.edit-view', $item->id) }}


            Route::get('/new-county', [App\Http\Controllers\CountyController::class, 'create'])->name('county.create');
            Route::any('/all-county', [App\Http\Controllers\CountyController::class, 'index'])->name('county.all');
            Route::post('/save-county', [App\Http\Controllers\CountyController::class, 'store'])->name('county.store');
            Route::get('edit-county/{id}', [App\Http\Controllers\CountyController::class, 'edit'])->name('county.edit');

            Route::get('/ecde_students', [StudentsController::class, 'index'])->name('ecde_students.all');
            Route::get('/vtc_students', [StudentsController::class, 'index'])->name('vtc_students.all');

            Route::get('/create_students', [StudentsController::class, 'create'])->name('students.create');
            Route::any('/students_store', [StudentsController::class, 'store'])->name('students.store');

             //vtc
             Route::get('/vtc_home/{vtc}', [App\Http\Controllers\VTCController::class, 'vtcHome'])->name('vtc_home');
             Route::get('/new-vtc', [App\Http\Controllers\VTCController::class, 'create'])->name('vtc.create');
             Route::any('/all-vtc', [App\Http\Controllers\VTCController::class, 'index'])->name('vtc.all');
             Route::post('/save-vtc', [App\Http\Controllers\VTCController::class, 'store'])->name('vtc.store');
             Route::get('edit-vtc/{id}', [App\Http\Controllers\VTCController::class, 'edit'])->name('vtc.edit');
             Route::get('vtc/delete/{id}', [VTCController::class, 'delete'])->name('delete-vtc');
             Route::get('vtc/edit/{id}', [VTCController::class, 'edit'])->name('edit-vtc');
             Route::post('vtc/edit/{id}', [VTCController::class, 'update'])->name('vtc.edit');




             //vtc dpts
             Route::get('/new-vtc_dept', [App\Http\Controllers\VTCDepartmentsController::class, 'create'])->name('vtc_dept.create');
             Route::any('/all-vtc_dept', [App\Http\Controllers\VTCDepartmentsController::class, 'index'])->name('vtc_dept.all');
             Route::post('/save-vtc_dept', [App\Http\Controllers\VTCDepartmentsController::class, 'store'])->name('vtc_dept.store');
             Route::get('edit-vtc_dept/{id}', [App\Http\Controllers\VTCDepartmentsController::class, 'edit'])->name('vtc_dept.edit');
             Route::get('vtc_dept/delete/{id}', [VTCDepartmentsController::class, 'delete'])->name('delete-vtc_dept');
             Route::get('vtc_dept/edit/{id}', [VTCDepartmentsController::class, 'edit'])->name('edit-vtc_dept');
             Route::post('vtc_dept/edit/{id}', [VTCDepartmentsController::class, 'update'])->name('vtc_dept.edit');

             //vtc_courses
             Route::get('/new-vtc_courses', [App\Http\Controllers\VTCCoursesController::class, 'create'])->name('vtc_courses.create');
             Route::any('/all-vtc_courses', [App\Http\Controllers\VTCCoursesController::class, 'index'])->name('vtc_courses.all');
             Route::post('/save-vtc_courses', [App\Http\Controllers\VTCCoursesController::class, 'store'])->name('vtc_courses.store');
             Route::get('edit-vtc_courses/{id}', [App\Http\Controllers\VTCCoursesController::class, 'edit'])->name('vtc_courses.edit');
             Route::get('vtc_courses/delete/{id}', [VTCCoursesController::class, 'delete'])->name('delete-vtc_courses');
             Route::get('vtc_courses/edit/{id}', [VTCCoursesController::class, 'edit'])->name('edit-vtc_courses');
             Route::post('vtc_courses/edit/{id}', [VTCCoursesController::class, 'update'])->name('vtc_courses.edit');


             //vtc_teachers
             Route::get('/new-vtc_teachers', [App\Http\Controllers\VTCTeacherController::class, 'create'])->name('vtc_teachers.create');
             Route::any('/all-vtc_teachers', [App\Http\Controllers\VTCTeacherController::class, 'index'])->name('vtc_teachers.all');
             Route::post('/save-vtc_teachers', [App\Http\Controllers\VTCTeacherController::class, 'store'])->name('vtc_teachers.store');
             Route::get('edit-vtc_teachers/{id}', [App\Http\Controllers\VTCTeacherController::class, 'edit'])->name('vtc_teachers.edit');
             Route::get('vtc_teachers/delete/{id}', [VTCTeacherController::class, 'delete'])->name('delete-vtc_teachers');
             Route::get('vtc_teachers/edit/{id}', [VTCTeacherController::class, 'edit'])->name('edit-vtc_teachers');
             Route::post('vtc_teachers/edit/{id}', [VTCTeacherController::class, 'update'])->name('vtc_teachers.edit');

              //other_vtc_staff
              Route::get('/new-other_vtc_staff', [App\Http\Controllers\OtherVTCStaffController::class, 'create'])->name('other_vtc_staff.create');
              Route::any('/all-other_vtc_staff', [App\Http\Controllers\OtherVTCStaffController::class, 'index'])->name('other_vtc_staff.all');
              Route::post('/save-other_vtc_staff', [App\Http\Controllers\OtherVTCStaffController::class, 'store'])->name('other_vtc_staff.store');
              Route::get('edit-other_vtc_staff/{id}', [App\Http\Controllers\OtherVTCStaffController::class, 'edit'])->name('other_vtc_staff.edit');
              Route::get('other_vtc_staff/delete/{id}', [OtherVTCStaffController::class, 'delete'])->name('delete-other_vtc_staff');
              Route::get('other_vtc_staff/edit/{id}', [OtherVTCStaffController::class, 'edit'])->name('edit-other_vtc_staff');
              Route::post('other_vtc_staff/edit/{id}', [OtherVTCStaffController::class, 'update'])->name('other_vtc_staff.edit');

              //department_workers
              Route::get('/new-department_workers', [App\Http\Controllers\DepartMentWorkersController::class, 'create'])->name('department_workers.create');
              Route::any('/all-department_workers', [App\Http\Controllers\DepartMentWorkersController::class, 'index'])->name('department_workers.all');
              Route::post('/save-department_workers', [App\Http\Controllers\DepartMentWorkersController::class, 'store'])->name('department_workers.store');
              Route::get('edit-department_workers/{id}', [App\Http\Controllers\DepartMentWorkersController::class, 'edit'])->name('department_workers.edit');
              Route::get('department_workers/delete/{id}', [DepartMentWorkersController::class, 'delete'])->name('delete-department_workers');
              Route::get('department_workers/edit/{id}', [DepartMentWorkersController::class, 'edit'])->name('edit-department_workers');
              Route::post('department_workers/edit/{id}', [DepartMentWorkersController::class, 'update'])->name('department_workers.edit');

             //vtc student
            Route::get('/vtc_create_students', [VTCStudentController::class, 'create'])->name('vtc_students.create');
            Route::any('/vtc_students_store', [VTCStudentController::class, 'store'])->name('vtc_students.store');



            //  Generate Staff Returns
            Route::get('generate_staff_returns', [TeacherController::class, 'generateStaffReturns'])->name('generate_staff_returns');
            Route::get('generate_vtc_staff_returns', [VTCTeacherController::class, 'generateVTCStaffReturns'])->name('generate_vtc_staff_returns');
            Route::get('generate_dpt_staff_returns', [DepartMentWorkersController::class, 'generateDPTStaffReturns'])->name('generate_dpt_staff_returns');

            // dpts within a vtc
            Route::get('dpts_within_vtc/{vtc}', [App\Http\Controllers\VTCController::class, 'dptsWithinVtc'])->name('dpts_within_vtc');
            // dpts within a vtc
            Route::get('coursesWithinVtcDPT/{dpt}', [App\Http\Controllers\VTCDepartmentsController::class, 'coursesWithinVtcDPT'])->name('coursesWithinVtcDPT');


        });});

});
