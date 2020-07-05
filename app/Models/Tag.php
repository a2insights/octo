<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Tag extends Eloquent
{
    public $timestamps = false;

    protected $fillable = [
		'name',
		'description'
	];

    public function posts()
	{
		return $this->belongsToMany(\App\Models\Post::class, 'post_has_tags')
					->withPivot('id');
	}
}
