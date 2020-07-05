<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Favorite extends Eloquent
{
    public $timestamps = false;

    protected $casts = [
		'model_id' => 'int',
		'user_id' => 'int'
	];

    protected $fillable = [
		'model_type',
		'model_id',
		'user_id'
	];
}
