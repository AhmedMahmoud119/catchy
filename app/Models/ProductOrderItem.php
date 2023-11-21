<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductOrderItem extends Model
{
    use HasFactory;

    protected $table = 'wp_wc_order_product_lookup';

    public function order(){
        return $this->belongsTo(Order::class,'order_id','ID');
    }

    public function product(){
        return $this->belongsTo(Product::class,'product_id','ID');
    }

    public function orderStatus(){
        return $this->belongsTo(OrderStatus::class,'order_id','order_id');
    }
}
