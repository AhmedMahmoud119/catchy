<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'wp_users';
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    public function customer(){
        return $this->hasOne(Customer::class,'user_id','ID');
    }

    public function userMetaPhone(){
        return $this->hasOne(UserMeta::class,'user_id','ID')
            ->where('meta_key','billing_phone');
    }

    public function userMetaAddress(){
        return $this->hasOne(UserMeta::class,'user_id','ID')
            ->where('meta_key','billing_address_1');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
