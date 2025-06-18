<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ListController extends Controller
{

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('list.show', [
            'article' => $article
        ]);
    }
}
