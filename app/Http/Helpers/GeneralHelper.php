<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class GeneralHelper extends Model
{

    public static function priceCurrency($price,$currency=null)
    {
        $currency = $currency ? ' '.$currency:' AED';
        return number_format($price, 1) . $currency;
    }

}
