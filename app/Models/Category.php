<?php

namespace App\Models;

use App\Models\News;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [ 'category', 'slug', 'image' ];

    public function newses()
    {
        return $this->hasMany(News::class);
    }
    //  Category list
    public static function categoriesListArr(){
        $arr = [];
        $categories =  self::all();
        foreach ( $categories as $category ) {
            $arr[ $category->id ] = $category->category;
        } 

        return $arr;
    }

}
