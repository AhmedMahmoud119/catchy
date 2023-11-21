<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMeta extends Model
{

    protected $table = 'wp_wc_product_meta_lookup';

    use HasFactory;

    protected $primaryKey = 'product_id';

    public $timestamps = false;

    protected $fillable = [
        'stock_quantity',
    ];

}
