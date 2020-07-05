<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Blog extends Eloquent
{
    protected $table = 'blogs';

    protected $casts = [
		'user_id' => 'int'
	];

    protected $fillable = [
		'name',
        'theme',
		'description',
		'sub_domain',
		'guard_name'
	];

    public function user()
	{
		return $this->hasOne(\App\Models\User::class);
	}

    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
