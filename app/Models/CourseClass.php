<?php

namespace App\Models;

use App\Models\ClassTime;
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

    public function classdetailstime()
    {
        return $this->hasOne(ClassTime::class, 'id', 'class_time');
    }

    //
    public function classcategory()
    {
        return $this->belongsTo(Category::class, 'build_id', 'id');
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
