<?php

namespace App\Models;

use Stancl\Tenancy\Database\Concerns\BelongsToPrimaryModel;

class Post extends BaseModel
{
    use BelongsToPrimaryModel;

    protected $fillable = [
        'tenant_id',
		'title',
		'blog_id',
		'content'
    ];

    public function getRelationshipToPrimaryModel(): string
    {
        return 'blog';
    }

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
