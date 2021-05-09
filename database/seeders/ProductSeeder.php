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
                'name' => "Table à manger en chêne",
                'description' => 'Table à manger 200x200cm en chêne massif. Provenance : Suède.',
                'price' => '1200',
                'stock' => '80'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Mobilier')->id,
                'name' => "Bureau en bois de rose",
                'description' => 'Bureau 150x100cm en bois de rose. Provenance : France.',
                'price' => '1600',
                'stock' => '50'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Mobilier')->id,
                'name' => "Chaise en teck",
                'description' => 'Chaise en teck, peinte en pigments naturels. Assise en osier. Provenance : France.',
                'price' => '200',
                'stock' => '100'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Mobilier')->id,
                'name' => "Armoire en bois de cerisier ",
                'description' => 'Armoire en bois de ceriser peinte en pigments naturels de charbon (noir) . Provenance : Japon.',
                'price' => '1200',
                'stock' => '85'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Décoration')->id,
                'name' => "Vase en verre recyclé",
                'description' => 'Vase en verre tansparent, récupéré puis traité chez nos artisans. Provenance : Mer du Nord.',
                'price' => '55',
                'stock' => '100'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Décoration')->id,
                'name' => "Miroir écologique doré ",
                'description' => 'Miroir antique récupéré en urbex et traité par nos artisans. Provenance : Norvège.',
                'price' => '100',
                'stock' => '100'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Décoration')->id,
                'name' => "Vivarium petit arbre",
                'description' => 'Vivarium fait main pour appartement de fée. Provenance : Allemagne.',
                'price' => '50',
                'stock' => '100'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Médiéval')->id,
                'name' => "Arc en bois de noyer",
                'description' => 'Arc taille adulte en bois de noyer. Flêches et carquois non fournis. Provenance : Allemagne.',
                'price' => '200',
                'stock' => '40'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Médiéval')->id,
                'name' => "Bouclier celtique",
                'description' => 'Bouclier avec noeud celtique. Bois et peinture naturelle. Attache cachée derrière.  Provenance : Allemagne.',
                'price' => '150',
                'stock' => '50'
            ]);

        Product::factory()
            ->create([
                'category_id' => Category::fromName('Médiéval')->id,
                'name' => "Langskip - Drakkar",
                'description' => 'Bateau viking en bois pour décoration. Attention, ne pas mettre en mer. Provenance : Danemark.',
                'price' => '50',
                'stock' => '100'
            ]);
    }
}
