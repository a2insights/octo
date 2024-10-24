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
     * @var array<string, string>
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
