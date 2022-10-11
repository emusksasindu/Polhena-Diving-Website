<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class product extends Model
{
    use HasFactory;



      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'description',
        'qty',
        'size',
        'category',
        'color',
        'status',
        'selling_price',
        'buying_price',
    ];

    /**
     * The carts that belong to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts(): BelongsToMany
    {
        return $this->belongsToMany(cart::class,'cart_items')->withPivot('service_id','size','qty');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(service::class,'cart_items')->withPivot('cart_id','size','qty');
    }


    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(order::class,'order_item')->withPivot('service_id','size','qty','discount','total')->withTimestamps();
    }

    public function orderServices(): BelongsToMany
    {
        return $this->belongsToMany(service::class,'order_item')->withPivot('order_id','size','qty','discount','total')->withTimestamps();
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
