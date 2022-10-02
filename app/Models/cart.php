<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class cart extends Model
{
    use HasFactory;

    /**
     * Get the user that owns the cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * The products that belong to the cart
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(product::class,'cart_items')->withPivot('service_id','size','qty');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(service::class,'cart_items')->withPivot('product_id','size','qty');
    }
}
