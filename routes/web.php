<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MedicoController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'tipo_usuario:3'])->group(function () {
    Route::get('/nutricionistas/create', [NutricionistaController::class, 'create'])->name('nutricionistas.create');
    Route::post('/nutricionistas', [NutricionistaController::class, 'store'])->name('nutricionistas.store');
    Route::delete('/nutricionistas/{nutricionista}', [NutricionistaController::class, 'destroy'])->name('nutricionistas.destroy');
    
});


require __DIR__.'/auth.php';
