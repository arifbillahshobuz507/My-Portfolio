<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'description',
        'cv',
        'logo',
        'image',
        'facebook',
        'instagram',
        'linkedin',
        'github',
        'twitter',
        'organization',
        'address',
        'city',
        'state',
        'language',
        'country',
        'zip'
    ];
}
