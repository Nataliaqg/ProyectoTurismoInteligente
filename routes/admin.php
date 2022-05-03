<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Ciudad\ShowCiudad;

Route::get('',[HomeController::class,'index'])->name('admin.index');

//Rutas CIUDAD
Route::get('/ciudad', ShowCiudad::class)->name('ciudad.show');