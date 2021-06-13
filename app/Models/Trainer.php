<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    use HasFactory;
    
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
}
