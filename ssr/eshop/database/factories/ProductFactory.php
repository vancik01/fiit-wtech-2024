<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class ProductFactory extends Factory
{
    protected $model = Product::class;
    protected $table = "Product";

    public function definition()
    {
        $title = $this->faker->text(48);
        return [
            'id' => Str::uuid(),
            'title' => $title,
            'featuredImage' => $this->faker->imageUrl(),
            'slug' => Str::slug($title),
            'shortDescription' => $this->faker->text(200),
            'longDescription' => $this->faker->text(2000),
            'price' => $this->faker->randomFloat(2, 1, 100),
        ];
    }
}
