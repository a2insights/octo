<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tag
 *
 * @property int $id
 * @property string $name
 * @property string $description
 *
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class Tag extends Eloquent
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $fillable = [
		'name',
		'description'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function posts()
	{
		return $this->belongsToMany(\App\Models\Post::class, 'post_has_tags')
					->withPivot('id');
	}
}
