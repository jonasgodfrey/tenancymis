<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'propcatId',
        'proptypeId',
        'ownerId',
        'propname',
        'propaddress',
        'propdesc',
        'phone',
        'email',
        'countryId',
        'stateId',
        'uploadsDir',
    ];

    public function units(){
        return $this->hasMany(Unit::class, 'propId');
    }
    
    public function country(){
        return $this->hasOne(Country::class, 'countryId');
    }

    public function state(){
        return $this->hasOne(State::class, 'stateId');
    }
}
