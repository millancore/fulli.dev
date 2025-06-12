<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Articulo;

class IndexController extends Controller
{
    public function index()
    {
        $articulos = Articulo::select('id', 'titulo')->get();
        return view('welcome')->with('articulos', $articulos);
    }

}
