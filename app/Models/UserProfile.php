<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'cv',
        'logo',
        'image',
        'organization',
        'address',
        'state',
        'zip',
        'country',
        'language',
        'facebook',
        'instagram',
        'linkedin',
        'github',
        'twitter',
        'description',
        'city',
    ];
}
