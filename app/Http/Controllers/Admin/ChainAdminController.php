<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Chain;
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

class ChainAdminController extends Controller
{
    public function index(Product $product, Request $request): View
    {
        $chains = Chain::where('product_id', $product->id)->get();
        return view('admin.chain.index', compact('chains', 'product'));
    }

    public function create(Product $product, Request $request): View
    {
        $countries = Country::all();
        $deliveries= Delivery::all();
        return view('admin.chain.create', compact('countries', 'deliveries', 'product'));
    }

    public function store(Product $product, Request $request): RedirectResponse
    {
        $all = $request->all();

        $chain = Chain::create([
            'product_id' => $product->id,
            'to' => $all['to'],
            'from' => $all['from'],
            'delivery_id' => $all['delivery_id'],
        ]);

        return redirect()->route('admin.chain.index', $product->id);
    }



    public function delete(Chain $chain): RedirectResponse
    {
        $chain->delete();
        return back();
    }
}
