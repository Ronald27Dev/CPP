<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AttendanceController;


include("public.php");

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

// Exibe o formulário para registrar a presença
Route::get('/attendance/register', [AttendanceController::class, 'showRegisterForm'])->name('attendance.register');

// Registra as presenças no banco de dados
Route::post('/attendance/register', [AttendanceController::class, 'registerAttendance']);

// Exibe a lista de presenças registradas
Route::get('/attendance/list', [AttendanceController::class, 'showAttendanceList'])->name('attendance.list');

Route::post('/attendance/store', [AttendanceController::class, 'store'])->name('attendance.store');

