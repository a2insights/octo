<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'stripe_id',
        'active',
        'description',
        'metadata',
        'default_price_data',
        'images',
        'marketing_features',
        'package_dimensions',
        'shippable',
        'statement_descriptor',
        'tax_code',
        'unit_label',
        'url',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
        'metadata' => 'array',
        'default_price_data' => 'array',
        'images' => 'array',
        'marketing_features' => 'array',
        'package_dimensions' => 'array',
        'shippable' => 'boolean',
    ];

    public function productFeatures(): HasMany
    {
        return $this->hasMany(ProductFeature::class);
    }



    public function features(): BelongsToMany
    {
        return $this->belongsToMany(Service::class)
            ->using(ProductFeature::class)
            ->withPivot('value', 'sort')
            ->withTimestamps();
    }
}
