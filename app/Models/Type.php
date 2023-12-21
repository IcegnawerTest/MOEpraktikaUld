<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Аpp\Models\Product;

class Type extends Model
{
    protected $fillable = [
        'id',
        'type',
    ];

    public function product()
    {
        return $this->hasMany(Cart::class);
    }
}
