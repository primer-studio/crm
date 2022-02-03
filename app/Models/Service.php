<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function thread()
    {
        return $this->hasMany(Thread::class);
    }
}
