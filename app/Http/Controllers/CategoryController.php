<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Categoria $categoria){
        return view('categorias.show', compact('categoria'));
    }
}
