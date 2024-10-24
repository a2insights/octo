<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Billable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'stripe_id',
        'address',
        'description',
        'email',
        'metadata',
        'name',
        'phone',
        'shipping',
        'created',
        'cash_balance',
        'balance',
        'default_source',
        'delinquent',
        'discount',
        'invoice_credit_balance',
        'invoice_prefix',
        'invoice_settings',
        'livemode',
        'next_invoice_sequence',
        'preferred_locales',
        'sources',
        'subscriptions',
        'tax',
        'tax_exempt',
        'tax_ids',
        'test_clock',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'address' => 'array',
        'metadata' => 'array',
        'shipping' => 'array',
        'created' => 'integer',
        'cash_balance' => 'array',
        'default_source' => 'array',
        'delinquent' => 'boolean',
        'discount' => 'array',
        'invoice_credit_balance' => 'array',
        'invoice_settings' => 'array',
        'livemode' => 'boolean',
        'preferred_locales' => 'array',
        'sources' => 'array',
        'subscriptions' => 'array',
        'tax' => 'array',
        'tax_ids' => 'array',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }

    public function updateFromStripe()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51F1LcNKBVLqcMf8uiZFt0152gJpn08YTEOx3zsssdL6CAJ0nPCJborB5n0euDV2l8LA2kZByttfGuAk0l02lPh04008199G2r0');

        $customer =  $stripe->customers->retrieve($this->stripe_id, []);

        $this->fill($customer->toArray());
        $this->save();
    }

    public function updateToStripe()
    {
        $stripe = new \Stripe\StripeClient('sk_test_51F1LcNKBVLqcMf8uiZFt0152gJpn08YTEOx3zsssdL6CAJ0nPCJborB5n0euDV2l8LA2kZByttfGuAk0l02lPh04008199G2r0');

        $data = [
            'description' => $this->description,
            'email' => $this->email,
            'name' => $this->name,
            'phone' => $this->phone,
        ];

        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data[$key]);
            }
        }

        $customer =  $stripe->customers->update($this->stripe_id, $data);
        $this->fill($customer->toArray());
        $this->save();
    }
}
