<?php

namespace Database\Seeders;

use App\Models\Command;
use App\Models\Product;
use Illuminate\Database\Seeder;

class CommandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Command::factory()
            ->count(20)
            ->create();

        foreach (Command::all() as $command) {
            $products = Product::inRandomOrder()->take(rand(1,3))->pluck('id');
            $command->products()->attach($products);
        }
    }
}
