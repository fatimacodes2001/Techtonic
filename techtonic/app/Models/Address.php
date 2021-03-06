<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $table = 'addresses';
    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class, 'address_id');
    }

    public function order()
    {
        return $this->hasOne(Order::class, 'address_id');
    }
}
