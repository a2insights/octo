<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Subscription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'stripe_id',
        'billable_id',
        'stripe_customer',
        'stripe_price',
        'status',
        'cancel_at_period_end',
        'currency',
        'current_period_end',
        'current_period_start',
        'default_payment_method',
        'description',
        'items',
        'metadata',
        'pending_setup_intent',
        'pending_update',
        'payment_behavior',
        'add_invoice_items',
        'application_fee_percent',
        'automatic_tax',
        'backdate_start_date',
        'billing_cycle_anchor',
        'billing_cycle_anchor_config',
        'billing_thresholds',
        'cancel_at',
        'collection_method',
        'coupon',
        'days_until_due',
        'default_source',
        'default_tax_rates',
        'discounts',
        'invoice_settings',
        'off_session',
        'on_behalf_of',
        'payment_settings',
        'pending_invoice_item_interval',
        'promotion_code',
        'proration_behavior',
        'transfer_data',
        'trial_from_plan',
        'trial_end',
        'trial_settings',
        'trial_start',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'cancel_at_period_end' => 'boolean',
        'current_period_end' => 'timestamp',
        'current_period_start' => 'timestamp',
        'items' => 'array',
        'metadata' => 'array',
        'pending_update' => 'array',
        'add_invoice_items' => 'array',
        'application_fee_percent' => 'decimal',
        'automatic_tax' => 'array',
        'backdate_start_date' => 'timestamp',
        'billing_cycle_anchor' => 'timestamp',
        'billing_cycle_anchor_config' => 'array',
        'billing_thresholds' => 'array',
        'cancel_at' => 'timestamp',
        'default_tax_rates' => 'array',
        'discounts' => 'array',
        'invoice_settings' => 'array',
        'off_session' => 'boolean',
        'payment_settings' => 'array',
        'pending_invoice_item_interval' => 'array',
        'transfer_data' => 'array',
        'trial_from_plan' => 'boolean',
        'trial_end' => 'timestamp',
        'trial_settings' => 'array',
        'trial_start' => 'timestamp',
    ];

    public function billable(): BelongsTo
    {
        return $this->belongsTo(Billable::class);
    }
}
