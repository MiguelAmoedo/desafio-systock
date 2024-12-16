<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//localhost:8000/api/:
// Listar todos os produtos cadastrados.
Route::get('/user', [UserController::class, 'index']);
// Cadastrar produtos.
Route::get('/user/{id}', [UserController::class, 'show']);
// Cadastrar produtos.
Route::post('/user', [UserController::class, 'store']);
// Cadastrar Categorias.
Route::put('/user/{id}', [UserController::class, 'update']);
// Deletar produtos cadastrados.
Route::delete('/user/{id}', [UserController::class, 'destroy']);



