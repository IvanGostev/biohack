<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Chain;
use App\Models\Faq;
use App\Models\Info;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductReview;
use App\Models\ProductReviewImage;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request)
    {
        $products = Product::all();
        $faqs = Faq::all();
        $infos = Info::all();
        return view('index', compact('products', 'faqs', 'infos'));
    }

    public function product(Product $product, Request $request)
    {
        $reviews = ProductReview::where('product_id', $product->id)->where('status', 'approve')->get();
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
        if ($request->imageFileActive) {
            $imageFileActive = ProductReviewImage::where('id', $request->imageFileActive)->first();
        } else {
            $imageFileActive = 0;
        }
        if ($request->toIdActive) {
            $toIdActive = $request->toIdActive;
        } else {
            $toIdActive = 0;
        }

        if ($request->fromIdActive) {
            $fromIdActive = $request->fromIdActive;
        } else {
            $fromIdActive = 0;
        }


        if ($request->deliveryIdActive) {
            $deliveryIdActive = $request->deliveryIdActive;
        } else {
            $deliveryIdActive = 0;
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

        if ($request->writeReview and $request->writeReview == 'display') {
            $writeReview = 'display';
        } else {
            $writeReview = 'none';
        }

        if ($request->cart) {
            if (!auth()->check()) {
                return redirect()->route('login');
            }
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

        $froms = [];
        $tos = [];
        $deliveries = [];

        if ($request->selectiondelivery and $request->toIdActive and $request->fromIdActive) {
            $fromIdActive = $request->fromIdActive;
            $toIdActive = $request->toIdActive;
            $deliveries = Chain::where('product_id', $product->id)->where('from', $fromIdActive)->where('to', $toIdActive)->get();
            $panel = 'delivery';
        } elseif ($request->selectionto and $request->fromIdActive) {
            $fromIdActive = $request->fromIdActive;
            $deliveryIdActive = 0;
            $tos = Chain::where('product_id', $product->id)->where('from', $fromIdActive)->get();
            $panel = 'to';
        } elseif ($request->selectionfrom) {
            $toIdActive = 0;
            $deliveryIdActive = 0;
            $froms = Chain::where('product_id', $product->id)->get();
            $panel = 'from';
        } else {
            if (Chain::where('from', $request->fromIdActive)->where('to', $request->toIdActive)->where('delivery_id', $request->deliveryIdActive)->first()) {
                $panel = 'delivery';
                $deliveries = Chain::where('product_id', $product->id)->where('from', $fromIdActive)->where('to', $toIdActive)->get();
            } elseif (Chain::where('from', $request->fromIdActive)->where('to', $request->toIdActive)->first()) {
                $panel = 'to';
                $tos = Chain::where('product_id', $product->id)->where('from', $fromIdActive)->get();
            } else {
                $panel = 'from';
                $froms = Chain::where('product_id', $product->id)->get();
            }
        }

        return view('product', compact('product', 'activeImage', 'toIdActive', 'deliveryIdActive', 'fromIdActive', 'countActive', 'writeReview', 'reviews', 'imageFileActive', 'froms', 'tos', 'deliveries', 'panel'));
    }

    public function review(Request $request)
    {
        $all = $request->all();
        if (isset($all['images']) and count($all['images']) > 5) {
            return redirect()->route('product', $all['product_id'])->withErrors(['image' => 'Up to 5 images']);
        }
        $pr = ProductReview::create([
            'product_id' => $all['product_id'],
            'text' => $all['text'],
            'user_id' => auth()->user()->id,
        ]);


        if (isset($all['images'])) {
            $files = $all['images'];
            foreach ($files as $file) {
                $patch = $file->store('reviews', 'public');
                ProductReviewImage::create([
                    'patch' => $patch,
                    'product_review_id' => $pr->id,
                ]);
            }
        }
        return redirect()->route('product', $all['product_id']);
    }

    public function review_delete(Request $request)
    {
        $review = ProductReview::where('id', $request->review_id)->first();
        if ($review and auth()->user()->id == $review->user()->id) {
            $review->delete();
        }
        return back();
    }

}
