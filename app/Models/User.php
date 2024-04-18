<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'occupation',
        'password',
        'purpose',
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


    public function roles(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany('App\Models\Role');
    }

    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\Status');
    }

    public function subscription()
    {
        return $this->hasMany(UserSubscription::class, 'user_id');
    }

    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Property::class, 'owner_id');
    }

    public function profile()
    {
        return $this->hasOne(UserProfile::class, 'id', 'user_id');
    }

    public function units(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Unit::class, 'owner_id');
    }

    public function tenants(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(Tenant::class, Unit::class, 'owner_id', 'unit_id');
    }

    public function payments()
    {
        return $this->hasMany(PaymentRecord::class, 'tenant_id');
    }

    public function mytenants(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(User::class, 'owner_id');
    }

    public function tenant_payments(): \Illuminate\Database\Eloquent\Relations\HasManyThrough
    {
        return $this->hasManyThrough(PaymentRecord::class, Tenant::class, 'id', 'tenant_id');
    }

    public function hasAnyRoles($roles): bool
    {
        if (
            $this->roles()->whereIn('name', $roles)->first()
        ) {
            return true;
        }
        return false;
    }

    public function hasRole($role): bool
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

    public function isActive($status): bool
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

    public function subscriptionStatus($status): bool
    {
        if (
            $this->subscription()->where('status', $status)->first()
        ) {
            return true;
        }
        return false;
    }
}
