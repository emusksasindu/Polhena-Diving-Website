<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class guest extends Model
{
    use HasFactory;


    public function chats(): HasMany
    {
        return $this->hasMany(chat::class);
    }
}
