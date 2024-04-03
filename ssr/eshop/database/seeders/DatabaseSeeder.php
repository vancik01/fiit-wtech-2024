<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\GalleryImage;
use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create some categories
        $categories = Category::factory()->count(5)->create();
        $manufacturers = Manufacturer::factory()->count(5)->create();

        // Create a test user
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        // Create products and assign each to a random category
        Product::factory()->count(30)->create()->each(function ($product) use ($categories, $manufacturers) {
            // Randomly pick a category and assign it to the product
            $category = $categories->random();
            $manufacturer = $manufacturers->random();
            $product->categoryId = $category->id;
            $product->manufacturerId = $manufacturer->id;
            $product->save();

            GalleryImage::factory()->count(5)->create([
                'productId' => $product->id,
            ]);
        });
    }
}
