<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institute extends Model
{
    use HasFactory;

    protected $guarded = false;
    public function groups()
    {
        return $this->hasMany(Group::class, 'institute_id');
    }
}
