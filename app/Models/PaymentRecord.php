<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'payment_reference',
        'unit_id',
        'tenant_id',
        'paycat_id',
        'payment_status_id',
        'amount',
        'amount_paid',
        'discount',
        'payment_date',
        'startdate',
        'duedate',
        'duration',
        'duration_status',
        'paymethod',
        'evidence_image'
    ];

    public function tenant(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function unit(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Unit::class);
    }

    public function payment_status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(PaymentStatus::class, 'duration_status');
    }
}
