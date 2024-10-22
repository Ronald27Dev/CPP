<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'listAll']);

//Rotas para configurações de usuarios (CRUD) 
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'listAll'])->name('usuarios');
    Route::get('/adicionar-usuario', [UserController::class, 'formAddUser']);
    Route::post('/adicionar-usuario', [UserController::class, 'addUser'])->name('adiciona-usuario');
    Route::get('/deletar-usuario/{iduser}', [UserController::class, 'deleteUser']);
    Route::get('/editar-usuario/{iduser}', [UserController::class, 'formUpdateUser']);
    Route::post('/editar-usuario', [UserController::class, 'updateUser'])->name('edita-usuario');
});

//Rotas de login
Route::prefix('login')->group(function () {
    Route::get('/', [AuthController::class, 'loginForm']);
    Route::post('/', [AuthController::class, 'loginAuth'])->name('login');
    Route::get('/forgot', [AuthController::class, 'forgotPasswordForm']);
    Route::post('/forgot', [AuthController::class, 'sendResetLink'])->middleware('guest')->name('forgot');
});
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('resetar-senha/{token}/{email}', [AuthController::class, 'showResetPasswordForm'])->name('password.reset');
// Rota para processar a redefinição de senha
Route::post('resetar-senha', [AuthController::class, 'updatePassword'])->name('password.update');
