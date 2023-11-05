<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->create([
            'name' => 'Pensil',
            'category_id' => 1,
            'qty' => 10,
            'price' => 5000,
        ]);

        Product::query()->create([
            'name' => 'Buku',
            'category_id' => 1,
            'qty' => 10,
            'price' => 8000,
        ]);

        Product::query()->create([
            'name' => 'PlayStation 8',
            'category_id' => 2,
            'qty' => 10,
            'price' => 2000000,
        ]);
        Product::query()->create([
            'name' => 'Gula 1kg',
            'category_id' => 1,
            'qty' => 10,
            'price' => 18000,
        ]);

        Product::query()->create([
            'name' => 'Beras 1L',
            'category_id' => 1,
            'qty' => 10,
            'price' => 12000,
        ]);

        $products = Product::factory(20)->raw();

        foreach (array_chunk($products, 5) as $data) {
            Product::query()->insert($data);
        }
    }
}
