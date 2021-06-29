<?php

use App\Http\Controllers\Auth\LoginController;
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

Route::get('/dashboard', function() {
    return view('admin.day.day');
})->name('dashboard');
//Login resource
Route::get('/login/admin', [LoginController::class, 'login'])->name('admin.login');
Route::post('/login/admin', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::resource('/login', \App\Http\Controllers\Auth\LoginController::class);
// Class day resource
Route::resource('/schedule/day', ClassDayController::class);
//Class Time resourece
Route::resource('/schedule/time', ClassTimeController::class);


// Route::get('schedule', function() {
   
// 	$this->data['ouraddress'] = OurAddress::findOrFail(1);
//     $this->data['days'] = ClassDay::all();
//    return view('schedule', $this->data);
// })->name('schedule');

//schedule Resource
Route::resource('/schedule', ScheduleController::class);


Route::get('/about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/trainers', [TrainerController::class, 'trainers'])->name('trainers');

//Trainers Resource for Admin/Dashboard
Route::resource('/dashboard/trainer', TrainerController::class);

Route::get('/classes', [CourseClassController::class, 'classes'])->name('classes');
Route::get('/classes/{slug}', [CourseClassController::class, 'classdetails'])->name('classe.details');
//Category wise Classes
Route::get('/class/{category}', [CourseClassController::class, 'categoryclasses'])->name('class.category');
//Category wise Class Details
Route::get('/class/{caregory}/{slug}', [CourseClassController::class, 'categoryclassdetails'])->name('class.category.show');


//Dashboard or Admin
Route::resource('/dashboard/class', CourseClassController::class);


//news menu page

Route::get('/news', [NewsController::class, 'index'])->name('news');


//News Details
Route::get('/news/details/{details}', [NewsController::class, 'show'])->name('news.show');

//Category wise newses
Route::get('/news/{category}', [NewsController::class, 'categorynews'])->name('news.category');
//Category wise news Details
Route::get('/news/{caregory}/{details}', [NewsController::class, 'categorynewsdetails'])->name('news.category.show');
//Admin dashboard news Table
Route::get('/dashboard/news', [NewsController::class, 'newslist'])->name('news.list');
//Admin dashboard/admin news create
Route::get('/news/create', [NewsController::class, 'create'])->name('news.create');

Route::post('/news', [NewsController::class, 'store'])->name('news.store');
// News edit for admin dashboard
Route::get('/news/edit/{slug}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('/news/update/{slug}', [NewsController::class, 'update'])->name('news.update');
//News delete for admin/Dashboard
Route::delete('/news/destroy/{slug}', [NewsController::class, 'destroy'] )->name('news.destroy');

//category Resource
Route::resource('/category', CategoryController::class);

//contact or contact us Resource
Route::resource('/dashboard/contact', ContactUsController::class);



Route::get('/contact-form',[ContactUsController::class, 'contactform'])->name('contact.form');

Route::post('/contactform',[ContactUsController::class, 'contactsend'])->name('contact.send');
