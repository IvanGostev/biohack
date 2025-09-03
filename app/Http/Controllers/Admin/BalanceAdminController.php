<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\BalanceMessage;
use App\Models\Country;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class BalanceAdminController extends Controller
{

    public function index(Request $request): View
    {
        $messages = BalanceMessage::where('status', 'consideration')->get();
        return view('admin.balance.index', compact('messages'));
    }

    public function action(BalanceMessage $message, $action, Request $request): RedirectResponse
    {
        if ($action == 'approved') {
            $user = $message->user();
            if ($message->type == 'replenishment') {
                $user->update(['balance' => $user->balance + $message->sum]);
            } else {
                $user->update(['balance' => $user->balance - $message->sum]);
            }
            $message->update(['status' => 'approved']);
        } else {
            $message->update(['status' => 'rejected']);
        }

        return back();
    }
}
