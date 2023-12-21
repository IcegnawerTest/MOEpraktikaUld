<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Product extends Model
{
    protected $fillable = [
        'user_id',
        'type_id',
        'id',
        'name',
        'img',
        'description',
        'composition',
        'price',
    ];

    public function user()
    {
        return $this->hasMany(Cart::class);
    }
}
