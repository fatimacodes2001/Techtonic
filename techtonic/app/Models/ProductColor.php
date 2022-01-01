<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductColor extends Model
{
    use HasFactory;
    protected $table = 'product_colors';
    protected $fillable = ['name', 'hex'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'color_id');
    }
}
