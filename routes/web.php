<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class, 'listAll']);

/**
 * Rotas para configurações de usuarios (CRUD)
 */
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UserController::class, 'listAll']);
    Route::get('/adicionar-usuario', [UserController::class, 'formAddUser']);
    Route::post('/adicionar-usuario', [UserController::class, 'addUser'])->name('adiciona-usuario');
    Route::delete('/deletar-usuario/{iduser}', [UserController::class, 'deleteUser']);
    Route::get('/editar-usuario/{iduser}', [UserController::class, 'formUpdateUser']);
    Route::post('/editar-usuario', [UserController::class, 'updateUser'])->name('edita-usuario');
});

//Rotas de login
Route::get('/login', [UserController::class, 'loginForm']);
Route::post('/login', [UserController::class, 'loginAuth'])->name('login');
// Rota para exibir o formulário de redefinição de senha
Route::get('resetar-senha/{token}/{email}', [UserController::class, 'showResetPasswordForm'])->name('password.reset');

// Rota para processar a redefinição de senha
Route::post('resetar-senha', [UserController::class, 'updatePassword'])->name('password.update');


Route::get('/login/forgot', [UserController::class, 'forgotPasswordForm']);
Route::post('/login/forgot', [UserController::class, 'sendResetLink'])->middleware('guest')->name('forgot');

Route::get('/logout', [UserController::class, 'logout']);
