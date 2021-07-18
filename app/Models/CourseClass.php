<?php

namespace App\Models;

use App\Models\ClassTime;
use App\Models\Trainer;
use App\Models\Gallery;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseClass extends Model
{
    use HasFactory;

    //for different table name
    protected $fillable = ['title', 'description', 'slug', 'class_time', 'trainer', 'date', 'time'];
    // protected $table = 'different_table';

     public function classTimes()
    {
        return $this->hasMany(ClassTime::class);
    }
    //Class time
    public function classtime()
    {
        return $this->hasOne(ClassTime::class, 'id', 'class_time');
    }
    //Class of Trainer
    public function classtrainer()
    {
        return $this->hasOne(Trainer::class, 'id', 'trainer');
    }

    public function classdetailstime()
    {
        return $this->hasOne(ClassTime::class, 'id', 'class_time');
    }

    //
    public function classcategory()
    {
        return $this->belongsTo(Category::class, 'build_id', 'id');
    }

    //
    public function gallery()
    {
        return $this->belongsTo(Gallery::class, 'course_id', 'id');
    }


    /**
     * Getting array for select option of Schedule
     */
    public static function arrOfClassName()
    {
        $arr = [];
        $classes = self::all();

        foreach ($classes as $class) {
            $arr[$class->id] = $class->title;
        }
        return $arr;
    }
}
