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
            'code' => 'pnsl',
            'category_id' => 1,
            'quantity' => 10,
            'price' => 5000,
        ]);

        Product::query()->create([
            'name' => 'Buku',
            'code' => 'bku',
            'category_id' => 1,
            'quantity' => 10,
            'price' => 8000,
        ]);

        Product::query()->create([
            'name' => 'PlayStation 8',
            'code' => 'ps8',
            'category_id' => 2,
            'quantity' => 10,
            'price' => 2000000,
        ]);
        Product::query()->create([
            'name' => 'Gula 1kg',
            'code' => 'gla1',
            'category_id' => 1,
            'quantity' => 10,
            'price' => 18000,
        ]);

        Product::query()->create([
            'name' => 'Beras 1L',
            'code' => 'brs1',
            'category_id' => 1,
            'quantity' => 10,
            'price' => 12000,
        ]);

        $products = Product::factory(20)->raw();

        foreach (array_chunk($products, 5) as $data) {
            Product::query()->insert($data);
        }
    }
}
