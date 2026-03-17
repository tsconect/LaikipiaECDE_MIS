<?php

use App\Http\Controllers\CommunicationController;
use App\Http\Controllers\ConstituencyController;
use App\Http\Controllers\CountyController;
use App\Http\Controllers\DepartMentWorkersController;
use App\Http\Controllers\ESchoolController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\SubLocationController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\VTCStudentController;
use App\Http\Controllers\VTCTeacherController;
use App\Http\Controllers\WardController;
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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
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

           

            //sublocation
            // admin/
            //
         
            //

            //Unions
            Route::get('/new-unions', [App\Http\Controllers\UnionController::class, 'create'])->name('unions.create');
            Route::any('/all-unions', [App\Http\Controllers\UnionController::class, 'index'])->name('unions.all');
            Route::post('/save-unions', [App\Http\Controllers\UnionController::class, 'store'])->name('unions.store');
            Route::get('edit-unions/{union}', [App\Http\Controllers\UnionController::class, 'edit'])->name('edit.union');
            Route::post('update-unions/{union}', [App\Http\Controllers\UnionController::class, 'update'])->name('union.update');


            //school
            Route::resource('ecde-schools', ESchoolController::class);
           
            //feeder school
            Route::resource('feeder-schools', App\Http\Controllers\FeederSchoolsController::class);
        
            Route::resource('teachers', TeacherController::class);
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
           
            // {{ route('admin.edit-view', $item->id) }}



            Route::resource('ecde-students', StudentsController::class);
       

            Route::get('/create_students', [StudentsController::class, 'create'])->name('students.create');
            Route::any('/students_store', [StudentsController::class, 'store'])->name('students.store');

            // loactional details
            Route::resource('counties', CountyController::class);
            Route::resource('wards', WardController::class);
            Route::resource('sub-counties', ConstituencyController::class);
            Route::resource('sub-locations', SubLocationController::class);


                    Route::get('sms-dashboard', [CommunicationController::class, 'index'])->name('sms-dashboard');

        Route::get('sms-logs', [CommunicationController::class, 'sms_logs'])->name('sms-logs.index');
        Route::post('send-sms', [CommunicationController::class, 'sendSms'])->name('sms.send');


              //department_workers
            //   Route::get('/new-department_workers', [App\Http\Controllers\DepartMentWorkersController::class, 'create'])->name('department_workers.create');
            //   Route::any('/all-department_workers', [App\Http\Controllers\DepartMentWorkersController::class, 'index'])->name('department_workers.all');
            //   Route::post('/save-department_workers', [App\Http\Controllers\DepartMentWorkersController::class, 'store'])->name('department_workers.store');
            //   Route::get('edit-department_workers/{id}', [App\Http\Controllers\DepartMentWorkersController::class, 'edit'])->name('department_workers.edit');
            //   Route::get('department_workers/delete/{id}', [DepartMentWorkersController::class, 'delete'])->name('delete-department_workers');
            //   Route::get('department_workers/edit/{id}', [DepartMentWorkersController::class, 'edit'])->name('edit-department_workers');
            //   Route::post('department_workers/edit/{id}', [DepartMentWorkersController::class, 'update'])->name('department_workers.edit');



            //  Generate Staff Returns
            Route::get('generate_staff_returns', [TeacherController::class, 'generateStaffReturns'])->name('generate_staff_returns');
            Route::get('generate_dpt_staff_returns', [DepartMentWorkersController::class, 'generateDPTStaffReturns'])->name('generate_dpt_staff_returns');

            // dpts within a vtc
            
            // dpts within a vtc
            


        });});

});
