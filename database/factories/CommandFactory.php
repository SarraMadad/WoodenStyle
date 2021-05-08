<?php

namespace Database\Factories;

use App\Models\Command;
use App\Models\User;
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
            'user_id' => User::factory(), // call user factory to create new one
            'status' => $this->faker->word() //TODO: transform from string to enum
        ];
    }
}
