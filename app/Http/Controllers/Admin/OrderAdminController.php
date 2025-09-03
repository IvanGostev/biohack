<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\Order;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class OrderAdminController extends Controller
{
    public function index(Request $request): View
    {
        $orders = Order::whereNot('status', 'delivered')->get();
        return view('admin.order.index', compact('orders'));
    }

    public function delivery(Order $order): RedirectResponse
    {
        $order->update(['status' => 'delivered']);
        return redirect()->route('admin.order.index');
    }
}
