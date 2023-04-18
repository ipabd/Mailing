<?php

namespace App\Modules\Pub\Home\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;
    protected $fillable = [ 'checked','valid'];

    public function emails()
    {
        return $this->belongsTo(User::class);
    }

  }