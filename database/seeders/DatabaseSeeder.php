<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $this->call([
            CountriesTableSeeder::class,
        ]);

        User::factory()->create([
            'name' => 'PowerHR Admin',
            'role' => 'admin',
            'email' => 'admin@powerhr-drc.com',
            'password' => bcrypt('powerhr@123'),
        ]);

        User::factory()->create([
            'name' => 'Société Prospect',
            'role' => 'prospect',
            'email' => 'societe@powerhr-drc.com',
            'password' => bcrypt('test@123'),
        ]);

        User::factory()->create([
            'name' => 'Entreprise Client',
            'role' => 'client',
            'email' => 'entreprise@powerhr-drc.com',
            'password' => bcrypt('test@123'),
        ]);

        User::factory()->create([
            'name' => 'Jeremie Mianda',
            'role' => 'candidate',
            'email' => 'jeremie@powerhr-drc.com',
            'password' => bcrypt('powerhr@123'),
        ]);

    }
}
