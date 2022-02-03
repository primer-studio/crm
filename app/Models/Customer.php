<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function thread()
    {
        return $this->hasMany(Thread::class);
    }

    public function customer()
    {
        return $this->hasOne(Thread::class);
    }
}
