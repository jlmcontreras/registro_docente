<?php

use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;

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


Route::get('/layouts/home', function () {
    return view('layouts.home');
})->middleware(['auth'])->name('home');




Route::get('docente/index', [DocenteController::class, 'index'])->name('docente.index')->middleware(['auth']);
Route::get('docente/create', [DocenteController::class,'create'])->name('docente.create')->middleware(['auth']);
Route::post('docente/store',[ DocenteController::class,'store'])->name('docente.store')->middleware(['auth']);
Route::get('docente/{id}/show', [DocenteController::class,'show'])->name('docente.show')->middleware(['auth']);
Route::delete('docente/{id}/destroy', [DocenteController::class,'destroy'])->name('docente.destroy')->middleware(['auth']);
Route::get('docente/{id}/confirm', [DocenteController::class,'confirm'])->name('docente.confirm')->middleware(['auth']);
Route::get('docente/{id}/edit', [DocenteController::class,'edit'])->name('docente.edit')->middleware(['auth']);
Route::put('docente/{id}/update', [DocenteController::class,'update'])->name('docente.update')->middleware(['auth']);


require __DIR__.'/auth.php';
