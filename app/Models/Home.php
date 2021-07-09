<?php

namespace App\Models;

use App\Models\ClassDay;
use App\Models\CourseClass;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    use HasFactory;

    // public function trainer()
    // {
    //     return $this->hasMany(Trainer::class);
    // }
    
    public static function uniqueArrForGallary()
    {
      $arr =[] ;
      $courses = Gallery::all();
        foreach ($courses as $course) {
            $arr[$course->id] = $course->course_id;
        }
        $arr = array_unique($arr);
        sort($arr);
        return $arr;
    }



}
