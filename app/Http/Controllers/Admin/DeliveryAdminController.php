<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Delivery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class DeliveryAdminController extends Controller
{
    public function index(Request $request): View
    {
        $deliveries = Delivery::all();
        return view('admin.delivery.index', compact('deliveries'));
    }

    public function create(Request $request): View
    {
        return view('admin.delivery.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['title' => $all['title']];
        Delivery::create($data);
        return redirect()->route('admin.delivery.index');
    }

    public function edit(Delivery $delivery, Request $request): View
    {
        return view('admin.delivery.edit', compact('delivery'));
    }

    public function update(Delivery $delivery, Request $request): RedirectResponse
    {
        $delivery->update(['title' => $request->title]);
        return redirect()->route('admin.delivery.index');
    }

    public function delete(Delivery $delivery): RedirectResponse
    {
        $delivery->delete();
        return redirect()->route('admin.delivery.index');
    }
}
