<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tenant extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'user_id',
        'email',
        'phone',
        'business_name',
        'start_date',
        'due_date',
        'bizcat',
        'property_id',
        'unit_id',
        'payment_id',
    ];

    public function payments()
    {
        return $this->hasMany(PaymentRecord::class);
    }

    public function current_payment()
    {
        return $this->hasOne(PaymentRecord::class, 'id', 'payment_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }
}
