<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AdminRole;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password','role', 'status', 'email_verified_at', 'approved_by', 'sup_admin', 'image'];

    public function userrole()
    {
        return $this->hasOne(AdminRole::class, 'id', 'role');

    }

       /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        // 'sup_admin',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
