<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_title',
        'company',
        'total_years',
        'email',
        'user_id',
    ];

    public function experience()
    {
        return $this->belongsTo(Experience::class, 'user_id');
    }
}
