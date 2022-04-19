<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
    use HasFactory;
    protected $fillable = [
        'education_qual',
        'additional_qual',
        'experience_req',
        // 'document_req',
        'job_id',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
