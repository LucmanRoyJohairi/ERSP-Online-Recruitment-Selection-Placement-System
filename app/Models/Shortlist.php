<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shortlist extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_id',
        'job_id',
        'user_id',
        'date',
    ];

    

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function rating()
    {
        return $this->hasOne(Rating::class, 'shortlist_id');
    }
}
