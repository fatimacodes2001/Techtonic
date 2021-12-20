<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $table = 'cart';

    public function user()
    {
        return $this->hasOne(User::class, 'cutsomer_email');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "cart_has_products", "cart_id", "product_id")->withPivot('quantity');
    }

}
