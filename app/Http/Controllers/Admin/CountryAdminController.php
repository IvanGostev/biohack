<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CountryAdminController extends Controller
{
    public function index(Request $request): View
    {
        $countries = Country::all();
        return view('admin.country.index', compact('countries'));
    }

    public function create(Request $request): View
    {
        return view('admin.country.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = ['title' => $all['title']];
        Country::create($data);
        return redirect()->route('admin.country.index');
    }

    public function edit(Country $country, Request $request): View
    {
        return view('admin.country.edit', compact('country'));
    }

    public function update(Country $country, Request $request): RedirectResponse
    {
        $country->update(['title' => $request->title]);
        return redirect()->route('admin.country.index');
    }

    public function delete(Country $country): RedirectResponse
    {
        $country->delete();
        return redirect()->route('admin.country.index');
    }
}
