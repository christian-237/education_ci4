<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\Specialite;

class SpecialiteSeeder extends Seeder
{
    public function run()
    {
        $specialite = new Specialite;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
          $specialite->save(
                [
                    'nom_specialite'    => $faker->firstName,
                    'id_departement'    => $faker->numberBetween(1,10),
                    'description_spe'   => $faker->lastName
                ]
            );
        }
    }
}
