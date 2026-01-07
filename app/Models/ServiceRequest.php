<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceRequest extends Model
{
    use HasFactory;

    protected $primaryKey = 'matricno';

    public $incrementing = false;

    protected $keyType = 'string';

    protected $fillable = [
        'matricno',
        'organization',
        'country',
        'address',
        'service_type',
        'request_method',
        'status',
        'transaction_id',
        'payment'
    ];

    /**
     * Get the user that owns the ServiceRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'matricno', 'matricno');
    }
}
