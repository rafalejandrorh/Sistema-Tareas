<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tareascontroller;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;

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

Route::get('/', function () {
    return view('welcome');
});

//Registrar Usuario
Route::get('/register', function () {
    return view('auth.register');
});
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/register', [RegisterController::class, 'show']);

//Inicio de Sesión
Route::post('/login', [LoginController::class, 'login']);
Route::get('/login', [LoginController::class, 'show']);

//Cerrar Sesión
Route::get('/logout', [LogoutController::class, 'logout']);

//Rutas de Tareas
Route::get('/app', function(){
    return view('tareas.index');
})->name('app');
Route::get('/app', [tareascontroller::class, 'index'])->name('app');
Route::post('/app', [tareascontroller::class, 'store'])->name('app');
Route::get('/app/{id}', [tareascontroller::class, 'show'])->name('app-edit');
Route::patch('/app/{id}', [tareascontroller::class, 'update'])->name('app-update');
Route::delete('/app/{id}', [tareascontroller::class, 'destroy'])->name('app-destroy');


//Rutas de Categorias
Route::resource('categories', CategoriesController::class);