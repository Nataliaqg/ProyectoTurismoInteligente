<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\Lugar\LugarController;
use App\Http\Controllers\Admin\RestauranteController;
use App\Http\Controllers\Admin\TransPriv\TransportePrivadoController;
use App\Http\Controllers\Admin\Viaje\ViajeController;
use App\Http\Controllers\UserExportController;
use App\Http\Livewire\Admin\Agencia\CreateAgencia;
use App\Http\Livewire\Admin\Agencia\EditAgencia;
use App\Http\Livewire\Admin\Agencia\ShowAgencia;
use App\Http\Livewire\Admin\Ciudad\ShowCiudad;
use App\Http\Livewire\Admin\Ciudad\CreateCiudad;
use App\Http\Livewire\Admin\Ciudad\EditCiudad;
use App\Http\Livewire\Admin\ContraBitacora;
use App\Http\Livewire\Admin\Empresa\EditEmpresa;
use App\Http\Livewire\Admin\Home;
use App\Http\Livewire\Admin\Hotel\CreateHabitacion;
use App\Http\Livewire\Admin\Hotel\CreateHotel;
use App\Http\Livewire\Admin\Hotel\EditHotel;
use App\Http\Livewire\Admin\Hotel\ShowHotel;
use App\Http\Livewire\Admin\Lugar\CreateLugarturistico;
use App\Http\Livewire\Admin\Lugar\EditLugarturistico;
use App\Http\Livewire\Admin\Lugar\ShowLugarTuristico;
use App\Http\Livewire\Admin\LwBitacora;
use App\Http\Livewire\Admin\Ordenes\OrderController;
use App\Http\Livewire\Admin\Ordenes\ShowOrder;
use App\Http\Livewire\Admin\Restaurante\CreateMesa;
use App\Http\Livewire\Admin\Restaurante\CreateRestaurante;
use App\Http\Livewire\Admin\Restaurante\EditRestaurante;
use App\Http\Livewire\Admin\Restaurante\ShowRestaurante;
use App\Http\Livewire\Admin\Transporte\CreateTransporte;
use App\Http\Livewire\Admin\Transporte\EditTransporte;
use App\Http\Livewire\Admin\Transporte\ShowTransporte;
use App\Http\Livewire\Admin\TransportePriv\CreateTransPriv;
use App\Http\Livewire\Admin\TransportePriv\EditTransPriv;
use App\Http\Livewire\Admin\TransportePriv\ShowTransPriv;
use App\Http\Livewire\Admin\Usuario\CreateUser;
use App\Http\Livewire\Admin\Usuario\EditUser;
use App\Http\Livewire\Admin\Usuario\ShowUser;
use App\Http\Livewire\Admin\Usuario\UserComponent;
use App\Http\Livewire\Admin\Viaje\CreateViaje;
use App\Http\Livewire\Admin\Viaje\EditViaje;
use App\Http\Livewire\Admin\Viaje\ShowViaje;


Route::get("",Home::class)->name('admin.index');
//Route::get('',[HomeController::class,'index'])->name('admin.index');

//Ruta ciudad
Route::get('ciudad', ShowCiudad::class)->name('admin.ciudad.show');
Route::get('ciudad/create',CreateCiudad::class)->name('admin.ciudad.create');
Route::get('ciudad/{ciudad}/edit',EditCiudad::class)->name('admin.ciudad.edit');

//Ruta Usuarios
Route::get('rol',UserComponent::class)->name('admin.roles.index');
Route::get('users',ShowUser::class)->name('admin.users.show');
Route::get('users/create',CreateUser::class)->name('admin.user.create');
Route::get('users/{user}/edit',EditUser::class)->name('admin.user.edit');


// Ruta lugar turistico
Route::get('lugarturisticos', ShowLugarTuristico::class)->name('admin.lugarturistico.show');
Route::get('lugarturisticos/{lugarturistico}/edit', EditLugarturistico::class)->name('admin.lugarturisticos.edit');
Route::get('lugarturisticos/create', CreateLugarturistico::class)->name('admin.lugarturisticos.create');

