<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BalanceMessage;
use App\Models\Cart;
use App\Models\CartProduct;
use App\Models\Image;
use App\Models\Message;
use App\Models\Order;
use App\Models\Trigger;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function support(Request $request): View
    {
        $messages = Message::where('user_id', auth()->user()->id)->get();
        foreach ($messages as &$message) {
            if ($message->whom != 'support') {
                $message->update(['status' => 'read']);
            }
        }

//        $messages = Message::where('user_id', auth()->user()->id)->get();


        return view('profile.support', compact('messages'));
    }

    public function referral(Request $request): View
    {
        return view('profile.referral');
    }

    public function status(Request $request): View
    {
        return view('profile.status');
    }

    public function cart(Request $request): View
    {

        if ($request->action) {
            $cp = CartProduct::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $cp->delete();
                    break;
                case 'plus':
                    $cp->update(['count' => $cp->count + 1]);
                    break;
                case 'minus':
                    $cp->update(['count' => max($cp->count - 1, 0)]);
                    break;
            }
        }
        if (Cart::where('user_id', auth()->user()->id)->count() > 0) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
        } else {
            $cart = Cart::create([
                'user_id' => auth()->user()->id
            ]);
        }
        $items = CartProduct::where('cart_id', $cart->id)->get();
        $sum = 0;
        foreach ($items as $item) {
            $sum += $item->product()->price * $item->count;
        }

        return view('profile.cart', compact('items', 'sum'));
    }

    public function order(Request $request): View
    {
        $items = CartProduct::where('cart_id', Cart::where('user_id', auth()->user()->id)->first()->id)->get();
        $sum = 0;
        foreach ($items as $item) {
            $sum += $item->product()->price * $item->count;
        }
        $user = auth()->user();
        if ($user->balance >= $sum) {
            $items = CartProduct::where('cart_id', Cart::where('user_id', auth()->user()->id)->first()->id)->get();
            foreach ($items as &$item) {
                if (auth()->user()->ref) {
                    $price = $item->product()->price * $item->count - ($item->product()->price * $item->count ** 0.5);
                } else {
                    $price = $item->product()->price * $item->count;
                }
               $order = Order::create([
                    'price' => $price,
                    'product_id' => $item->product_id,
                    'count' => $item->count,
                    'delivery_id' => $item->delivery_id,
                    'to' => $item->to,
                    'from' => $item->from,
                    'user_id' => $user->id
                ]);
                Message::create([
                    'text' => 'A new order has been created #' . (string)$order->id,
                    'status' => 'new',
                    'whom' => 'user',
                    'user_id' => $user->id
                ]);
                if (auth()->user()->ref and auth()->user()->ref != auth()->user()->id) {
                    $ref = User::where('id', auth()->user()->ref)->first();
                    $ref->update(['balance' => $ref->balance + (($item->product()->price * $item->count) * 0.05)]);
                    BalanceMessage::create([
                        'text' => 'system',
                        'sum' => (($item->product()->price * $item->count) * 0.05),
                        'type' => 'ref',
                        'status' => 'approved',
                        'user_id' => $ref->id,
                    ]);
                }
                $item->delete();
            }
            $user->update(['balance' => $user->balance - $sum]);
        }

        return view('profile.cart', compact('items', 'sum'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit');
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->all();

        if (isset($data['avatar'])) {
            $data['avatar'] = $data['avatar']->store('avatars', 'public');
        }
        $user = auth()->user();
        $user->update($data);
        return back();
    }

public function message(Request $request) {
    $all = $request->all();
    Message::create([
        'text' => $all['text'],
        'status' => 'new',
        'whom' => 'support',
        'user_id' => $all['user_id']
    ]);
    return back();
}


    public function balance(Request $request): View
    {
        $messages = BalanceMessage::where('user_id', auth()->user()->id)->get();
        return view('profile.balance', compact('messages'));
    }
    public function balance_active(Request $request)
    {
        $all = $request->all();
        BalanceMessage::create([
            'text' => $all['text'],
            'sum' => $all['sum'],
            'type' => $all['type'],
            'user_id' => $all['user_id']
        ]);
        $triggers = Trigger::where('action', $all['type'])->get();

        foreach ($triggers as $trigger) {
            Message::create([
                'text' => $trigger->text,
                'status' => 'new',
                'whom' => 'user',
                'user_id' => $all['user_id']
            ]);
        }
        return redirect()->route('profile.balance');
    }
}
