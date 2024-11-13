<?php

/**
 * Rotas para todas as views publicas do projeto
 */


Route::get('/', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/index', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/notas', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/notas', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/horario', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/horario', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/calendario', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/calendario', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/form-calendario', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/form-calendario', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/perfil', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/perfil', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/classe-alunos', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/classe', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/professores', function() {
    if(Auth::check()){
        $user = Auth::user();
        return view('/public/professores', compact('user'));
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/frequencia', function() {
    if(Auth::check()){
        $user = Auth::user();
        if($user['role'] !== 3) {
            return view('/public/frequencia', compact('user'));
        } else {
            return redirect('/');
        }
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

Route::get('/lista', function() {
    if(Auth::check()){
        return view('professor/informaPresenca');
    } else 
        return redirect('/login')->with('fail', 'Você não esta logado');
});

