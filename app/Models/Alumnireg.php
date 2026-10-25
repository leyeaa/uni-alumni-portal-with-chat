<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumnireg extends Model
{
    use HasFactory;

     protected $fillable = [
        'matricno',
        // 'organization',
        // 'country',
        // 'address',
        'service_type',
        'request_method',
        'status',
        'transaction_id',
        'payment',
        'amount',
        'transaction_id',
        'tranref'
    ];
}
