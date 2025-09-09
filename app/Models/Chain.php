<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chain extends Model
{
    protected $guarded = false;

    public function to() {
        return Country::where('id', $this->to)->first();
    }
    public function from() {
        return Country::where('id', $this->from)->first();
    }
    public function delivery() {
        return Delivery::where('id', $this->delivery_id)->first();
    }
}
