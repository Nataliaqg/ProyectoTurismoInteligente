<?php

namespace App\Http\Controllers\Admin\Viaje;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Viaje;
use Illuminate\Support\Facades\Storage;

class ViajeController extends Controller
{
    public function files(Viaje $viaje, Request $request)
    {
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);
       $url =   Storage::put('public/viajes', $request->file('file'));
        $viaje->images()->create(
            [
                'url' => $url
            ]
        );
    }
}
