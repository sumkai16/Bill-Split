<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait GeneratesInvitationCode
{
    /**
     * Boot the trait and automatically generate an invitation code
     * when creating a new model instance if not already set.
     */
    protected static function bootGeneratesInvitationCode(): void
    {
        static::creating(function ($model) {
            if (empty($model->invitation_code)) {
                $model->invitation_code = static::generateUniqueInvitationCode();
            }
        });
    }

    /**
     * Generate a unique invitation code for the model.
     */
    protected static function generateUniqueInvitationCode(): string
    {
        do {
            $code = Str::upper(Str::random(8));
        } while (static::where('invitation_code', $code)->exists());

        return $code;
    }
    public function regenerateCode()
    {
        $this->invitation_code = static::generateUniqueInvitationCode();
        $this->save();
        
        return $this;
    }
}

