<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class FormularioController extends Controller
{
    public function create()
    {
        return view('formulario.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:60',
            'content' => 'required|string',
            'link' => 'required|url|max:255',
        ]);

       $article = Article::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'link' => $validated['link'],
        ]);

        return redirect()->route('home')->with('success', 'Artículo creado correctamente.');
    }
}
