<?php

namespace App\Models;

use Illuminate\Support\Str;

trait HasInitials
{
    public function getInitialsAttribute()
    {
        return Str::substr($this->name , 0, 2);
    }
}
