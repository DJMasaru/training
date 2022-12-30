<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // public function run()
    // {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    // }

    private const SEEDERS = [
        ArticleSeeder::class,
        CategorySeeder::class
    ];
    public function run()
    {

        foreach(self::SEEDERS as $seeder) {
            $this->call($seeder);
        }

    }




}
