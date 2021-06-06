<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    // public function uniqueArrForGallary()
    // {
    //   $arr =[] ;
    //   $courses = Gallery::all();
    //     foreach ($courses as $course) {
    //         $arr[$course->id] = $course->course;
    //     }
    //     return $arr;
    // }
}
