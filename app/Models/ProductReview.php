<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    protected $guarded = false;

    public function images() {
        return ProductReviewImage::where('product_review_id', $this->id)->get();
    }

    public function user() {
        return User::where('id', $this->user_id)->first();
    }

}
