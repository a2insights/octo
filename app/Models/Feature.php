<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Feature extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stripe_id',
        'price_id',
        'product_id',
        'stripe_price',
        'value',
        'name',
        'resetable',
        'unlimited',
        'meteread',
        'unit',
        'unit_amount',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'value' => 'integer',
        'resetable' => 'boolean',
        'unlimited' => 'boolean',
        'meteread' => 'boolean',
        'unit_amount' => 'integer',
    ];

    public function price(): BelongsTo
    {
        return $this->belongsTo(Price::class);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->using(FeatureProduct::class)
            ->withPivot('value', 'unit_amount', 'sort')
            ->withTimestamps();
    }
}
