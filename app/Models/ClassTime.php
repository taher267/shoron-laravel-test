<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassTime extends Model
{
    use HasFactory;
    protected $fillable = ['day_id', 'time', 'class_id', 'trainer_id'];
    

    /**
     * show day according to day_id/class_time_id
     */
     public function day()
    {
        return $this->hasOne(ClassDay::class, 'id','day_id' );
    }
    

    /**
         * show trainer Name according to trainer_id/class_time_id
         */
         public function trainer()
        {
            return $this->hasOne(Trainer::class, 'id','trainer_id');
        }


    /**
     * show course Name according to class_id/class_time_id
     */
    public function course()
    {
        return $this->hasOne(CourseClass::class, 'id', 'class_id');
    }

    // for ClassTime models
    // public function time()
    // {
    //     return $this->belongsTo(ClassTime::class);
    // }

    // public function user()
    // {
    //     return $this->belongsTo(User::class, 'foreign_key', 'other_key');
    // }



    
}
