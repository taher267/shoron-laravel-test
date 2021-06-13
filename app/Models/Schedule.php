<?php

namespace App\Models;

use App\Models\ClassDay;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;

    public static function arrForClassDay($first_day_week =2)
    {
      $data = ClassDay::all();
      $datas = ClassDay::all();
      return collect($data) 
      ->map(function($item) use($first_day_week){
        if ($item->id > $first_day_week ) {
           return $item->day;
        }

        });

      // return collect($datas) 
      // ->map(function($day) use($first_day_week){
      //   if ($day->id <= $first_day_week) {
      //    return $day->day; 
      //   }
      // });
    }
}
