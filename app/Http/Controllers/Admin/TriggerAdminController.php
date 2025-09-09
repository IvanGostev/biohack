<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Trigger;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TriggerAdminController extends Controller
{
    public function index(Request $request): View
    {
        $triggers = Trigger::all();
        return view('admin.trigger.index', compact('triggers'));
    }

    public function create(Request $request): View
    {
        return view('admin.trigger.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();

        $trigger = Trigger::create([
            'action' => $all['action'],
            'text' => $all['text'],
        ]);

        return redirect()->route('admin.trigger.index');
    }

    public function delete(Trigger $trigger): RedirectResponse
    {
        $trigger->delete();
        return back();
    }
}
