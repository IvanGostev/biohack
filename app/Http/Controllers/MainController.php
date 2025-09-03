<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Product;
use App\Models\ProductCountry;
use App\Models\ProductDelivery;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::all();
        return view('index', compact('products'));
    }

    public function product(Product $product, Request $request)
    {
        $activeImage = $request->imageId ? ProductImage::where('product_id', $product->id)->where('id', $request->imageId)->first() : ProductImage::where('product_id', $product->id)->first();
        if ($request->action) {
            if ($request->action == 'left') {
                if (ProductImage::where('product_id', $product->id)->where('id', $request->imageId - 1)->count() == 1) {
                    $activeImage = ProductImage::where('product_id', $product->id)->where('id', $request->imageId - 1)->first();
                } else {
                    $activeImage = ProductImage::where('id', ProductImage::where('product_id', $product->id)->max('id'))->first();
                }
            } elseif ($request->action == 'right') {
                if (ProductImage::where('product_id', $product->id)->where('id', $request->imageId + 1)->count() == 1) {
                    $activeImage = ProductImage::where('product_id', $product->id)->where('id', $request->imageId + 1)->first();
                } else {
                    $activeImage = ProductImage::where('id', ProductImage::where('product_id', $product->id)->min('id'))->first();
                }
            }
        }

        if ($request->toIdActive) {
            $toIdActive = $request->toIdActive;
        } else {
            $toIdActive = ProductCountry::where('product_id', $product->id)->where('type', 'to')->first()->country_id;
        }

        if ($request->fromIdActive) {
            $fromIdActive = $request->fromIdActive;
        } else {
            $fromIdActive = ProductCountry::where('product_id', $product->id)->where('type', 'from')->first()->country_id;
        }


        if ($request->deliveryIdActive) {
            $deliveryIdActive = $request->deliveryIdActive;
        } else {
            $deliveryIdActive = ProductDelivery::where('product_id', $product->id)->first()->delivery_id;
        }

        if ($request->countActive) {
            $countActive = $request->countActive;
        } else {
            $countActive = 1;
        }
        if ($request->plus) {
            $countActive = $request->countActive + 1;
        } else if ($request->minus) {
            $countActive = max($request->countActive - 1, 0);
        } else {
            $countActive = 1;
        }

        if ($request->cart) {
            if (Cart::where('user_id', auth()->user()->id)->count() > 0) {
                $cart = Cart::where('user_id', auth()->user()->id)->first();
            } else {
                $cart = Cart::create([
                    'user_id' => auth()->user()->id
                ]);
            }
            CartProduct::create([
                'cart_id' => $cart->id,
                'product_id' => $product->id,
                'count' => $request->countActive,
                'delivery_id' => $request->deliveryIdActive,
                'to' => $request->toIdActive,
                'from' => $request->fromIdActive
            ]);

            return redirect()->route('profile.cart');
        }

        return view('product', compact('product', 'activeImage', 'toIdActive', 'deliveryIdActive', 'fromIdActive', 'countActive'));
    }
}
