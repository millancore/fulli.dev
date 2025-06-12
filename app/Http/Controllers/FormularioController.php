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
            'titulo' => 'required|string|max:255',
            'contenido' => 'required|string',
            'link' => 'required|url|max:255',
        ]);

        Article::create([
            'title' => $validated['titulo'],
            'content' => $validated['contenido'],
            'link' => $validated['link'],
        ]);

        return redirect()->route('home')->with('success', 'Artículo creado correctamente.');
    }
}
