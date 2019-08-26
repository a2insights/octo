<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * Class User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Carbon\Carbon $email_verified_at
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 *
 * @property \Illuminate\Database\Eloquent\Collection $blog
 * @property \Illuminate\Database\Eloquent\Collection $posts
 *
 * @package App\Models
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'blog_id',
    ];

    /**
     * @var array
     */
    protected $dates = [
		'email_verified_at'
	];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function blog()
	{
		return $this->belongsTo(\App\Models\Blog::class, 'blog_id');
	}

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function posts()
	{
		return $this->hasMany(\App\Models\Post::class);
	}
}
