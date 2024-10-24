<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
        return $this->belongsToMany(Feature::class)
            ->using(ProductFeature::class)
            ->withPivot('value', 'sort')
            ->withTimestamps();
    }

    public function updateFromStripe()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51F1LcNKBVLqcMf8uiZFt0152gJpn08YTEOx3zsssdL6CAJ0nPCJborB5n0euDV2l8LA2kZByttfGuAk0l02lPh04008199G2r0');

        $customer =  $stripe->products->retrieve($this->stripe_id, []);

        $this->fill($customer->toArray());
        $this->save();
    }

    public function updateToStripe()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51F1LcNKBVLqcMf8uiZFt0152gJpn08YTEOx3zsssdL6CAJ0nPCJborB5n0euDV2l8LA2kZByttfGuAk0l02lPh04008199G2r0');

        $data = [
           'name' => $this->name,
           'description' => $this->description
        ];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        $customer =  $stripe->products->update($this->stripe_id, $data);
        $this->fill($customer->toArray());
        $this->save();
    }
}
