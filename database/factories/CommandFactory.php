<?php

namespace Database\Factories;

use App\Models\Command;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Command::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'totalAmount' => $this->faker->numberBetween(10, 10000),
            'user_id' => $this->faker->randomNumber(), // todo: call user factory
            'status' => $this->faker->word() //TODO: transform from string to enum
        ];
    }
}
