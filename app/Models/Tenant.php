<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'bizname',
        'bizcat',
        'propId',
        'unitId',
        'payId',
    ];

    public function payments(){
        return $this->hasMany(PaymentRecord::class);
    }
}
