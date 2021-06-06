<?php

use App\Http\Controllers\BuildingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\CourseClassController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TrainerController;
use Illuminate\Support\Facades\Route;

Route::get('schedule', function() {
	$this->data['ouraddress'] = \App\Models\OurAddress::findOrFail(1);
   return view('schedule', $this->data);
});

Route::get('about', [App\Http\Controllers\AboutUsController::class, 'index'])->name('about');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('trainer', [TrainerController::class, 'index'])->name('trainers');

Route::get('classes', [CourseClassController::class, 'index'])->name('classes');
Route::get('classes/{id}', [CourseClassController::class, 'show'])->where('id', '[0-9]+')->name('classe.details');
Route::get('classes/category/{id}', [CourseClassController::class, 'category'])->where('id', '[0-9]+')->name('classes.category');


Route::get('news', [NewsController::class, 'index'])->name('news');
Route::get('news/{id}', [NewsController::class, 'show'])->where('id','[0-9]+')->name('news.category');
Route::get('news/details/{id}', [NewsController::class, 'newsdetails'])->where('id','[0-9]+')->name('news.details');

Route::get('contact', [ContactUsController::class, 'index'])->name('contact');
Route::post('contact', [ContactUsController::class, 'create']);


