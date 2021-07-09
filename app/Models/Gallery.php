<?php

namespace App\Models;
use App\Models\CourseClass;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Gallery extends Model
{
    use HasFactory;

    protected $fillable = ['corse_id', 'status', 'cat_id', 'image'];

    public function galcourse()
    {
        return $this->hasOne(CourseClass::class, 'id', 'course_id');
    }
    
}
