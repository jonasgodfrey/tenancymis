<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantRentalRecord extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tenant_id',
        'unit_id',
        'start_date',
        'end_date',
        'property_category_id'
    ];

}
