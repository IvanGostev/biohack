<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Social;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class SocialAdminController extends Controller
{
    public function index(Request $request): View
    {
        $socials = Social::all();
        return view('admin.social.index', compact('socials'));
    }

    public function create(Request $request): View
    {
        return view('admin.social.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'title' => $all['title'],
            'img' => $all['img']->store('social', 'public'),
            'link' => $all['link'],
        ];
        Social::create($data);
        return redirect()->route('admin.social.index');
    }

    public function edit(Social $social, Request $request): View
    {
        return view('admin.social.edit', compact('social'));
    }

    public function update(Social $social, Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'title' => $all['title'],
            'link' => $all['link'],
        ];
        if (isset($all['img'])) {
            $data['img'] = $all['img']->store('social', 'public');
        }
        $social->update($data);
        return redirect()->route('admin.social.index');
    }

    public function delete(Social $social): RedirectResponse
    {
        $social->delete();
        return redirect()->route('admin.social.index');
    }
}
