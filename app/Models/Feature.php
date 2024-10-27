<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Str;

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

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)
            ->using(FeatureProduct::class)
            ->withPivot('value', 'unit_amount', 'sort', 'price_id', 'product_id', 'feature_id', 'meteread', 'unlimited', 'resetable')
            ->withTimestamps();
    }

    public function pricing($featureProduct)
    {
        $pricing = '';
        $amount = $featureProduct->unit_amount ?? 0;
        $billingScheme = $this->billing_scheme ?? 'per_unit';
        $currency = $featureProduct->price->currency ?? 'BRL';

        if ($featureProduct->price_id) {
            $amount = $featureProduct->price->unit_amount;

            if ($featureProduct->price->transform_quantity) {
                $amount = ($featureProduct->price->unit_amount) / $featureProduct->price->transform_quantity['divide_by'];
            }
        }

        if (! $amount) {
            return null;
        }

        $pricing = money($amount, Str::upper($currency)).'/'.$billingScheme;

        return $pricing;
    }

    public function valueing($featureProduct)
    {
        if (! $featureProduct->value) {
            return '∞';
        }

        return $featureProduct->value;
    }
}
