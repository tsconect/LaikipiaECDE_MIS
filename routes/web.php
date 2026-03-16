<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\ChiefsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentsController;
use App\Http\Controllers\VTCStudentController;
use App\Http\Controllers\VTCTeacherController;
use App\Http\Controllers\SubLocationController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\Zones\ConstController;
use App\Http\Controllers\ChiefProfileController;
use App\Http\Controllers\Student\AuthController;
use App\Http\Controllers\Student\AccountController;
use App\Http\Controllers\DepartMentWorkersController;
use App\Http\Controllers\Student\RegistrationController;

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
// student
Route::get('/', [App\Http\Controllers\FrontController::class, 'index'])->name('home');
Route::get('/student/register', [App\Http\Controllers\FrontController::class, 'register'])->name('student.register');
Route::post('/register/store', [RegistrationController::class, 'store'])->name('register.store');
Route::get('/test',[AccountController::class, 'test'])->name('test');

// 

// students
Route::prefix('students')->group(function () {
  Route::post('/students/login', [AuthController::class, 'login'])->name('login.submit');

  Route::group(['middleware' => ['auth', 'role:student'],], function () {
    Route::get('/dashboard', [AccountController::class, 'dashboard'])->name('student.dashboard');
    Route::get('/logout', [AuthController::class, 'logout'])->name('student.logout');
    Route::get('/student-profile', [AccountController::class, 'student_profile'])->name('student.profile');
    Route::get('/my-appliactions', [AccountController::class, 'myApplications'])->name('student.applications'); 
    Route::get('/my-account', [AccountController::class, 'account'])->name('student.account'); 
    Route::get('/bursary/applications/view/{id}', [AccountController::class, 'application_view'])->name('student.application.view');
    Route::get('/bursary/application/{id}', [AccountController::class, 'bursary_appplication'])->name('bursary.application'); 
    Route::post('/profile', [AccountController::class, 'update'])->name('student.profile.update');
    Route::post('/student-details/update', [AccountController::class, 'details_update'])->name('student.details.update');
    Route::put('/student-details/update', [AccountController::class, 'profile_update'])->name('student.user.profile.update');


  });
});











Route::get('/bursary-status-query', [App\Http\Controllers\Student\ApplicationsController::class, 'applicationStatus'])->name('applicationStatus');
Route::get('/view-bursary-application', [App\Http\Controllers\Student\ApplicationsController::class, 'viewApplication'])->name('viewApplication');

Route::post('/store', [App\Http\Controllers\Student\ApplicationsController::class, 'store'])->name('student.store');
// register.custom
Route::any('register_custom', [UsersController::class, 'register'])->name('register.custom');
Route::post('/admin/login/submit', [AuthController::class, 'admin_login'])->name('admin.login.submit');
Route::get('/admin/login', [AuthController::class, 'admin_login_view'])->name('admin.login'); 
Route::get('/chief/login', [AuthController::class, 'admin_login_view'])->name('chief.login'); 
Auth::routes();


// chiefs

Route::group(['middleware' => ['auth', 'role:chief'],], function () {
  Route::prefix('chief')->group(function () {
    Route::name('chief.')->group(function () {
      Route::get('/dashboard', [App\Http\Controllers\ChiefsController::class, 'dashboard'])->name('home');
      Route::any('/all-bursary-application', [App\Http\Controllers\ChiefsController::class, 'bursary_applications'])->name('bursary.application.all');
      Route::get('/students', [App\Http\Controllers\ChiefsController::class, 'students'])->name('students.all');
      Route::get('/bursary/{id}/applications', [App\Http\Controllers\ChiefsController::class, 'show_bursary'])->name('bursary.applications.view'); 
      Route::get('/bursary/applications/review/{id}', [App\Http\Controllers\ChiefsController::class, 'application_review'])->name('application.review');
      Route::get('/bursary/applications/view/{id}', [App\Http\Controllers\ChiefsController::class, 'application_view'])->name('application.view');
      Route::post('/chiefs-reviews/store', [App\Http\Controllers\ChiefsController::class, 'store_review'])->name('reviews.store'); 
      Route::get('/bursary/applications/reviewed/', [App\Http\Controllers\ChiefsController::class, 'reviewed_applications'])->name('applications.reviewed');
      Route::get('/bursary/applications/unreviewed/', [App\Http\Controllers\ChiefsController::class, 'unreviewed_applications'])->name('applications.unreviewed');
      Route::get('/student/view/{id}', [ChiefsController::class, 'student_view'])->name('student.view');



      Route::post('/update-password', [ChiefProfileController::class, 'changePassword'])->name('password.update');
      Route::get('/profile', [ChiefProfileController::class, 'show'])->name('profile');
      Route::post('/profile', [ChiefProfileController::class, 'update'])->name('profile.update');
    });
  });
});



