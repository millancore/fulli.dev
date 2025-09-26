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

}
