<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function category(): BelongsTo
    {
        return $this->belongsTo(category::class);
    }
}
