<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Cliente\HotelController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Cliente\LugarTuristicoController;
use App\Http\Controllers\Cliente\Order\OrderController;
use App\Http\Controllers\Cliente\RestauranteController;
use App\Http\Controllers\Cliente\TransportePrivadoController;
use App\Http\Controllers\Cliente\ViajeController;
use App\Http\Livewire\Cliente\EmpresaVista;
use App\Http\Livewire\Cliente\SCart\ShoppingCart;
use App\Http\Livewire\Cliente\Orden\CreateOrden;
use App\Http\Livewire\Cliente\Pago\PaymentOrder;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', WelcomeController::class)->name('inicio'); //pagina principal del cliente
Route::get('categories/{categoria}', [CategoryController::class, 'show'])->name('categories.show');//pagina individual para cada servicio

//RUTAS SERVICIOS INDIVIDUALES
Route::get('lugaresTuristicos/{lugarTuristico}',[LugarTuristicoController::class,'show'])->name('lugaresTuristicos.show');
Route::get('transportePrivados/{transportePrivado}',[TransportePrivadoController::class,'show'])->name('transportePrivados.show');
Route::get('viajes/{viaje}',[ViajeController::class,'show'])->name('viajes.show');
Route::get('restaurantes/{restaurante}',[RestauranteController::class,'show'])->name('restaurantes.show');
Route::get('hotel/{hotel}',[HotelController::class,'show'])->name('hotel.show');
//----------------------------------------------------------------------------------
Route::middleware([ //protegido para entrar al dashboard
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () { //lo que esta adentro necesita previa autentificacion
    
    Route::get('/dashboard',function(){
    return view('dashboard');
    })->name('dashboard');

    //Ciudad
  //  Route::get('/ciudades',Ciudads::class);


}); //cierra grupo de rutas que necesitan autentificacion
//---------------------------------------------------------------------------------
//ruta informacion de la empresa
Route::get('/Informacion',EmpresaVista::class)->name('InformacionEmpresa');
//prueba para eliminar items del carrito
Route::get('prueba',function(){ 
  \Cart::destroy();
});

//ruta del detalle de items en el carrito
Route::get('shopping-cart',ShoppingCart::class)->name('shopping-cart');

//ruta para las ordenes
Route::get('orders/create',CreateOrden::class)->middleware('auth')->name('orders.create'); //manda la orden por url
Route::get('orders/{order}',[OrderController::class,'show'])->name('orders.show');
Route::get('orders/{order}/payment',PaymentOrder::class)->name('orders.payment');