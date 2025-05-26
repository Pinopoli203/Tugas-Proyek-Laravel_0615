<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use Faker\Factory as Faker;

class CuanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        
        //faker
        for ($i = 0; $i < 100; $i++) {
            DB::table('cuan')->insert([
                'id' => $faker->numberBetween(1002, 9999),
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => $faker->randomElement(['client', 'freelancer']),
                'bio' => $faker->sentence,
                'skills' => json_encode($faker->randomElements(['design', 'writing', 'seo', 'web'], rand(1, 3))),
                'profile_photo' => null,
            ]);
    }
}
}