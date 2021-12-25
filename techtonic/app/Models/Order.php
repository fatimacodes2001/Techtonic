<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    public $timestamps = false;

    public function address()
    {
        return $this->hasOne(Address::class, 'address_id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'customer_email');
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, "order_has_products", "order_id", "product_id")->withPivot('quantity','product_total');
    }

}
