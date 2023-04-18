<?php

namespace App\Modules\Pub\Home\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    public function emails()
    {
        return $this->hasOne(Email::class);
    }

    public function scopeUserBy($query) {
        return $query->orderBy('validts', 'desc');
    }
}
