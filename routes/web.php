<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\AtividadeController;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('departamentos', DepartamentoController::class);
Route::resource('usuarios', UsuarioController::class);
Route::resource('categorias', CategoriaController::class);
Route::resource('atividades', AtividadeController::class);
