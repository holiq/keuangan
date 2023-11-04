<?php

namespace Database\Seeders;

use App\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::query()->create([
            'name' => 'Silver',
            'discount' => 5,
        ]);

        Level::query()->create([
            'name' => 'Gold',
            'discount' => 10,
        ]);

        Level::query()->create([
            'name' => 'Platinum',
            'discount' => 15,
        ]);

        Level::query()->create([
            'name' => 'Diamond',
            'discount' => 20,
        ]);
    }
}
