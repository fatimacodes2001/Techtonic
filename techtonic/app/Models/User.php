<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';

    public function address()
    {
        return $this->hasOne(Address::class, 'address_id');
    }

    public function user()
    {
        return $this->belongsTo(Cart::class, 'customer_email');
    }

}
