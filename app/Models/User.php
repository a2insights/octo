<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'blog_id'
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
		return $this->belongsTo(\App\Models\Blog::class, 'blog_id');
	}

    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
