<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Stancl\Tenancy\Database\Concerns\BelongsToTenant;

class Blog extends Eloquent
{
    use BelongsToTenant;

    protected $table = 'blogs';

    protected $fillable = [
        'tenant_id',
        'path',
        'user_id',
		'name',
        'theme',
		'description',
    ];

    public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
