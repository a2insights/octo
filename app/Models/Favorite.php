<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Favorite
 *
 * @property int $id
 * @property string $model_type
 * @property int $model_id
 * @property int $user_id
 *
 * @package App\Models
 */
class Favorite extends Eloquent
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $casts = [
		'model_id' => 'int',
		'user_id' => 'int'
	];

    /**
     * @var array
     */
    protected $fillable = [
		'model_type',
		'model_id',
		'user_id'
	];
}
