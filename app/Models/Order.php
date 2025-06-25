<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_name',
        'order_status', 
        'comment',
    ];

    protected $attributes = [
        'order_status' => 'Новый' 
    ];

    public $timestamps = false;

    public const STATUS_NEW = 'Новый';

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
    * Get the order's total price.
    */

    public function getTotalAttribute(): float
    {
        return $this->products->sum('price');
    }
    
}
