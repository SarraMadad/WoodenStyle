<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(12);

        User::factory()
            ->create([
                'firstname' => 'admin',
                'lastname' => 'admin',
                'email' => 'admin@admin.fr',
                'address' => 'ESIEA',
                'password' => 'admin',
                'is_admin' => '1'
            ]);
    }
}
