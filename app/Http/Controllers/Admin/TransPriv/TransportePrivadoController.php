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
            'file' => 'required|image|max:2048'
        ]);
        //$url =   Storage::put('public/transporteprivados', $request->file('file'));
        $url =  "https://bnzv-clinica-salud-s3.s3.us-east-1.amazonaws.com/" . Storage::disk('s3')->put('documentos', $request->file('file'));
        $transportePrivado->images()->create(
            [
                'url' => $url
            ]
        );
    }
}
