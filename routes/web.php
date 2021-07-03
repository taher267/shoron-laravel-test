<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClassDayController;
use App\Http\Controllers\ClassTimeController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\TrainerController;
use App\Models\ClassDay;
use App\Models\OurAddress;
use Illuminate\Support\Facades\Route;

//Login route

Route::post('auth/login', [AdminController::class, 'check'])->name('auth.check');

Route::post('auth/register', [AdminController::class, 'save'])->name('auth.save');






Route::get('/about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/trainers', [TrainerController::class, 'trainers'])->name('trainers');

Route::get('/classes', [CourseClassController::class, 'classes'])->name('classes');
Route::get('/classes/{slug}', [CourseClassController::class, 'classdetails'])->name('classe.details');
//Category wise Classes
Route::get('/class/{category}', [CourseClassController::class, 'categoryclasses'])->name('class.category');
//Category wise Class Details
Route::get('/class/{caregory}/{slug}', [CourseClassController::class, 'categoryclassdetails'])->name('class.category.show');

//////////////////////////////////////////////////////////////

//Auth Middleware
Route::group(['middleware' => ['auth.midware']], function() {

    Route::get('auth/login', [AdminController::class, 'login'])->name('auth.login');
    Route::get('auth/register', [AdminController::class, 'register'])->name('auth.register');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    //Trainers Resource for Admin/Dashboard
    Route::resource('/dashboard/trainer', TrainerController::class);
    //Dashboard or Admin
    Route::resource('/dashboard/class', CourseClassController::class);

    //category Resource
    Route::resource('/category', CategoryController::class);

    //contact or contact us Resource
    Route::resource('/dashboard/contact', ContactUsController::class);

    Route::get('/auth/logout', [AdminController::class, 'logout'])->name('auth.logout');
    // Class day resource
    Route::resource('/dashboard/schedule/day', ClassDayController::class);
    //Class Time resourece
    Route::resource('/dashboard/schedule/time', ClassTimeController::class);
    //Admin dashboard news Table
    Route::get('/dashboard/news', [NewsController::class, 'newslist'])->name('news.list');
    //Admin dashboard/admin news create
    Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');

    Route::post('/news', [NewsController::class, 'store'])->name('news.store');
    // News edit for admin dashboard
    Route::get('/news/edit/{slug}', [NewsController::class, 'edit'])->name('news.edit');
    //News update
    Route::put('/news/update/{slug}', [NewsController::class, 'update'])->name('news.update');

    //News update
    Route::put('/news/statusupdate/{id}', [NewsController::class, 'statusupdate'])->name('news.update.status');
    
    //News delete for admin/Dashboard
    Route::delete('/news/destroy/{slug}', [NewsController::class, 'destroy'] )->name('news.destroy');

    //Admin or User Resource Controller
    Route::resource('/dashboard/user', AdminController::class);
    //schedule Resource
    Route::resource('/schedule', ScheduleController::class);


});
///////////////////////////////////////////////////////////////

//NEWS ROURE
//news menu page
Route::get('/news', [NewsController::class, 'index'])->name('news');
//News Details
Route::get('/news/details/{details}', [NewsController::class, 'show'])->name('news.show');

//Category wise newses
Route::get('/news/{category}', [NewsController::class, 'categorynews'])->name('news.category');
//Category wise news Details
Route::get('/news/{caregory}/{details}', [NewsController::class, 'categorynewsdetails'])->name('news.category.show');



//CONTACT ROUTE
//contact Form
Route::get('/contact-form',[ContactUsController::class, 'contactform'])->name('contact.form');
Route::post('/contactform',[ContactUsController::class, 'contactsend'])->name('contact.send');
