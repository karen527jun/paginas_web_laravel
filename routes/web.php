<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/home', function () {
    return view('home');
})->middleware('auth');

//Productos
// Ruta para mostrar la vista show.blade.php
Route::get('/products', [ProductoController::class, 'index']);

Route::get('/products/show', [ProductoController::class, 'show']);
// Ruta para mostrar la vista create.blade.php
Route::get('/products/create', [ProductoController::class, 'create']);
Route::post('/products', [ProductoController::class, 'store']);
// Ruta para mostrar la vista update.blade.php
Route::get('/products/{id}/edit', [ProductoController::class, 'edit']);
Route::put('/products/{id}', [ProductoController::class, 'update']);
Route::delete('/products/{id}', [ProductoController::class, 'destroy']);





//Marcas
Route::get('/marcas',[MarcaController::class, 'index']);
Route::get('/marcas/show', [MarcaController::class, 'show']);
Route::post('/marcas',[MarcaController::class, 'store']);
Route::get('marcas/create', [MarcaController::class, 'create']);
Route::get('marcas/{id}/edit',[MarcaController::class, 'edit'] );
Route::put('marcas/{id}',[MarcaController::class, 'update'] );
Route::delete('marcas/{id}',[MarcaController::class, 'destroy'] );

//Clientes

Route::get('/clients',[ClienteController::class,'index']);
Route::get('/clients/show',[ClienteController::class,'show']);
Route::post('/clients',[ClienteController::class,'store']);
Route::get('/clients/create',[ClienteController::class,'create']);
Route::get('/clients/{id}/edit',[ClienteController::class,'edit']);
Route::put('/clients/{id}',[ClienteController::class,'update']);
Route::delete('/clients/{id}',[ClienteController::class,'destroy']);


//Categorias
Route::get('/categories',[CategoriaController::class, 'index']);
Route::get('/categories/show',[CategoriaController::class, 'show']);
Route::post('/categories',[CategoriaController::class, 'store']);
Route::get('categories/create', [CategoriaController::class, 'create']);
Route::get('categories/{id}/edit', [CategoriaController::class, 'edit'] );
Route::put('categories/{id}', [CategoriaController::class, 'update'] );
Route::delete('categories/{id}', [CategoriaController::class, 'destroy'] );




Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
