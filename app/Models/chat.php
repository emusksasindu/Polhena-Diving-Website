<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class chat extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(guest::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
