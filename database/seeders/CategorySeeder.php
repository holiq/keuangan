<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::query()->create([
            'name' => 'ATK',
            'discount' => 5,
        ]);

        Category::query()->create([
            'name' => 'Electronic',
            'discount' => 10,
        ]);

        Category::query()->create([
            'name' => 'Sembako',
            'discount' => 15,
        ]);

        Category::query()->create([
            'name' => 'Alat Bangunan',
            'discount' => 0,
        ]);
    }
}
