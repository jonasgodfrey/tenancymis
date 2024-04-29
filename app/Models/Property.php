<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'property_category_id',
        'proptype_id',
        'owner_id',
        'property_name',
        'property_address',
        'property_description',
        'phone',
        'email',
        'country_id',
        'state_id',
        'property_image_url',
    ];

    public function units(){
        return $this->hasMany(Unit::class, 'property_id');
    }

    public function country(){
        return $this->hasOne(Country::class,'id',  'country_id');
    }

    public function category(){
        return $this->hasOne(PropertyCategory::class,'id',  'property_category_id');
    }

    public function tenants(){
        return $this->hasMany(Tenant::class, 'property_id');
    }

    public function state(){
        return $this->hasOne(State::class, 'id', 'state_id');
    }

    public function manager()
    {
        return $this->hasOne(Manager::class, 'property_id');
    }

    public function accountant()
    {
        return $this->hasOne(Accountant::class, 'property_id');
    }

    public function hasManager($id)
    {
        if (
            $this->manager()
            ->where('property_id', $id)
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
            ->where('property_id', $id)
            ->first()
        ) {
            return true;
        }
        return false;
    }
}
