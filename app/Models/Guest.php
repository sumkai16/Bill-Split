<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'invited_by',
    ];
    public function inviter()
    {
        return $this->belongsTo(User::class, 'invited_by');
    }
}
