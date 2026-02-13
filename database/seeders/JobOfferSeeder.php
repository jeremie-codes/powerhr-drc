<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\JobOffer;
use Carbon\Carbon;

class JobOfferSeeder extends Seeder
{
    public function run(): void
    {
        $client = User::where('role', 'client')->first();

        if (!$client) {
            return;
        }

        JobOffer::create([
            'client_id' => $client->id,
            'title' => 'Développeur Laravel Senior',
            'description' => 'Nous recherchons un développeur Laravel expérimenté pour rejoindre notre équipe dynamique.',
            'location' => 'Abidjan',
            'contract_type' => 'CDI',
            'experience_years' => 3,
            'salary' => 800,
            'expires_at' => Carbon::now()->addMonth(),
            'is_active' => true,
        ]);

        JobOffer::create([
            'client_id' => $client->id,
            'title' => 'UI/UX Designer',
            'description' => 'Création d’interfaces modernes et intuitives pour nos applications web et mobiles.',
            'location' => 'Télétravail',
            'contract_type' => 'CDD',
            'experience_years' => 2,
            'salary' => 600,
            'expires_at' => Carbon::now()->addWeeks(3),
            'is_active' => true,
        ]);

        JobOffer::create([
            'client_id' => $client->id,
            'title' => 'Stagiaire Développeur Web',
            'description' => 'Stage de 6 mois pour étudiant en informatique.',
            'location' => 'Yamoussoukro',
            'contract_type' => 'Stage',
            'experience_years' => null,
            'salary' => 150,
            'expires_at' => Carbon::now()->addWeeks(2),
            'is_active' => true,
        ]);
    }
}
