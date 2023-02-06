<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\Niveau;

class NiveauSeeder extends Seeder
{
    public function run()
    {
        $niveau = new Niveau;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
        $niveau->save(
                [
                    'nom_niveau'      =>    $faker->name
                ]
            );
        }
    }
}