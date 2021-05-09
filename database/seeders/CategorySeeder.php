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
                'name' => "Mobilier",
                'description' => 'Ameublement en bois massif naturel, fait main et traité par nos artisans bretons.'

            ]);
        Category::factory()
            ->create([
                'name' => "Décoration",
                'description' => 'Décorations diverses pour la maison, faites et traitées en Bretagne par nos artisans.'
            ]);
        Category::factory()
            ->create([
                'name' => "Médiéval",
                'description' => 'Objets médiévaux variés du IX siècle anglais et germanique.'
            ]);
    }
}
