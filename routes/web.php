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

Route::get('/', [App\Http\Controllers\FrontController::class, 'index']);
Route::get('/bursary-status-query', [App\Http\Controllers\Student\ApplicationsController::class, 'applicationStatus'])->name('applicationStatus');
Route::get('/view-bursary-application', [App\Http\Controllers\Student\ApplicationsController::class, 'viewApplication'])->name('viewApplication');

Route::post('/store', [App\Http\Controllers\Student\ApplicationsController::class, 'store'])->name('student.store');
// register.custom
Route::any('register_custom', [UsersController::class, 'register'])->name('register.custom');
Auth::routes();

// Public CMS Routes
Route::get('/page/{slug}', [App\Http\Controllers\CMS\PublicCMSController::class, 'showPage'])->name('cms.page');
Route::get('/blog', [App\Http\Controllers\CMS\PublicCMSController::class, 'posts'])->name('cms.posts');
Route::get('/blog/{slug}', [App\Http\Controllers\CMS\PublicCMSController::class, 'showPost'])->name('cms.post');
Route::get('/galleries', [App\Http\Controllers\CMS\PublicCMSController::class, 'galleries'])->name('cms.galleries');
Route::get('/gallery/{slug}', [App\Http\Controllers\CMS\PublicCMSController::class, 'showGallery'])->name('cms.gallery');
Route::get('/faqs', [App\Http\Controllers\CMS\PublicCMSController::class, 'faqs'])->name('cms.faqs');
Route::get('/testimonials', [App\Http\Controllers\CMS\PublicCMSController::class, 'testimonials'])->name('cms.testimonials');
Route::get('/announcements', [App\Http\Controllers\CMS\PublicCMSController::class, 'announcements'])->name('cms.announcements');
Route::get('/announcements/{id}', [App\Http\Controllers\CMS\PublicCMSController::class, 'showAnnouncement'])->name('cms.announcement.show');
Route::get('/contact', [App\Http\Controllers\CMS\PublicCMSController::class, 'contactForm'])->name('cms.contact');
Route::post('/contact', [App\Http\Controllers\CMS\PublicCMSController::class, 'submitContact'])->name('cms.contact.submit');

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


            Route::get('/new-county', [App\Http\Controllers\CountyController::class, 'create'])->name('county.create');
            Route::any('/all-county', [App\Http\Controllers\CountyController::class, 'index'])->name('county.all');
            Route::post('/save-county', [App\Http\Controllers\CountyController::class, 'store'])->name('county.store');
            Route::get('edit-county/{id}', [App\Http\Controllers\CountyController::class, 'edit'])->name('county.edit');

            Route::get('/ecde_students', [StudentsController::class, 'index'])->name('ecde_students.all');
       

            Route::get('/create_students', [StudentsController::class, 'create'])->name('students.create');
            Route::any('/students_store', [StudentsController::class, 'store'])->name('students.store');

            


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

// CMS Routes
Route::group(['prefix' => 'admin/cms', 'middleware' => ['auth'], 'as' => 'admin.cms.'], function () {
    
    // Pages
    Route::resource('pages', App\Http\Controllers\CMS\PageController::class);
    
    // Posts/Blog
    Route::resource('posts', App\Http\Controllers\CMS\PostController::class);
    
    // Galleries
    Route::resource('galleries', App\Http\Controllers\CMS\GalleryController::class);
    Route::post('galleries/{gallery}/upload-images', [App\Http\Controllers\CMS\GalleryController::class, 'uploadImages'])->name('galleries.upload-images');
    Route::delete('gallery-images/{image}', [App\Http\Controllers\CMS\GalleryController::class, 'deleteImage'])->name('gallery-images.delete');
    
    // Testimonials
    Route::resource('testimonials', App\Http\Controllers\CMS\TestimonialController::class);
    
    // Announcements
    Route::resource('announcements', App\Http\Controllers\CMS\AnnouncementController::class);
    
    // FAQs
    Route::resource('faqs', App\Http\Controllers\CMS\FAQController::class);
    
    // Contact Messages
    Route::get('contact-messages', [App\Http\Controllers\CMS\ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{message}', [App\Http\Controllers\CMS\ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::post('contact-messages/{message}/reply', [App\Http\Controllers\CMS\ContactMessageController::class, 'reply'])->name('contact-messages.reply');
    Route::post('contact-messages/{message}/mark-as-read', [App\Http\Controllers\CMS\ContactMessageController::class, 'markAsRead'])->name('contact-messages.mark-as-read');
    Route::delete('contact-messages/{message}', [App\Http\Controllers\CMS\ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
    
    // Settings
    Route::get('settings', [App\Http\Controllers\CMS\SettingsController::class, 'index'])->name('settings.index');
    Route::put('settings', [App\Http\Controllers\CMS\SettingsController::class, 'update'])->name('settings.update');
});
