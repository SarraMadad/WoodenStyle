<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->word(),
            'category_id' => $this->faker->randomNumber(), //todo: Call category factory
            'price' => $this->faker->numberBetween(50, 2000),
            'stock' => $this->faker->numberBetween(10, 100)
        ];
    }
}
