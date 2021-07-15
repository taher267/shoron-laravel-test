<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = ['title'];

    public static function tagsArr()
    {
        $arr = [];
        $tags = self::all();
        foreach ($tags as $tag) {
            $arr[$tag->id+1] = $tag->title;
        }
        return $arr;
        
    }
}
