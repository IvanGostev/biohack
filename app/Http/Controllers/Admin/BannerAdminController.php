<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Banner;
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

class BannerAdminController extends Controller
{
    public function index(Request $request): View
    {
        $banners = Banner::all();
        return view('admin.banner.index', compact('banners'));
    }

    public function create(Request $request): View
    {
        return view('admin.banner.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        Banner::create([
            'title' => $all['title'],
            'text' => $all['text'],
            'img' => $all['img']->store('banners', 'public'),
            'btntext' => $all['btn-text'],
            'btnlink' => $all['btn-link'],
        ]);

        return redirect()->route('admin.banner.index');
    }

    public function delete(Banner $banner): RedirectResponse
    {
        $banner->delete();
        return redirect()->route('admin.banner.index');
    }
}
