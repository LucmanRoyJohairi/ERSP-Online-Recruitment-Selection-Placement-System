<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
    use HasFactory;

    protected $fillable = [
        'qualification_name',
        'education_id',
        'user_id',

       
    ];

    public function education()
    {
        return $this->belongsTo(Education::class, 'education_id');
    }
}
