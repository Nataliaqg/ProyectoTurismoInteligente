<?php

namespace App\Http\Controllers\Admin\Lugar;

use App\Http\Controllers\Controller;
use App\Models\LugarTuristico;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LugarController extends Controller
{
    public function files(LugarTuristico $lugarturistico, Request $request)
    {
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);
       $url =   Storage::put('public/lugarturisticos', $request->file('file'));
        $lugarturistico->images()->create(
            [
                'url' => $url
            ]
        );
    }
}
