<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Cviebrock\EloquentSluggable\Sluggable;
// use Cviebrock\EloquentSluggable\Services\SlugService;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'slug', 'cat_id', 'image','date'];
    // protected $primaryKey = 'slug';

    public function Category()
    {
        return $this->hasMany(Category::class)->withTimestamps();
    }
}
