<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassDay extends Model
{
    use HasFactory;
    protected $fillable = ['day'];

    public static function arrDayForSchedule()
    {
        $arr= [];
        $days = self::all();
        foreach ($days as $day) {
            $arr[$day->id] = $day->day;
        }
        return $arr;
    }
}
