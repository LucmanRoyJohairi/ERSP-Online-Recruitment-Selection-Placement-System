<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'middlename',
        'lastname',
        'dateOfBirth',
        'contact',
        'email',
        'password',
        'userTypeId',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function applications()
    {
        return $this->hasOne(Application::class, 'user_id');
    }

    public function shortlist()
    {
        return $this->hasOne(Shortlist::class, 'user_id');
    }

    public function offer()
    {
        return $this->hasOne(JobOffer::class, 'user_id');
    }

    public function address()
    {
        return $this->hasOne(Address::class, 'user_id');
    }

    public function experience()
    {
        return $this->hasOne(Experience::class, 'user_id');
    }
    public function education()
    {
        return $this->hasOne(Education::class, 'user_id');
    }

    public function issuance()
    {
        return $this->hasOne(Issuance::class, 'user_id');
    }

    public function screening()
    {
        return $this->hasMany(Screening::class, 'user_id');
    }
}
