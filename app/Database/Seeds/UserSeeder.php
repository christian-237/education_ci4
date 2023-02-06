<?php

namespace App\Database\Seeds;
use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
          $user->save(
                [
                    'user_name'      =>    $faker->name,
                    'user_email'     =>    $faker->email
                ]
            );
        }
    }
}
