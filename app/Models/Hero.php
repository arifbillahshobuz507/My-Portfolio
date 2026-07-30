<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    use HasFactory;
        protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'user_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function userProfile()
    {
        return $this->belongsTo(UserProfile::class);
    }
    
    public function experience()
    {
        return $this->belongsTo(Experience::class);
    }
    
    public function project()
    {
        return $this->belongsTo(Project::class);
    }
    
    public function testimonial()
    {
        return $this->belongsTo(Testimonial::class);
    }
}
