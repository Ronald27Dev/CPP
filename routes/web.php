<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', function() {
    if(Auth::check()){
        // $currentUser = Auth::user();
        return view('/public/index');
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/notas', function() {
    if(Auth::check()){
        // $currentUser = Auth::user();
        return view('/public/notas');
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/horario', function() {
    if(Auth::check()){
        // $currentUser = Auth::user();
        return view('/public/horario');
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/lista', function() {
    if(Auth::check()){
        return view('professor/informaPresenca');
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});



// Route::get('/', [UserController::class, 'listAll']);

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


/**
 * Rotas de registro de alunos
 */
Route::prefix('alunos')->group(function () {
    Route::get('/', [StudentController::class, 'listAll']);
    Route::get('/adicionar-aluno', [StudentController::class, 'formAddStudent']);
    Route::post('/adicionar-aluno', [StudentController::class, 'addStudent'])->name('adiciona-aluno');
    Route::get('/deletar-aluno/{idStudent}', [StudentController::class, 'deleteStudent']);
    Route::get('/editar-aluno/{idStudent}', [StudentController::class, 'formUpdateStudent']);
    Route::post('/editar-aluno', [StudentController::class, 'updateStudent'])->name('edita-aluno');
});
