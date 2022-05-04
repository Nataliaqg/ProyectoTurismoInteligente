<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Ciudad\ShowCiudad;
use App\Http\Livewire\Admin\Ciudad\CreateCiudad;
use App\Http\Livewire\Admin\Ciudad\EditCiudad;

Route::get('',[HomeController::class,'index'])->name('admin.index');

//Rutas CIUDAD
Route::get('/ciudad', ShowCiudad::class)->name('ciudad.show');

Route::get('ciudad/create',CreateCiudad::class)->name('admin.ciudad.create');

Route::get('ciudad/{ciudad}/edit',EditCiudad::class)->name('admin.ciudad.edit');