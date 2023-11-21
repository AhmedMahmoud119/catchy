<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Order extends Model
{

    protected $table = 'wp_posts';
    protected $casts = [ 'post_date'=>'datetime'];

    protected $fillable = [
        'shipping_company_id',
    ];

    public $timestamps = false;

    use HasFactory;

    protected $appends = [
        'shipping_company_cost_price',
        'shipping_company_cost_refund_price',
        'source',
    ];

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'ID');
    }

    public function statusHistories()
    {
        return $this->hasMany(StatusHistory::class, 'order_id', 'ID');
    }

    public function shippingCompany()
    {
        return $this->belongsTo(ShippingCompany::class);
    }

    public function getSourceAttribute()
    {
        return $this->postMetaSource?$this->postMetaSource->meta_value:'Wordpress';
    }

    public function getShippingCompanyCostPriceAttribute()
    {
        return ShippingCompanyCost::
            whereHas('companyCostStates', function ($q) {
                $q->where('state_id', $this->postMetaShippingStateId->meta_value ?? null);
            })->where('shipping_company_id', $this->shipping_company_id)->first()->price ?? 0;
    }

    public function getShippingCompanyCostRefundPriceAttribute()
    {
        return ShippingCompanyCost::
            whereHas('companyCostStates', function ($q) {
                $q->where('state_id', $this->postMetaShippingStateId->meta_value ?? null);
            })->where('shipping_company_id', $this->shipping_company_id)->first()->refund_price ?? 0;
    }

    public function orderStatus()
    {
        return $this->hasOne(OrderStatus::class, 'order_id', 'ID');
    }

    public function orderMeta()
    {
        return $this->hasOne(OrderStatus::class, 'order_id', 'ID');
    }

    public function postMetaCurrency()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_order_currency');
    }

    public function postMetaTotalPrice()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_order_total');
    }

    public function postMetaShippingAddressOne()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_address_1');
    }

    public function postMetaShippingAddressTwo()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_address_2');
    }

    public function postMetaBillingAddressOne()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', '_billing_address_1');
    }

    public function postMetaBillingAddressTwo()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', '_billing_address_2');
    }

    public function postMetaShippingCity()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_city');
    }

    public function postMetaBillingCity()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_billing_city');
    }

    public function postMetaShippingState()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_state');
    }

    public function postMetaShippingStateId()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_state_id');
    }

    public function postMetaSource()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', '_source');
    }

    public function postMetaShippingFirstName()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_first_name');
    }

    public function postMetaShippingLastName()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_shipping_last_name');
    }

    public function postMetaBillingFirstName()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', '_billing_first_name');
    }

    public function postMetaBillingLastName()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')
            ->where('meta_key', '_billing_last_name');
    }

    public function postMetaBillingPhone()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_billing_phone');
    }

    public function postShippingPrice()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_order_shipping');
    }

    public function postPaymentMethod()
    {
        return $this->hasOne(PostMeta::class, 'post_id', 'ID')->where('meta_key', '_payment_method');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'ID', 'post_author');
    }

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope('order', function (Builder $builder) {
            $builder->where('post_type', 'shop_order');
        });

    }
}
