<?php

namespace Database\Seeders;

use App\Models\Transaction;
use Illuminate\Database\Seeder;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = Transaction::factory(100)->raw();

        foreach (array_chunk($transactions, 10) as $data) {
            Transaction::query()->insert($data);
        }
    }
}
