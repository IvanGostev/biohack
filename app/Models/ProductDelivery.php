<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDelivery extends Model
{
    protected $guarded = false;

    public function delivery() {
        return Delivery::where('id', $this->delivery_id)->first();
    }
}
