<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderItem extends Model
{
    protected $table = 'wp_woocommerce_order_items';

    use HasFactory;

    public function productOrderItems(){
        return $this->hasMany(ProductOrderItem::class,'order_item_id','order_item_id');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->where('order_item_type','line_item');
        });

    }
}
