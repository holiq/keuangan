<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('no_transaction');
            $table->enum('type', ['sell', 'buy']);
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('member_id')->constrained('members');
            $table->foreignId('product_id')->constrained('products');
            $table->integer('qty');
            $table->float('price_one', 12);
            $table->float('price_total', 12);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
