<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountriesTableSeeder extends Seeder
{
    public function run(): void
    {
        $countries = [

            // 🌍 AFRIQUE
            ['name' => 'Afrique du Sud', 'code' => 'ZA'],
            ['name' => 'Algérie', 'code' => 'DZ'],
            ['name' => 'Angola', 'code' => 'AO'],
            ['name' => 'Bénin', 'code' => 'BJ'],
            ['name' => 'Botswana', 'code' => 'BW'],
            ['name' => 'Burkina Faso', 'code' => 'BF'],
            ['name' => 'Burundi', 'code' => 'BI'],
            ['name' => 'Cameroun', 'code' => 'CM'],
            ['name' => 'Cap-Vert', 'code' => 'CV'],
            ['name' => 'République Centrafricaine', 'code' => 'CF'],
            ['name' => 'Comores', 'code' => 'KM'],
            ['name' => 'Congo', 'code' => 'CG'],
            ['name' => 'République Démocratique du Congo', 'code' => 'CD'],
            ['name' => 'Côte d’Ivoire', 'code' => 'CI'],
            ['name' => 'Djibouti', 'code' => 'DJ'],
            ['name' => 'Égypte', 'code' => 'EG'],
            ['name' => 'Éthiopie', 'code' => 'ET'],
            ['name' => 'Gabon', 'code' => 'GA'],
            ['name' => 'Gambie', 'code' => 'GM'],
            ['name' => 'Ghana', 'code' => 'GH'],
            ['name' => 'Guinée', 'code' => 'GN'],
            ['name' => 'Guinée-Bissau', 'code' => 'GW'],
            ['name' => 'Guinée Équatoriale', 'code' => 'GQ'],
            ['name' => 'Kenya', 'code' => 'KE'],
            ['name' => 'Lesotho', 'code' => 'LS'],
            ['name' => 'Libéria', 'code' => 'LR'],
            ['name' => 'Libye', 'code' => 'LY'],
            ['name' => 'Madagascar', 'code' => 'MG'],
            ['name' => 'Malawi', 'code' => 'MW'],
            ['name' => 'Mali', 'code' => 'ML'],
            ['name' => 'Maroc', 'code' => 'MA'],
            ['name' => 'Maurice', 'code' => 'MU'],
            ['name' => 'Mauritanie', 'code' => 'MR'],
            ['name' => 'Mozambique', 'code' => 'MZ'],
            ['name' => 'Namibie', 'code' => 'NA'],
            ['name' => 'Niger', 'code' => 'NE'],
            ['name' => 'Nigeria', 'code' => 'NG'],
            ['name' => 'Ouganda', 'code' => 'UG'],
            ['name' => 'Rwanda', 'code' => 'RW'],
            ['name' => 'Sénégal', 'code' => 'SN'],
            ['name' => 'Sierra Leone', 'code' => 'SL'],
            ['name' => 'Somalie', 'code' => 'SO'],
            ['name' => 'Soudan', 'code' => 'SD'],
            ['name' => 'Soudan du Sud', 'code' => 'SS'],
            ['name' => 'Tanzanie', 'code' => 'TZ'],
            ['name' => 'Tchad', 'code' => 'TD'],
            ['name' => 'Togo', 'code' => 'TG'],
            ['name' => 'Tunisie', 'code' => 'TN'],
            ['name' => 'Zambie', 'code' => 'ZM'],
            ['name' => 'Zimbabwe', 'code' => 'ZW'],

            // 🌎 EUROPE
            ['name' => 'France', 'code' => 'FR'],
            ['name' => 'Belgique', 'code' => 'BE'],
            ['name' => 'Allemagne', 'code' => 'DE'],
            ['name' => 'Royaume-Uni', 'code' => 'GB'],
            ['name' => 'Espagne', 'code' => 'ES'],
            ['name' => 'Italie', 'code' => 'IT'],
            ['name' => 'Suisse', 'code' => 'CH'],
            ['name' => 'Pays-Bas', 'code' => 'NL'],
            ['name' => 'Portugal', 'code' => 'PT'],

            // 🌎 AMÉRIQUES
            ['name' => 'États-Unis', 'code' => 'US'],
            ['name' => 'Canada', 'code' => 'CA'],
            ['name' => 'Brésil', 'code' => 'BR'],
            ['name' => 'Argentine', 'code' => 'AR'],
            ['name' => 'Mexique', 'code' => 'MX'],

            // 🌏 ASIE
            ['name' => 'Chine', 'code' => 'CN'],
            ['name' => 'Inde', 'code' => 'IN'],
            ['name' => 'Japon', 'code' => 'JP'],
            ['name' => 'Corée du Sud', 'code' => 'KR'],
            ['name' => 'Indonésie', 'code' => 'ID'],

            // 🌍 MOYEN-ORIENT
            ['name' => 'Émirats Arabes Unis', 'code' => 'AE'],
            ['name' => 'Arabie Saoudite', 'code' => 'SA'],
            ['name' => 'Qatar', 'code' => 'QA'],
            ['name' => 'Turquie', 'code' => 'TR'],

            ['name' => 'Autres', 'code' => 'OTHER'],
        ];

        DB::table('countries')->insert($countries);
    }
}
