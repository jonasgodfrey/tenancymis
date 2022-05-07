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

    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    public function units(){
        return $this->belongsToMany('App\Models\Unit');
    }
}
