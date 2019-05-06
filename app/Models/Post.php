<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Post
 *
 * @property int $id
 * @property int $user_has_blog_id
 * @property string $name
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \App\Models\UserHasBlog $user_has_blog
 * @property \Illuminate\Database\Eloquent\Collection $tags
 *
 * @package App\Models
 */
class Post extends Eloquent
{
    /**
     * @var array
     */
    protected $casts = [
		'user_has_blog_id' => 'int'
	];

    /**
     * @var array
     */
    protected $fillable = [
		'user_has_blog_id',
		'name',
		'content'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user_has_blog()
	{
		return $this->belongsTo(\App\Models\UserHasBlog::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags()
	{
		return $this->belongsToMany(\App\Models\Tag::class, 'post_has_tags')
					->withPivot('id');
	}
}
