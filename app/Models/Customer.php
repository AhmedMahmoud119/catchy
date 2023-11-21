<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'wp_wc_customer_lookup';

    protected $appends = [
        'used_name'
    ];

    use HasFactory;

    public function getUsedNameAttribute(){
        return $this->first_name .' '.$this->last_name;
    }

    public function getUserNameAttribute(){
        return $this->user_name ?? $this->used_name;
    }

    public function userMeta(){
        return $this->belongsTo(UserMeta::class,'user_id','user_id');
    }

    public function userMetaPhone(){
        return $this->hasOne(UserMeta::class,'user_id','user_id')
            ->where('meta_key','billing_phone')
            ->orWhere('meta_key','shipping_phone');
    }


}
