<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Country;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\ProductCountry;
use App\Models\ProductDelivery;
use App\Models\ProductImage;
use App\Models\ProductQuestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;
use Illuminate\View\View;

class QuestionAdminController extends Controller
{
    public function index(Product $product, Request $request): View
    {
        $questions = ProductQuestion::where('product_id', $product->id)->get();
        return view('admin.question.index', compact('questions', 'product'));
    }

    public function create(Product $product, Request $request): View
    {
        return view('admin.question.create', compact('product'));
    }


    public function store(Product $product, Request $request): RedirectResponse
    {
        $all = $request->all();

        ProductQuestion::create([
            'product_id' => $product->id,
            'title' => $all['title'],
            'answer' => $all['answer'],
        ]);

        return redirect()->route('admin.question.index', $product->id);
    }

    public function edit(ProductQuestion $question, Request $request): View
    {
        return view('admin.question.edit', compact('question'));
    }

    public function update (ProductQuestion $question, Request $request): RedirectResponse
    {
        $all = $request->all();

        $question->update([
            'title' => $all['title'],
            'answer' => $all['answer'],
        ]);

        return redirect()->route('admin.question.index', $question->product_id);
    }

    public function delete(ProductQuestion $question): RedirectResponse
    {
        $question->delete();
        return back();
    }
}
