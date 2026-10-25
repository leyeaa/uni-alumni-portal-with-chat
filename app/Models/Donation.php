<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    use HasFactory;

    protected $table = 'donations';

    protected $fillable = [

        // Reference
        'transaction_id',

        // Donor Info
        'matricno',
        'surname',
        'other_names',
        'address',
        'phone',
        'email',

        // Payment Info
        'payment_type',
        'amount',

        // Paystack / System
        'pay_channel',
        'service_type',
        'request_method',

        'status',
        'payment',

        // Paystack Response Data
        'gateway_response',
        'currency',
        'channel',
        'paid_at',

        'customer_email',

        'authorization_code',
        'card_type',
        'bank',
        'last4',

        'fees',

        'ip_address',

        'tranref',
    ];

    protected $casts = [
        'amount' => 'float',
        'fees' => 'float',
        'paid_at' => 'datetime',
    ];
}