//Ruta Restaurante 
Route::get('restaurantes', ShowRestaurante::class)->name('admin.restaurante.show');
Route::get('restaurantes/create', CreateRestaurante::class)->name('admin.restaurante.create');
Route::get('restaurantes/{restaurante}/edit', EditRestaurante::class)->name('admin.restaurante.edit');
Route::get('restaurantes/{restaurante}/mesas', CreateMesa::class)->name('admin.restaurante.mesa');

//Ruta hoteles
Route::get('hoteles', ShowHotel::class)->name('admin.hotel.show');
Route::get('hoteles/create',CreateHotel::class)->name('admin.hotel.create');
Route::get('hoteles/{hotel}/edit',EditHotel::class)->name('admin.hotel.edit');
Route::get('hoteles/{hotel}/habitaciones',CreateHabitacion::class)->name('admin.hotel.habitaciones');

//ruta para las imagenes
Route::post('lugarturisticos/{lugarturistico}/files',[LugarController::class,'files'])->name('admin.lugar.files');
Route::post('restaurantes/{restaurante}/files',[RestauranteController::class,'files'])->name('admin.restaurante.files');
Route::post('hoteles/{hotel}/files',[HotelController::class,'files'])->name('admin.hotel.files');
Route::post('transporteprivados/{transportePrivado}/files',[TransportePrivadoController::class,'files'])->name('admin.transporteprivado.files');
Route::post('viajes/{viaje}/files',[ViajeController::class,'files'])->name('admin.viaje.files');
//Ruta Viaje
Route::get('viaje',ShowViaje::class)->name('admin.viaje.show');
Route::get('viaje/create',CreateViaje::class)->name('admin.viaje.create');
Route::get('viaje/{viaje}/edit',EditViaje::class)->name('admin.viaje.edit');
//Rutas Agencia
Route::get('/agencias',ShowAgencia::class)->name('admin.agencias.show');
Route::get('agencias/{agencia}/edit',EditAgencia::class)->name('admin.agencia.edit');
Route::get('agencias/create',CreateAgencia::class)->name('admin.agencia.create');
//Rutas Trasnporte
Route::get('/transportes',ShowTransporte::class)->name('admin.transportes.show');
Route::get('/transportes/{transporte}/edit',EditTransporte::class)->name('admin.transporte.edit');
Route::get('/transportes/create',CreateTransporte::class)->name('admin.transporte.create');


//bitacora
Route::get('bitacoras',LwBitacora::class)->name('admin.bitacora');
Route::get('contraseña',ContraBitacora::class)->name('admin.contraseñabitacora');

//Reportes Usuarios
Route::get('users/export/excel',[UserExportController::class,'exportAllUsersExcel'])->name('users.exportExcel');
Route::get('users/export/csv',[UserExportController::class,'exportAllUsersCSV'])->name('users.exportCSV');
Route::get('users/export/html',[UserExportController::class,'exportAllUsersHTML'])->name('users.exportHTML');
Route::get('users/export/pdf',[UserExportController::class,'exportAllUsersPDF'])->name('users.exportPDF');
Route::get('users/export/ODS',[UserExportController::class,'exportAllUsersODS'])->name('users.exportODS');
Route::get('users/export/TSV',[UserExportController::class,'exportAllUsersTSV'])->name('users.exportTSV');

//Transporte privado
Route::get('transporteprivados',ShowTransPriv::class)->name('admin.transporteprivado.show');
Route::get('transporteprivados/create',CreateTransPriv::class)->name('admin.transporteprivado.create');
Route::get('transporteprivados/{transportePrivado}/edit',EditTransPriv::class)->name('admin.transporteprivado.edit');

//Informacion de la Empresa
Route::get('/Empresa',EditEmpresa::class)->name('admin.empresa');

//ruta para ver las ordenes
//Route::get('orders',[OrderController::class,'index'])->name('admin.orders.index');
//Route::get('orders/{order}',[OrderController::class,'show'])->name('admin.orders.show');
Route::get('orders',OrderController::class)->name('admin.orders.index');
Route::get('orders/{order}',ShowOrder::class)->name('admin.orders.show');