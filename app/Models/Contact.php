<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
        protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'description',
        'service_id',
        'user_profile_id',
    ];
}
