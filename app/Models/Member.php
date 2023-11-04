<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'address',
        'level_id',
    ];

    public function level(): BelongsTo
    {
        return $this->belongsTo(Level::class, 'level_id');
    }
}
