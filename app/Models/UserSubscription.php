<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'start_date',
        'end_date',
        'status',
        'plan_type',
        'total_units_no',
        'amount'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
