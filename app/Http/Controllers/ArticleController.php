<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
public function show($id)
{
    $article = Article::findOrFail($id);

    $categoryId = DB::table('article_category')
        ->where('article_id', $id)
        ->value('category_id');

    $category = Category::with('articles')->findOrFail($categoryId);

    return view('library.show', compact('article', 'category'));
}

    public function index()
    {
        $articles = Article::all();
        
        return view('list.all', compact('articles'));
    }

    public function edit($id)
    {
        $article = Article::with('category')->findOrFail($id);
        $categories = Category::with('articles')->get();

        return view('articles.show', compact('article', 'categories'));
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

    public function list(Request $request)
    {
        $categories = Category::all();
        $sidebarArticles = Article::latest()->take(5)->get();

        if ($request->has('category_id')) {
            $selectedCategory = Category::find($request->category_id);
            $articles = $selectedCategory ? $selectedCategory->articles : collect();
        } else {
            $selectedCategory = null;
            $articles = Article::all();
        }

        return view('list.all', [
            'categories' => $categories,
            'articles' => $articles,
            'selectedCategory' => $selectedCategory,
            'sidebarArticles' => $sidebarArticles,
        ]);
    }
}
