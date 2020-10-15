<?php

namespace Database\Seeders;

use App\Models\Post;
use Faker\Factory;
use Faker\Provider\Address;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $faker = Factory::create();

        foreach (range(1,60) as $index) {
            DB::table('posts')->insert([
                'title' => $faker->title,
                'content' => $faker->content,
                'categorie_id' => $faker->categorie_id,
                'status' => $faker->status,
                'attachement'=>$faker->attachement
            ]);
        }
    }
}
