<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function characteristics()
    {
        return $this->belongsToMany(Characteristic::class, 'product_characteristics')->withPivot('value');
    }
}
