<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->hasMany(User::class, 'group_id');
    }

    public function subjects()
    {
        return $this->belongsToMany(
            Subject::class,
            'group_subjects',
            'group_id',
            'subject_id');
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class, 'institute_id');
    }
}
