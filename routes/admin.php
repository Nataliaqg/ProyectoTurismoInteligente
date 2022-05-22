<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Livewire\Admin\Ciudad\ShowCiudad;
use App\Http\Livewire\Admin\Ciudad\CreateCiudad;
use App\Http\Livewire\Admin\Ciudad\EditCiudad;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Hotel\CreateHotel;
use App\Http\Livewire\Admin\Hotel\EditHotel;
use App\Http\Livewire\Admin\Hotel\ShowHotel;
use App\Http\Livewire\Admin\Lugar\CreateLugarturistico;
use App\Http\Livewire\Admin\Lugar\EditLugarturistico;
use App\Http\Livewire\Admin\Lugar\ShowLugarTuristico;
use App\Http\Livewire\Admin\Restaurante\CreateRestaurante;
use App\Http\Livewire\Admin\Restaurante\EditRestaurante;
use App\Http\Livewire\Admin\Restaurante\ShowRestaurante;
use App\Http\Livewire\Admin\Usuario\UserComponent;
use App\Http\Livewire\Admin\Viaje\ShowViaje;

Route::get("",Home::class)->name('admin.index');
//Route::get('',[HomeController::class,'index'])->name('admin.index');

//Ruta ciudad
Route::get('ciudad', ShowCiudad::class)->name('admin.ciudad.show');
Route::get('ciudad/create',CreateCiudad::class)->name('admin.ciudad.create');
Route::get('ciudad/{ciudad}/edit',EditCiudad::class)->name('admin.ciudad.edit');

//Ruta Usuario
Route::get('users',UserComponent::class)->name('admin.users.index');


// Ruta lugar turistico
Route::get('lugarturisticos', ShowLugarTuristico::class)->name('admin.lugarturistico.show');
Route::get('lugarturisticos/{lugarturistico}/edit', EditLugarturistico::class)->name('admin.lugarturisticos.edit');
Route::get('lugarturisticos/create', CreateLugarturistico::class)->name('admin.lugarturisticos.create');

<<<<<<< HEAD
//Ruta Restaurante 
Route::get('restaurantes', ShowRestaurante::class)->name('admin.restaurante.show');
Route::get('restaurantes/create', CreateRestaurante::class)->name('admin.restaurante.create');
Route::get('restaurantes/{restaurante}/edit', EditRestaurante::class)->name('admin.restaurante.edit');


//Ruta hotele
Route::get('hoteles', ShowHotel::class)->name('admin.hotel.show');
Route::get('hoteles/create',CreateHotel::class)->name('admin.hotel.create');
Route::get('hoteles/{hotel}/edit',EditHotel::class)->name('admin.hotel.edit');

//ruta para las imagenes
Route::post('lugarturisticos/{lugarturistico}/files',[LugarController::class,'files'])->name('admin.lugar.files');
Route::post('restaurantes/{restaurante}/files',[RestauranteController::class,'files'])->name('admin.restaurante.files');
Route::post('hoteles/{hotel}/files',[HotelController::class,'files'])->name('admin.hotel.files');
=======
//Ruta Viaje
Route::get('viaje',ShowViaje::class)->name('admin.viaje.show');
>>>>>>> abd5d012713e4876a71c0821635caefd2623eaf4
