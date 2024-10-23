<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
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
        'created' => 'timestamp',
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
}
