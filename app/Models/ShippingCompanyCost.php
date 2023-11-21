<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingCompanyCost extends Model
{
    use HasFactory;

    protected $fillable = [
        'shipping_company_id',
        'price',
        'refund_price',
    ];

    public function state(){
        return $this->belongsTo(State::class);
    }

    public function shippingCompany(){
        return $this->belongsTo(ShippingCompany::class);
    }

    public function companyCostStates(){
        return $this->hasMany(CompanyCostState::class);
    }
}
