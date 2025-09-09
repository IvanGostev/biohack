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
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProductAdminController extends Controller
{
    public function index(Request $request): View
    {
        $products = Product::all();
        return view('admin.product.index', compact('products'));
    }

    public function create(Request $request): View
    {
        $countries = Country::all();
        $deliveries= Delivery::all();
        return view('admin.product.create', compact('countries', 'deliveries'));
    }



    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

        $product = Product::create([
            'title' => $all['title'],
            'description' => $all['description'],
            'price' => $all['price'],
            'weight' => $all['weight'],
        ]);

        $files = $all['images'];

        foreach ($files as $file) {
            $patch = $file->store('products', 'public');
            ProductImage::create([
                'patch' => $patch,
                'product_id' => $product->id,
            ]);
        }
        return redirect()->route('admin.product.index');
    }

    public function edit(Product $product, Request $request): View
    {
        $countries = Country::all();
        $deliveries= Delivery::all();

        return view('admin.product.edit', compact('countries', 'deliveries', 'product'));
    }

    public function update(Product $product, Request $request): RedirectResponse
    {
        $all = $request->all();

        $product->update([
            'title' => $all['title'],
            'description' => $all['description'],
            'price' => $all['price'],
            'weight' => $all['weight'],
        ]);


        $temps = ProductImage::where('product_id', $product->id)->get();
        foreach($temps as $temp) {
            $temp->delete();
        }

        $files = $all['images'];
        foreach ($files as $file) {
            $patch = $file->store('products', 'public');
            ProductImage::create([
                'patch' => $patch,
                'product_id' => $product->id,
            ]);
        }


        return redirect()->route('admin.product.index');
    }

    public function delete(Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('admin.product.index');
    }
}
