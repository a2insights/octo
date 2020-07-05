<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Post extends Eloquent
{
    protected $casts = [
		'blog_id' => 'int'
	];

    protected $fillable = [
		'title',
		'blog_id',
		'content'
	];

    public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class);
	}

    public function tags()
	{
		return $this->belongsToMany(\App\Models\Tag::class, 'post_has_tags')
					->withPivot('id');
	}
}
