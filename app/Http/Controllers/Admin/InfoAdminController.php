<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Info;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class InfoAdminController extends Controller
{
    public function index(Request $request): View
    {
        $infos = Info::all();
        return view('admin.info.index', compact('infos'));
    }

    public function create(Request $request): View
    {
        return view('admin.info.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'title' => $all['title'],
            'img' => $all['img']->store('info', 'public'),
            'text' => $all['text'],
        ];
        Info::create($data);
        return redirect()->route('admin.info.index');
    }

    public function edit(Info $info, Request $request): View
    {
        return view('admin.info.edit', compact('info'));
    }

    public function update(Info $info, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'title' => $all['title'],
            'text' => $all['text'],
        ];
        if (isset($all['img'])) {
            $data['img'] = $all['img']->store('info', 'public');
        }
        $info->update($data);
        return redirect()->route('admin.info.index');
    }

    public function delete(Info $info): RedirectResponse
    {
        $info->delete();
        return redirect()->route('admin.info.index');
    }
}
