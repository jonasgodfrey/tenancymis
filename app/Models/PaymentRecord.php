<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id',
        'unit_id',
        'paycat_id',
        'paymethod',
        'tenant_id',
        'paystatus_id',
        'amount',
        'paydate',
        'startdate',
        'duedate',
        'duration',
        'duration_status',
        'evidence_image',
    ];

    public function tenant(){
        return $this->belongsTo(Tenant::class);
    }
}
