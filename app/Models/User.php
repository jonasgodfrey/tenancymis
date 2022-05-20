<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password',
        'role',
        'otp',
        'owner_id',
        'usercode',
        'status_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function properties()
    {
        return $this->hasMany(Property::class, 'ownerId');
    }

    public function units()
    {
        return $this->hasMany(Unit::class, 'owner_id');
    }

    public function tenants()
    {
        return $this->hasManyThrough(Tenant::class, Unit::class, 'owner_id', 'unitId');
    }

    public function hasAnyRoles($roles)
    {
        if (
            $this->roles()->whereIn('name', $roles)->first()
        ) {
            return true;
        }
        return false;
    }

    public function hasRole($role)
    {
        if (
            $this->roles()
            ->where('name', $role)
            ->first()
        ) {
            return true;
        }
        return false;
    }

    public function isActive($status)
    {
        if (
            $this->status()
            ->where('name', $status)
            ->first()
        ) {
            return true;
        }
        return false;
    }
}
