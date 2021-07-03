<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminRole extends Model
{
    use HasFactory;
    protected $fillable = ['role'];

    public static function rolesArrForUser()
    {
        $arr =[];
        $roles =AdminRole::all();
        foreach ($roles as $key => $role) {
            $arr[$role->id] = $role->role;
        }
        return $arr;
    }
}
