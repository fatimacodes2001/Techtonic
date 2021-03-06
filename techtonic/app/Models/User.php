<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    public $timestamps = false;
    protected $primaryKey = 'email';
    protected $keyType = 'string';
    
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'customer_email');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'customer_email')->orderBy('date', 'DESC');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'customer_email');
    }
}
