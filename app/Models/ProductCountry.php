<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCountry extends Model
{
    protected $guarded = false;

    public function country() {
        return Country::where('id', $this->country_id)->first();
    }
}
