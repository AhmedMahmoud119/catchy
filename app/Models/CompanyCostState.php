<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyCostState extends Model
{

    use HasFactory;

    protected $fillable = [
        'shipping_company_cost_id',
        'state_id',
    ];

    public function state(){
        return $this->belongsTo(State::class);
    }
    public function shippingCompanyCost(){
        return $this->belongsTo(ShippingCompanyCost::class);
    }
}
