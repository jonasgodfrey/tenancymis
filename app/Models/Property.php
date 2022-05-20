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
        return $this->hasOne(Country::class,  'id');
    }

    public function state(){
        return $this->hasOne(State::class, 'id');
    }

    public function manager()
    {
        return $this->hasOne(Manager::class, 'propId');
    }

    public function accountant()
    {
        return $this->hasOne(Accountant::class, 'propId');
    }

    public function hasManager($id)
    {
        if (
            $this->manager()
            ->where('propId', $id)
            ->first()
        ) {
            return true;
        }
        return false;
    }

    public function hasAccountant($id)
    {
        if (
            $this->accountant()
            ->where('propId', $id)
            ->first()
        ) {
            return true;
        }
        return false;
    }
}
