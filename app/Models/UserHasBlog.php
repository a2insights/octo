<?php


namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UserHasBlog
 *
 * @property int $id
 * @property int $blog_id
 * @property int $user_id
 *
 * @property \App\Models\User $user
 * @property \App\Models\Blog $blog
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class UserHasBlog extends Eloquent
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $casts = [
		'blog_id' => 'int',
		'user_id' => 'int'
	];

    /**
     * @var array
     */
    protected $fillable = [
		'blog_id',
		'user_id'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class);
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
