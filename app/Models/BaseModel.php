<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class BaseModel extends Eloquent
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($object) {
            $object->tenant_id = tenant('id');
        });
    }
}
