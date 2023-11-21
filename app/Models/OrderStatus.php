<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class OrderStatus extends Model
{

    protected $table = 'wp_wc_order_stats';

    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public static $types = [
        'wc-pending'        => 'Pending payment',
        'wc-processing'     => 'Processing',
        'wc-on-hold'        => 'On hold',
        'wc-completed'      => 'Completed',
        'wc-cancelled'      => 'Cancelled',
        'wc-in-shipping'    => 'In Shipping',
        'wc-refunded'       => 'Refunded',
        'wc-failed'         => 'Failed',
        'wc-checkout-draft' => 'Draft',
    ];

    public static $sources = [
        'Wordpress',
        'Facebook',
        'WhatsApp',
    ];

    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();


    }
}
