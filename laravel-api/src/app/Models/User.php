<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    public function group()
    {
        return $this->role === 'student' ? $this->belongsTo(Group::class, 'group_id') : null;
    }

    public function subjects()
    {
        return $this->role === 'teacher' ?
            $this->belongsToMany(
                Subject::class,
                'subject_users',
                'user_id',
                'subject_id'
            ) : null;
    }

    public function files()
    {
        return $this->hasMany(File::class, 'user_id');
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
