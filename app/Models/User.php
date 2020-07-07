<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'tenant_id'
    ];

    protected $dates = [
		'email_verified_at'
	];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function blog()
	{
		return $this->blogs->first();
    }

    public function blogs()
	{
		return $this->hasMany(\App\Models\Blog::class);
	}

    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
