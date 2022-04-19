<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'salary_level',
        'jobtype_id',
        'status',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }

    public function offers()
    {
        return $this->hasOne(JobOffer::class, 'job_id');
    }

    public function requirements()
    {
        return $this->hasOne(JobRequirement::class, 'job_id');
    }
}
