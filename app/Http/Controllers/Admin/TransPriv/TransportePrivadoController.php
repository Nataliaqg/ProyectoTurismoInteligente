<?php

namespace App\Http\Controllers\Admin\TransPriv;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TransportePrivado;
use Illuminate\Support\Facades\Storage;

class TransportePrivadoController extends Controller
{
    public function files(TransportePrivado $transportePrivado, Request $request)
    {
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);
       $url =   Storage::put('public/transporteprivados', $request->file('file'));
        $transportePrivado->images()->create(
            [
                'url' => $url
            ]
        );
    }
}
