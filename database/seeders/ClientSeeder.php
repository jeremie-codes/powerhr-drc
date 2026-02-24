<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Facades\Hash;

class ClientSeeder extends Seeder
{
    public function run(): void
    {
        // Création du user client
        $client = User::create([
            'name' => 'HR Demo',
            'email' => 'client@test.com',
            'password' => Hash::make('password'),
            'role' => 'client',
        ]);

        // Création de la company liée
        Company::create([
            'name' => 'Tech Solutions SARL',
            'type' => 'client',
            'sector' => 'Informatique',
            'address' => 'Abidjan, Côte d\'Ivoire',
            'phone' => '+225 0700000000',
            'email_dg' => 'dg@techsolutions.ci',
            'email_hr' => 'rh@techsolutions.ci',
            'is_active' => true,
            'user_id' => $client->id ?? null // seulement si tu as une FK
        ]);
    }
}
