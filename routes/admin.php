<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Livewire\Admin\Ciudad\ShowCiudad;
use App\Http\Livewire\Admin\Ciudad\CreateCiudad;
use App\Http\Livewire\Admin\Ciudad\EditCiudad;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Lugar\CreateLugarturistico;
use App\Http\Livewire\Admin\Lugar\EditLugarturistico;
use App\Http\Livewire\Admin\Lugar\ShowLugarTuristico;
use App\Http\Livewire\Admin\Usuario\UserComponent;


Route::get("",Home::class)->name('admin.index');
//Route::get('',[HomeController::class,'index'])->name('admin.index');

//Rutas CIUDAD
Route::get('/ciudad', ShowCiudad::class)->name('ciudad.show');

Route::get('ciudad/create',CreateCiudad::class)->name('admin.ciudad.create');

Route::get('ciudad/{ciudad}/edit',EditCiudad::class)->name('admin.ciudad.edit');

//Ruta Usuario
Route::get('users',UserComponent::class)->name('admin.users.index');

// Ruta lugar turistico
Route::get('lugarturisticos', ShowLugarTuristico::class)->name('admin.lugarturistico.show');
Route::get('lugarturisticos/{lugarturistico}/edit', EditLugarturistico::class)->name('admin.lugarturisticos.edit');
Route::get('lugarturisticos/create', CreateLugarturistico::class)->name('admin.lugarturisticos.create');
