<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\ProductColor;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductSpec;
use App\Models\Review;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($count = 0; $count <= 5; $count++) {
            $color = ProductColor::factory()->create();
            $category = Category::factory()
                ->has(
                    Product::factory()
                    ->count(5)
                    ->has(ProductImage::factory()->count(3), 'images')
                    ->has(ProductSpec::factory()->count(3), 'specs')
                    ->has(Review::factory()->count(3), 'reviews')
                    ->for($color, 'color'),
                    'products'
                    )
                ->create();
        }
    }
}
