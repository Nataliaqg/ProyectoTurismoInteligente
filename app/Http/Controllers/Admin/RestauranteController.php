<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Restaurante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RestauranteController extends Controller
{
    public function files(Restaurante $restaurante, Request $request){
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);
       $url = Storage::put('public/restaurantes', $request->file('file'));
        $restaurante->images()->create(
            [
                'url' => $url  
            ]
        );
    }
}
