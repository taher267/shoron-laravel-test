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

Route::get('dashboard', function() {
    return view('admin.day.day');
});
//Login resource
Route::get('login/admin', [LoginController::class, 'login'])->name('admin.login');
Route::post('login/admin', [LoginController::class, 'authenticate'])->name('admin.authenticate');

Route::resource('login', \App\Http\Controllers\Auth\LoginController::class);
// Class day resource
Route::resource('day', ClassDayController::class);
//Class Time resourece
Route::resource('time', ClassTimeController::class);


// Route::get('schedule', function() {
   
// 	$this->data['ouraddress'] = OurAddress::findOrFail(1);
//     $this->data['days'] = ClassDay::all();
//    return view('schedule', $this->data);
// })->name('schedule');

//schedule Resource
Route::resource('schedule', ScheduleController::class);


Route::get('about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('trainer', [TrainerController::class, 'index'])->name('trainers');

Route::get('classes', [CourseClassController::class, 'index'])->name('classes');
Route::get('classes/{id}', [CourseClassController::class, 'show'])->where('id', '[0-9]+')->name('classe.details');
Route::get('classes/category/{id}', [CourseClassController::class, 'category'])->where('id', '[0-9]+')->name('classes.category');

//Admin dashboard news list
Route::get('newslist', [NewsController::class, 'newslist'])->name('news.list');

//Admin dashboard news create
Route::get('news/create', [NewsController::class, 'create'])->name('news.create');

// Route::resource('news', 'NewsController');
Route::post('news', [NewsController::class, 'store'])->name('news.store');


//news menu page
// Route::resource('news', 'NewsController');
Route::get('news', [NewsController::class, 'index'])->name('news');

// Route::get('news/category/{id}', [NewsController::class, 'show'])->where('id','[0-9]+')->name('news.category');

Route::get('news/category/{slug}', [NewsController::class, 'show'])->name('news.category');


//news details using id
Route::get('news/details/{slug}', [NewsController::class, 'newsdetails'])->name('news.details');

// News edit
Route::get('news/edit/{slug}', [NewsController::class, 'edit'])->name('news.edit');
Route::put('news/update/{slug}', [NewsController::class, 'update'])->name('news.update');
Route::get('contact', [ContactUsController::class, 'index'])->name('contact');

// Route::get('post/create', [PostController::class, 'create'])->name('post.create');
// Route::post('post/create', [PostController::class, 'store'])->name('post.store');

// Route::get('post/list', function() {
//     return view('post_list');
// });


