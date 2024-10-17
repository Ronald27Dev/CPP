<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/usuarios', [UserController::class, 'listAll']);

Route::get('/usuarios/adicionar-usuario', [UserController::class, 'formAddUser']);
Route::post('/usuarios/adicionar-usuario', [UserController::class, 'addUser'])->name('adiciona-usuario');

Route::get('/usuarios/deletar-usuario/{iduser}', [UserController::class, 'deleteUser']);

Route::get('/usuarios/editar-usuario/{iduser}', [UserController::class, 'formUpdateUser']);
Route::post('/usuarios/editar-usuario', [UserController::class, 'updateUser'])->name('edita-usuario');