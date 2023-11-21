<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    protected $table = 'wp_posts';

    use HasFactory;


    public function price(){
        return $this->hasOne(Meta::class,'post_id','ID')
            ->where('meta_key','_price');
    }
    public function sku(){
        return $this->hasOne(Meta::class,'post_id','ID')
            ->where('meta_key','_sku');
    }

    public function sellerDeserved(){
        return $this->hasOne(Meta::class,'post_id','ID')
            ->where('meta_key','_seller_deserved');
    }

    public function productMeta(){
        return $this->hasOne(ProductMeta::class,'product_id','ID');
    }

    public function variations(){
        return $this->hasMany(ProductVariant::class,'post_parent','ID');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('product', function (Builder $builder) {
            $builder->where('post_type','product');
        });
    }
}
