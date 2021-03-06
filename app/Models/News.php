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
    protected $fillable = ['title', 'description', 'slug', 'cat_id', 'posted_by', 'approved_by', 'image','date'];
    

    public function Category()
    {
        return $this->hasMany(Category::class)->withTimestamps();

    }

    public function newscategory()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'news_tag');
    }
}
