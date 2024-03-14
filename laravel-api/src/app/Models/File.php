<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }

    public function files()
    {
        return $this->hasMany(File::class, 'file_id');
    }

    public function childrenFiles()
    {
        return $this->hasMany(File::class, 'file_id')->with('files');
    }
}
