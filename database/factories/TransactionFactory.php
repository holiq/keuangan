<?php

namespace Database\Factories;

use App\Models\Member;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $idUser = User::query()->pluck('id')->toArray();
        $totalTransaction = $this->faker->biasedNumberBetween(1, 100);
        $noTransaction = 'TRX'.str_pad($totalTransaction + 1, 6, '0', STR_PAD_LEFT);
        $product = Product::factory()->create();
        $qty = $this->faker->numberBetween(1, 15);
        $now = now();

        return [
            'no_transaction' => $noTransaction,
            'type' => $this->faker->randomElement(['sell', 'buy']),
            'user_id' => $this->faker->randomElement($idUser),
            'member_id' => Member::factory()->create()->id,
            'product_id' => $product->id,
            'qty' => $qty,
            'price_one' => $product->price,
            'price_total' => $qty * $product->price,
            'created_at' => $now,
        ];
    }
}
