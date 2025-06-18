<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('list.all', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        return view('list.edit', compact('article', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'content' => 'required|string',
            'link' => 'required|url|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'new_category' => 'nullable|string|max:60',
        ]);

        if ($request->category_id === 'new' && $request->filled('new_category')) {
            $category = Category::firstOrCreate(['name' => $request->new_category]);
            $categoryId = $category->id;
        } else {
            $categoryId = $request->category_id;
        }

        $article = Article::findOrFail($id);
        $article->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'link' => $validated['link'],
        ]);
        if ($categoryId) {
            $article->categories()->sync([$categoryId]);
        }
        return redirect()->route('articles.list')->with('success', 'Article updated successfully.');
    }
}
