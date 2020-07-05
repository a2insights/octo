<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class PostHasTag extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
		'tag_id' => 'int',
		'post_id' => 'int'
	];

    protected $fillable = [
		'tag_id',
		'post_id'
	];

    public function post()
	{
		return $this->belongsTo(\App\Models\Post::class);
	}

    public function tag()
	{
		return $this->belongsTo(\App\Models\Tag::class);
	}
}
