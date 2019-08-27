<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class PostHasTag
 *
 * @property int $id
 * @property int $tag_id
 * @property int $post_id
 *
 * @property \App\Models\Post $post
 * @property \App\Models\Tag $tag
 *
 * @package App\Models
 */
class PostHasTag extends Eloquent
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $casts = [
		'tag_id' => 'int',
		'post_id' => 'int'
	];

    /**
     * @var array
     */
    protected $fillable = [
		'tag_id',
		'post_id'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post()
	{
		return $this->belongsTo(\App\Models\Post::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tag()
	{
		return $this->belongsTo(\App\Models\Tag::class);
	}
}
