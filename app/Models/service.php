<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class service extends Model
{
    use HasFactory;


    public function products(): BelongsToMany
    {
        return $this->belongsToMany(product::class,'cart_items')->withPivot('cart_id','size','qty');
    }

    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(cart::class,'cart_items')->withPivot('product_id','size','qty');
    }
}
