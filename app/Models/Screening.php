<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screening extends Model
{
    use HasFactory;

    protected $fillable = [
        'message',
        'user_id',
        'job_id',
        'date',
        'screening_type',
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
