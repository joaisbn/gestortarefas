<?php

use App\Http\Controllers\Main;
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
    echo 'Gestor de tarefas';
});

// Route::get('/main', [Main::class, 'index']);

Route::get('/main', [
    Main::class, 'index'
]);
