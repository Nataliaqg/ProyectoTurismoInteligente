<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //

    public function __invoke()
    {

        $hoteles = Hotel::all();

        return view('welcome', compact('hoteles'));
    }
}
