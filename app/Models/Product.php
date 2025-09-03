<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = false;

    public function image() {
        return ProductImage::where('product_id', $this->id)->first();
    }

    public function images() {
        return ProductImage::where('product_id', $this->id)->get();
    }

    public function countReviews() {
        return ProductReview::where('product_id', $this->id)->count();
    }

    public function to() {
        return ProductCountry::where('type', 'to')->where('product_id', $this->id)->get();
    }

    public function from() {
        return ProductCountry::where('type', 'from')->where('product_id', $this->id)->get();
    }

    public function delivery() {
        return ProductDelivery::where('product_id', $this->id)->get();
    }

    public function questions() {
        return ProductQuestion::where('product_id', $this->id)->get();
    }
}
