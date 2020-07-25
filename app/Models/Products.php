<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = 'products';

    protected $primaryKey = 'products.id';

    protected $fillable = [
        'product_name','product_describe','categories_id','trade_flag','product_image1',
        'product_image2','product_image3','product_image4','product_image5','users_id',
        'updated_at',
    ];

    public function categories(){
        return $this->belongsTo('App\Models\Product','categories_id');
    }

}
