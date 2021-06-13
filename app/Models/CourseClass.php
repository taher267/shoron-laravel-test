<?php

namespace App\Models;

use App\Models\ClassTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;

    //for different table name

    // protected $table = 'different_table';

     public function classTimes()
    {
        return $this->hasMany(ClassTime::class);
    }

    /**
     * Getting array for select option of Schedule
     */
    public static function arrClassForSchedule()
    {
        $arr = [];
        $classes = self::all();

        foreach ($classes as $class) {
            $arr[$class->id] = $class->title;
        }
        return $arr;
    }
}
