<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $fillable = [
        'shortlist_id',
        'job_id',
        'score',
        'rank',
    ];

    
    public function rating()
    {
        return $this->belongsTo(Shortlist::class, 'shortlist_id');
    }
}
