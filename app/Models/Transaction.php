<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_transaction',
        'type',
        'user_id',
        'product_id',
        'qty',
        'price_one',
        'price_total',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function getDiscountPriceAttribute(): int
    {
        if ($this->price_total > 100000) {
            $discount = 10;
        } else {
            $discount = 0;
        }

        return $discount;
    }

    public function getPriceDiscountAttribute(): int
    {
        return $this->price_total * (($this->user->level->discount + $this->product->category->discount + $this->discount_price) / 100);
    }

    public function getTotalPaymentAttribute(): int
    {
        return $this->price_total - $this->price_discount;
    }
}
