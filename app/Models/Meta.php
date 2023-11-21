<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $table = 'wp_postmeta';

    use HasFactory;

    protected $primaryKey = 'meta_id';
    protected $fillable = [
        'post_id',
        'meta_key',
        'meta_value',
    ];

    public $timestamps = false;


}
