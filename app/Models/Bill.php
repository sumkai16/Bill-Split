<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\GeneratesInvitationCode;

class Bill extends Model
{
    use GeneratesInvitationCode;
    protected $fillable = [
        'name',
        'host_id',
        'invitation_code',
        'status',
    ];

    public function host()
    {
        return $this->belongsTo(User::class, 'host_id');
    }

    public function guests()
    {
        return $this->hasMany(Guest::class);
    }
}
