<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartProduct extends Model
{
    protected $guarded = false;

    public function image() {
        return ProductImage::where('product_id', $this->product_id)->first();
    }

    public function product() {
        return Product::where('id', $this->product_id)->first();
    }


}
