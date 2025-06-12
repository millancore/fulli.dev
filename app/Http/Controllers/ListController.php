<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class ListController extends Controller
{

    public function show($id)
    {
        $articulo = Articulo::findOrFail($id);
        return view('list.show', [
            'articulo' => $articulo
        ]);
    }
}
