<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = ['name', 'description', 'pic_path'];
    public $timestamps = false;

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id')->where('deleted', false);
    }

    public function productsThree()
    {
        return $this->hasMany(Product::class)->where('deleted', false)->limit(3);
    }

    public function productIds()
    {
        return $this->hasMany(Product::class)->where('deleted', false)->pluck('id')->toArray();
    }
}
