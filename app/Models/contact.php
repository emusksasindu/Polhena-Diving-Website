<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class contact extends Model
{
    use HasFactory;

    public function guest(): BelongsTo
    {
        return $this->belongsTo(guest::class);
    }
}
