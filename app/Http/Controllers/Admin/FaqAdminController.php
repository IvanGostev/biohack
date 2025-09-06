<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Faq;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class FaqAdminController extends Controller
{
    public function index(Request $request): View
    {
        $faqs = Faq::all();
        return view('admin.faq.index', compact('faqs'));
    }

    public function create(Request $request): View
    {
        return view('admin.faq.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $all = $request->all();
        $data = [
            'title' => $all['title'],
            'answer' => $all['answer'],
        ];
        Faq::create($data);
        return redirect()->route('admin.faq.index');
    }

    public function edit(Faq $faq, Request $request): View
    {
        return view('admin.faq.edit', compact('faq'));
    }

    public function update(Faq $faq, Request $request): RedirectResponse
    {
        $all = $request->all();
        $faq->update([
            'title' => $all['title'],
            'answer' => $all['answer'],
        ]);
        return redirect()->route('admin.faq.index');
    }

    public function delete(Faq $faq): RedirectResponse
    {
        $faq->delete();
        return redirect()->route('admin.faq.index');
    }
}
