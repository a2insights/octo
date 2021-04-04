<?php

namespace App\Models;

use Illuminate\Support\Str;

trait HasInitials
{
    public function getInitialsAttribute()
    {
        return $converted = Str::substr($this->nome ?? $this->name , 0, 2);
    }
}
