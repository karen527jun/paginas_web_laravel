<?php

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

Route::get('/', function () {
    return view('home',['nombre'=>'Karen', 'Apellido'=>'Martinez']);
});

//Productos
// Ruta para mostrar la vista show.blade.php
Route::get('/products/show', function () {
    return view('products/show', ['producto'=>'Camisa Sport']);
});
// Ruta para mostrar la vista create.blade.php
Route::get('/products/create', function () {
    return view('products/create');
});
// Ruta para mostrar la vista update.blade.php
Route::get('/products/edit', function () {
    return view('products/update');
});

//Clientes

Route::get('/clients/show', function(){
    return view('clients/show');
});
Route::get('/clients/create', function(){
    return view('clients/create');
});
Route::get('/clients/edit', function(){
    return view('clients/update');
});

//Categorias
Route::get('categories/show', function(){
    return view('categories/show');
});
Route::get('categories/create', function(){
    return view('categories/create');
});
Route::get('categories/edit', function(){
    return view('categories/update');
});
