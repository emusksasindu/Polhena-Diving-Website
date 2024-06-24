<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

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


    public function orderProducts(): BelongsToMany
    {
        return $this->belongsToMany(product::class,'order_item')->withPivot('order_id','size','qty','discount','total')->withTimestamps();
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(order::class,'order_item')->withPivot('product_id','size','qty','discount','total')->withTimestamps();
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(review::class);
    }
}
