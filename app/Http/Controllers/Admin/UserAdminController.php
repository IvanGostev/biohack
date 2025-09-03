<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserAdminController extends Controller
{
    public function index(Request $request): View
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function chat(User $user, Request $request): View
    {
        $messages = Message::where('user_id', $user->id)->get();
        return view('admin.user.chat', compact('user', 'messages'));
    }

    public function message(Request $request): RedirectResponse
    {
        $all = $request->all();
        Message::create([
            'text' => $all['text'],
            'status' => 'new',
            'whom' => 'user',
            'user_id' => $all['user_id']
        ]);
        return redirect()->route('admin.user.chat', $all['user_id']);
    }
}
