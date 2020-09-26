<?php

namespace App\Http\Controllers;

use App\Models\CategoriaReceta;
use App\Models\Receta;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
    public function show(CategoriaReceta $categoriaReceta)
    {
        $recetas = Receta::where('categoria_id', $categoriaReceta->id)->simplePaginate(10);

        return view('categorias.show', compact('recetas', 'categoriaReceta'));
    }
}
