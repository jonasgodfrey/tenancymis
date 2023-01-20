<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'propId',
        'typeId',
        'name',
        'unit_ref_id',
        'unitDesc',
        'leaseAmount',
        'status',
        'image',
        'owner_id',
    ];

    public function tenant()
    {
        return $this->hasOne(Tenant::class, 'unitId');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'propId');
    }
}
