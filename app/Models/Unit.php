<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'property_id',
        'type_id',
        'name',
        'unit_ref_id',
        'unit_description',
        'payment_duration_id',
        'lease_amount',
        'status',
        'image',
        'owner_id',
    ];

    public function tenant()
    {
        return $this->hasOne(User::class, 'id', 'tenant_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }
}
