<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function show($id)
    {
        $category = Category::findOrFail($id);

        // Artículos paginados (10 por página)
        $articles = $category->articles()->paginate(10);

        return view('welcome', compact('category', 'articles'));
    }
     public function destroy($id)
    {
        $category = Category::findOrFail($id);

        if (strtolower($category->name) === 'nocategory') {
            return redirect()->back()->with('error', 'No se puede eliminar la categoría por defecto.');
        }

        $nocategory = Category::firstOrCreate(['name' => 'nocategory']);

        $articleIds = DB::table('article_category')
            ->where('category_id', $category->id)
            ->pluck('article_id');

        if ($articleIds->isNotEmpty()) {
            foreach ($articleIds as $articleId) {
                DB::table('article_category')
                    ->where('article_id', $articleId)
                    ->where('category_id', $category->id)
                    ->delete();

                DB::table('article_category')->insert([
                    'article_id' => $articleId,
                    'category_id' => $nocategory->id
                ]);
            }
        }
    
        $category->delete();

        return redirect()->back()->with('success', 'Categoría eliminada y artículos reasignados correctamente.');
    }
}
