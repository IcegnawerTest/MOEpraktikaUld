<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use App\Models\User;

class Cart extends Model
{
    protected $fillable = [
        'id',
        'user_id',
        'product_id',
        'quantity',
        'expires_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user() {
    return $this->belongsTo(User::class);
    }
}
