<?php

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Blog
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $sub_domain
 * @property string $guard_name
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $users
 *
 * @package App\Models
 */
class Blog extends Eloquent
{
    /**
     * @var string
     */
    protected $table = 'blog';

    /**
     * @var array
     */
    protected $fillable = [
		'name',
		'description',
		'sub_domain',
		'guard_name'
	];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
	{
		return $this->belongsToMany(\App\Models\User::class, 'user_has_blogs')
					->withPivot('id');
	}
}
