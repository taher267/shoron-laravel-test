<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    //     public function classTimes()
    // {
    //     return $this->hasMany(ClassTime::class);
    // }
    public static function arrForSchedule(){
        $arr = [];
        $categories =  self::all();
        foreach ( $categories as $category ) {
            $arr[ $category->id ] = $category->category;
        } 

        return $arr;
    }
}
