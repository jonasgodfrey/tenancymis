<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;
    protected $fillable = [
        'propId',
        'typeId',
        'name',
        'unitNum',
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
