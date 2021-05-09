<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Product::factory()
            ->create([
                'category_id' => Category::fromName('Mobilier')->id,
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Décoration')->id,
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Médiéval')->id,
            ]);
    }
}
