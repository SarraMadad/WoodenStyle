<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
            ->create([
                'name' => "Mobilier"
            ]);
        Category::factory()
            ->create([
                'name' => "Décoration"
            ]);
        Category::factory()
            ->create([
                'name' => "Médiéval"
            ]);
    }
}
