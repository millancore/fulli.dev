<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class IndexController extends Controller
{
public function index()
    {
        $articles = Article::paginate(10);
        $categories = Category::paginate(10);

        return view('welcome')->with([
            'articles' => $articles,
            'categories' => $categories,
        ]);
    }

}
