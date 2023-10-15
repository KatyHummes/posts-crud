<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use Faker\Factory as FakerFactory;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 1; $i <= 100; $i++) {
            Post::create([
                'title' => $faker->sentence,
                'message' => $faker->paragraph,
            ]);
        }
    }
}
