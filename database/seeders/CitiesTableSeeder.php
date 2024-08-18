<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cities = [
            ['name' => 'Adrar'],
            ['name' => 'Chlef'],
            ['name' => 'Laghouat'],
            ['name' => 'Oum El Bouaghi'],
            ['name' => 'Batna'],
            ['name' => 'Béjaïa'],
            ['name' => 'Biskra'],
            ['name' => 'Béchar'],
            ['name' => 'Blida'],
            ['name' => 'Bouira'],
            ['name' => 'Tamanrasset'],
            ['name' => 'Tébessa'],
            ['name' => 'Tlemcen'],
            ['name' => 'Tiaret'],
            ['name' => 'Tizi Ouzou'],
            ['name' => 'Algiers'],
            ['name' => 'Djelfa'],
            ['name' => 'Jijel'],
            ['name' => 'Sétif'],
            ['name' => 'Saïda'],
            ['name' => 'Skikda'],
            ['name' => 'Sidi Bel Abbès'],
            ['name' => 'Annaba'],
            ['name' => 'Guelma'],
            ['name' => 'Constantine'],
            ['name' => 'Médéa'],
            ['name' => 'Mostaganem'],
            ['name' => 'MSila'],
            ['name' => 'Mascara'],
            ['name' => 'Ouargla'],
            ['name' => 'Oran'],
            ['name' => 'El Bayadh'],
            ['name' => 'Illizi'],
            ['name' => 'Bordj Bou Arréridj'],
            ['name' => 'Boumerdès'],
            ['name' => 'El Tarf'],
            ['name' => 'Tindouf'],
            ['name' => 'Tissemsilt'],
            ['name' => 'El Oued'],
            ['name' => 'Khenchela'],
            ['name' => 'Souk Ahras'],
            ['name' => 'Tipaza'],
            ['name' => 'Mila'],
            ['name' => 'Aïn Defla'],
            ['name' => 'Naâma'],
            ['name' => 'Aïn Témouchent'],
            ['name' => 'Ghardaïa'],
            ['name' => 'Relizane'],
            ['name' => 'Timimoun'],
            ['name' => 'Bordj Badji Mokhtar'],
            ['name' => 'Ouled Djellal'],
            ['name' => 'Béni Abbès'],
            ['name' => 'In Salah'],
            ['name' => 'In Guezzam'],
            ['name' => 'Touggourt'],
            ['name' => 'Djanet'],
            ['name' => 'El M\'Ghair'],
            ['name' => 'El Meniaa']
        ];

        DB::table('cities')->insert($cities);
    }
}
