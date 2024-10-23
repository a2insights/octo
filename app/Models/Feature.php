<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price_id',
        'product_id',
        'stripe_price',
        'value',
        'name',
        'resetable',
        'unlimited',
        'meteread',
        'unit',
        'price',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'value' => 'integer',
        'resetable' => 'boolean',
        'unlimited' => 'boolean',
        'meteread' => 'boolean',
        'price' => 'decimal',
    ];

    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Feature::class, 'product_feature');
    }
}
