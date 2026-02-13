<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\JobCategory;
use Illuminate\Support\Str;

class JobCategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Informatique & Développement',
            'Marketing & Communication',
            'Ressources Humaines',
            'Finance & Comptabilité',
            'Commercial & Vente',
            'Logistique & Transport',
            'BTP & Construction',
            'Santé',
            'Education & Formation',
            'Administration',
            'Industrie',
            'Agriculture',
            'Hôtellerie & Restauration',
            'Droit & Juridique',
            'Design & Création',
            'Télécommunications',
            'Energie',
            'Banque & Assurance',
            'Management & Direction',
            'Autres'
        ];

        foreach ($categories as $category) {
            JobCategory::updateOrCreate(
                ['slug' => Str::slug($category)],
                [
                    'name' => $category,
                    'slug' => Str::slug($category)
                ]
            );
        }
    }
}
