<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
        protected $fillable = [
        'title',
        'description',
        'image',
        'icone', // Note: column name is 'icone' in your migration
        'service_id'
    ];
}
