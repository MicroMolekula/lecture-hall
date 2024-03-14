<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(
            User::class,
            'subject_users',
            'subject_id',
            'user_id'
        );
    }

    public function groups()
    {
        return $this->belongsToMany(
            Group::class,
            'group_subjects',
            'subject_id',
            'group_id'
        );
    }

    public function files()
    {
        return $this->hasMany(File::class, 'subject_id');
    }
}
