<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BalanceMessage extends Model
{
    protected $guarded = false;

    public function user() {
        return User::where('id', $this->user_id)->first();
    }
}
