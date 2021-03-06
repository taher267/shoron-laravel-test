<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    use HasFactory;
    protected $fillable=['locationsign', 'location', 'emailsign', 'email', 'phonesign', 'phone_no', 'where'];
}