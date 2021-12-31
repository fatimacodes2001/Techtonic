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
    public $timestamps = false;
    
    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }

    public function cart()
    {
        return $this->belongsTo(Cart::class, 'customer_email');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'email');
    }
}