// admin
Route::group(['middleware' => ['auth', 'role:admin'],], function () {
    Route::prefix('admin')->group(function () {
        Route::name('admin.')->group(function () {
          Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
              //teachers
              Route::get('chiefs/all', [ChiefsController::class, 'index'])->name('chiefs.all');
              Route::get('chiefs/create', [ChiefsController::class, 'create'])->name('chiefs.create');
              Route::post('/admin/chiefs/store', [ChiefsController::class, 'store'])->name('chiefs.store');
              // Route::get('view-vtc-teacher/{id}', [ChiefsController::class, 'view'])->name('vtc-teacher-view');
              // {{ route('admin.edit-view', $item->id) }}

            // bursary applications
            Route::any('/all-bursary-application', [App\Http\Controllers\BursaryController::class, 'bursary_applications'])->name('bursary.application.all');
            Route::get('/bursary/applications/reviewed/', [App\Http\Controllers\BursaryController::class, 'reviewed_applications'])->name('applications.reviewed');
            Route::get('/bursary/applications/unreviewed/', [App\Http\Controllers\BursaryController::class, 'unreviewed_applications'])->name('applications.unreviewed');
            Route::get('/bursary/applications/released/', [App\Http\Controllers\BursaryController::class, 'released_applications'])->name('applications.released');
            Route::get('/bursary/applications/view/{id}', [App\Http\Controllers\BursaryController::class, 'application_view'])->name('application.view');
            Route::get('/bursary/applications/assign-cheque/{id}', [App\Http\Controllers\BursaryController::class, 'assign_cheque'])->name('application.assign_cheque');
            Route::post('/application/assign/cheque',  [App\Http\Controllers\BursaryController::class, 'storeCheque'])->name('application.assign.cheque');

            // 

            Route::any('/reports/bursary/all', [ReportsController::class, 'index'])->name('reports.bursary.all');
            Route::any('/reports/bursary/approved', [ReportsController::class, 'approved_bursary_reports'])->name('reports.bursary.approved');
            Route::get('/approved/pdf', [ReportsController::class, 'approved_bursary_pdf'])->name('reports.approved_pdf'); 
            Route::get('/approved/excel', [ReportsController::class, 'approved_bursary_excel'])->name('reports.approved_excel'); 
            
            Route::get('/reports/pending', [ReportsController::class, 'pending_bursary_reports'])->name('reports.bursary.pending');
            Route::get('/pending/pdf', [ReportsController::class, 'pending_bursary_pdf'])->name('reports.pending_pdf'); 
            Route::get('/pending/excel', [ReportsController::class, 'pending_bursary_excel'])->name('reports.pending_excel'); 

            Route::get('/reports/rejected', [ReportsController::class, 'rejected_bursary_reports'])->name('reports.bursary.rejected');
            Route::get('/rejected/pdf', [ReportsController::class, 'rejected_bursary_pdf'])->name('reports.rejected_pdf'); 
            Route::get('/rejected/excel', [ReportsController::class, 'rejected_bursary_excel'])->name('reports.rejected_excel'); 
            Route::get('/reports/bursary-reports/{id}', [ReportsController::class, 'bursary_reports'])->name('reports.bursary.view'); 


            Route::get('/reports/chief/rejected-applications', [ReportsController::class, 'chief_rejected_reports'])->name('reports.chief.rejected');
            Route::get('/cdf-committee/rejected-applications', [ReportsController::class, 'cdf_rejected_reports'])->name('reports.cdf.rejected');
            Route::get('/reports/all-students', [ReportsController::class, 'all_students_reports'])->name('reports.students.registered');
            Route::get('reports/all-chefs', [ReportsController::class, 'all_chiefs_reports'])->name('reports.chiefs.registered');

            Route::get('/rejected/chief', [ReportsController::class, 'chief_rejected_bursary_pdf'])->name('chief.rejected_pdf'); 
            Route::get('/rejected/cdf', [ReportsController::class, 'cdf_rejected_bursary_pdf'])->name('cdf.rejected_pdf');
            Route::get('/students/pdf', [ReportsController::class, 'registered_students_pdf'])->name('students.registered_pdf');
            Route::get('/chiefs/pdf', [ReportsController::class, 'registered_chiefs_pdf'])->name('chiefs.registered_pdf');


            // students
            Route::get('/students', [StudentsController::class, 'index'])->name('students.all');
            Route::get('/students/approved', [StudentsController::class, 'approved_students'])->name('students.approved');
            Route::get('/students/pending', [StudentsController::class, 'pending_students'])->name('students.pending');
            Route::get('/students/approve/{id}', [StudentsController::class, 'approve_students'])->name('student.approve');
            Route::post('/student/account/approve', [StudentsController::class, 'approve_student_account'])->name('student.account.approve');

            Route::get('/student/view/{id}', [StudentsController::class, 'student_view'])->name('student.view');









            // 
            // user profile
            Route::post('/update-password', [UserProfileController::class, 'changePassword'])->name('password.update');
            Route::get('/profile', [UserProfileController::class, 'show'])->name('profile');
            Route::post('/profile', [UserProfileController::class, 'update'])->name('profile.update');
            Route::get('/staff', [UserProfileController::class, 'index'])->name('staff');



            //constituencies
            Route::get('/new-constituency', [App\Http\Controllers\Zones\ConstController::class, 'create'])->name('const.create');
            Route::any('/all-constituency', [App\Http\Controllers\Zones\ConstController::class, 'index'])->name('const.all');
            Route::post('/save-constituency', [App\Http\Controllers\Zones\ConstController::class, 'store'])->name('const.store');
            Route::get('edit-constituency/{id}', [App\Http\Controllers\Zones\ConstController::class, 'edit'])->name('const.edit');
            Route::get('constituency/delete/{id}', [ConstController::class, 'delete'])->name('delete-constituency');
            Route::get('constituency/edit/{id}', [ConstController::class, 'edit'])->name('edit-constituency');
            // Route::post('constituency/update/{id}', [ConstController::class, 'update'])->name('const.edit');
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


          

             //bursary applications
             Route::get('/new-bursary-application', [App\Http\Controllers\BursaryController::class, 'create'])->name('bursary.application.create');
             Route::any('/all-bursary-application', [App\Http\Controllers\BursaryController::class, 'index'])->name('bursary.application.all');
             Route::post('/save-bursary-application', [App\Http\Controllers\BursaryController::class, 'store'])->name('bursary.application.store');
             Route::get('edit-bursary-application/{id}', [App\Http\Controllers\BursaryController::class, 'edit'])->name('bursary.application.edit');
             Route::get('/bursary/{id}/applications', [App\Http\Controllers\BursaryController::class, 'show'])->name('bursary.applications.view'); 

              //applications 
            Route::get('/bursary/applications/review/{id}', [App\Http\Controllers\BursaryController::class, 'application_review'])->name('application.review');
            Route::post('/reviews/store', [App\Http\Controllers\BursaryController::class, 'store_review'])->name('reviews.store');



            

            Route::get('/new-location', [App\Http\Controllers\LocationController::class, 'create'])->name('location.create');
            Route::any('/all-locations', [App\Http\Controllers\LocationController::class, 'index'])->name('location.all');
            Route::post('/save-locations', [App\Http\Controllers\LocationController::class, 'store'])->name('location.store');


            Route::get('/new-county', [App\Http\Controllers\CountyController::class, 'create'])->name('county.create');
            Route::any('/all-county', [App\Http\Controllers\CountyController::class, 'index'])->name('county.all');
            Route::post('/save-county', [App\Http\Controllers\CountyController::class, 'store'])->name('county.store');
            Route::get('edit-county/{id}', [App\Http\Controllers\CountyController::class, 'edit'])->name('county.edit');

            Route::get('/ecde_students', [StudentsController::class, 'index'])->name('ecde_students.all');
            Route::get('/vtc_students', [StudentsController::class, 'index'])->name('vtc_students.all');

            Route::get('/create_students', [StudentsController::class, 'create'])->name('students.create');
            Route::any('/students_store', [StudentsController::class, 'store'])->name('students.store');


            // cheques

            
            Route::get('/cheques/all', [ChequeController::class, 'index'])->name('cheques.all'); 
            Route::get('/cheques/create', [ChequeController::class, 'create'])->name('cheques.create');
            Route::post('/cheques/store', [ChequeController::class, 'store'])->name('cheques.store');
            Route::get('/cheques/assign/{id}', [ChequeController::class, 'assign'])->name('cheques.assign');
            Route::post('/cheques/assign/students', [ChequeController::class, 'assign_students'])->name('cheques.assign.students');
            Route::post('/student/assign/cheque', [ChequeController::class, 'assign_student'])->name('cheques.assign.student');

            Route::get('/cheques/view/{id}', [ChequeController::class, 'view'])->name('cheques.view');

            




          



        });});

});
