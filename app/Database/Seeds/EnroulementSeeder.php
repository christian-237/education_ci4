<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\Enroulement;

class EnroulementSeeder extends Seeder
{
    public function run()
    {
        $enroulement = new Enroulement;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
          $enroulement->save(
                [
                    'Annee_academique'=> $faker->date($format = 'Y-m-d'),
                    'id_etudiant'     => $faker->numberBetween(1,100),
                    'id_niveau'       => $faker->numberBetween(1,10),
                    'id_specialite'   => $faker->numberBetween(2,11)
                ]
            );
        }
    }
}

