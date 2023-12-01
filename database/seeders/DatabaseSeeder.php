<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Pzd\User\Models\User;

class DatabaseSeeder extends Seeder
{
   public static array $seeders = [];

    public function run(): void
    {

        foreach (self::$seeders as $seeder)
        {
            $this->call($seeder);
        }
         User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
