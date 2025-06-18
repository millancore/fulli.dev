<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('welcome', compact('categories'));
    }

    public function showArticles($id)
    {
        $categories = Category::all();
        $category = Category::findOrFail($id);
        $articles = $category->articles;
        return view('welcome', compact('categories', 'articles'));
    }
}
