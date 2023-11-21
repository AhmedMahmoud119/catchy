<?php

namespace App\Http\Helpers;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class ProductHelper extends Model
{

    public static function image($id)
    {

        $image = \DB::select("
            select ID,guid,post_parent,ID,post_type from wp_posts where post_type='attachment'
            and post_parent = $id Order By wp_posts.ID desc limit 1;
            "
        );

        return isset($image[0])?$image[0]:'';

    }

}
