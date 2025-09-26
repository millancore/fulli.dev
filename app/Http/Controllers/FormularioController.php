<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FormularioController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'content' => 'required|string',
            'link' => 'required|url|max:255',
            'category_id' => 'nullable|string',
            'new_category' => 'nullable|string|max:60',
        ]);

        if ($request->category_id === 'new' && $request->filled('new_category')) {
            $category = \App\Models\Category::firstOrCreate(['name' => $request->new_category]);
            $categoryId = $category->id;
        } else {
            if ($request->category_id) {
                \App\Models\Category::findOrFail($request->category_id);
            }
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

        $myCategory = \App\Models\Category::with('articles')->find($categoryId);

        return redirect()
            ->route('list.show', ['id' => $article->id])
            ->with('success', 'Article created successfully.')
            ->with('category', $myCategory);
    }


    public function edit($id)
    {
        $article = \App\Models\Article::findOrFail($id);
        $categories = \App\Models\Category::all();


        $categoryId = DB::table('article_category')
            ->where('article_id', $id)
            ->value('category_id');

        $myCategory = \App\Models\Category::with('articles')->find($categoryId);

        return view('formulario.create', [
            'categories' => $categories,
            'article' => $article,
            'isEdit' => true,
            'myCategory' => $myCategory, 
        ]);
    }

    public function update(Request $request, $id)
    {
        $article = \App\Models\Article::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'link' => 'required|url',
            'category_id' => 'nullable|string',
            'new_category' => 'nullable|string|max:255',
        ]);

        if ($request->filled('new_category')) {
            $category = \App\Models\Category::create(['name' => $request->new_category]);
            $validated['category_id'] = $category->id;
        }

        $article->update($validated);

        if (!empty($validated['category_id'])) {
            $article->categories()->sync([$validated['category_id']]);
        }

        return redirect()
            ->route('article.show', $article->id)
            ->with('success', 'Article updated successfully.');
    }
}
