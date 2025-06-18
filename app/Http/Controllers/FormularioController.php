<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('library.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'content' => 'required|string',
            'link' => 'required|url|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:60',
        ]);

        if ($request->category_id === 'new' && $request->filled('new_category')) {
            $category = \App\Models\Category::firstOrCreate(['name' => $request->new_category]);
            $categoryId = $category->id;
        } else {
            $categoryId = $request->category_id;
        }

        $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'link' => $validated['link'],
        ]);
        if ($categoryId) {
            $article->categories()->sync([$categoryId]);
        }
        return redirect()->route('list.show', ['id' => $article->id])->with('success', 'Article created successfully.');
    }
}
