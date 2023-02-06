<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\Etudiant;

class EtudiantSeeder extends Seeder
{
    public function run()
    {
        $etudiant = new Etudiant;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
          $etudiant->save(
                [
                    'nom'      =>    $faker->name,
                    'prenom'   =>    $faker->name,
                    'date_naissance'   =>   $faker->date($format = 'Y-m-d'),
                    'image'   =>    $faker->name
                ]
            );
        }
    }
}
