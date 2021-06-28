<?php

namespace App\Models;

use App\Models\ClassTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'trainer_image', 'class_time_id'];
    
    /**
     * Getting array for select option of Schedule
     */

    public static function arrTrainersForSchedule()
    {
        $arr =[];
        $trainers = self::all();
        foreach ($trainers as $trainer) {
            $arr[$trainer->id] = $trainer->name; 
        }

        return $arr;
    }

    public function trainerclasstime()
    {
        return $this->hasOne(ClassTime::class, 'id', 'class_time_id');
    }
}
