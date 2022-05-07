<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_name',
    ];

    public function property_types()
    {
        # code...
        return $this->hasMany(PropertyType::class, 'propcatId');
    }
}
