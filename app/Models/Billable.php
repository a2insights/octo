<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Billable extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stripe_id',
        'address',
        'balance',
        'created',
        'currency',
        'default_source',
        'delinquent',
        'description',
        'discount',
        'email',
        'invoice_prefix',
        'invoice_settings',
        'livemode',
        'metadata',
        'name',
        'next_invoice_sequence',
        'phone',
        'preferred_locales',
        'shipping',
        'tax_exempt',
        'test_clock',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'address' => 'array',
        'balance' => 'integer',
        'created' => 'integer',
        'delinquent' => 'boolean',
        'discount' => 'array',
        'invoice_settings' => 'array',
        'livemode' => 'boolean',
        'metadata' => 'array',
        'preferred_locales' => 'array',
        'shipping' => 'array',
    ];

    public function subscriptions(): HasMany
    {
        return $this->hasMany(Subscription::class);
    }
}
