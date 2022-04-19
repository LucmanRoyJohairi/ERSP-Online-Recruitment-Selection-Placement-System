<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = [
        'course_name',
        'education_id',
        'user_id',
       
    ];

    public function education()
    {
        return $this->belongsTo(User::class, 'education_id');
    }
}
