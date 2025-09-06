<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\ProductCountry;
use App\Models\ProductDelivery;
use App\Models\ProductImage;
use App\Models\ProductQuestion;
use App\Models\ProductReview;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ReviewAdminController extends Controller
{
    public function index(Product $product, Request $request): View
    {
        $reviews = ProductReview::where('product_id', $product->id)->get();
        return view('admin.review.index', compact('reviews', 'product'));
    }
    public function moderation(Product $product, Request $request): View
    {
        $reviews = ProductReview::where('status', 'new')->get();
        return view('admin.review.moderation', compact('reviews', 'product'));
    }

    public function status (ProductReview $review, $status, Request $request): RedirectResponse
    {
        $review->update([
            'status' => $status,
        ]);
        return back();
    }

    public function delete(ProductReview $review): RedirectResponse
    {
        $review->delete();
        return back();
    }
}
