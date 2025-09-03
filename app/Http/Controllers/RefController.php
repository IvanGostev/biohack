<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\ProductCountry;
use App\Models\ProductDelivery;
use App\Models\ProductImage;
use App\Models\User;
use Illuminate\Http\Request;

class RefController extends Controller
{
    public function referral(User $user, Request $request)
    {
        $request->session()->put('ref', $user->id);
        return redirect()->route('index');
    }


}
