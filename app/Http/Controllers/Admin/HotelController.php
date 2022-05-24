<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Hotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HotelController extends Controller
{
    public function files(Hotel $hotel, Request $request){
        $request->validate([
            'file'=>'required|image|max:2048'
        ]);
       $url = Storage::put('public/hoteles', $request->file('file'));
        $hotel->images()->create(
            [
                'url' => $url  
            ]
        );
    }

}
