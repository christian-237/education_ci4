<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\Departement;

class DepartementSeeder extends Seeder
{
    public function run()
    {
        $departement = new Departement;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
          $departement->save(
                [
                    'nom_departement'      =>    $faker->firstName,
                    'description'     =>    $faker->lastName
                ]
            );
        }
    }
}
