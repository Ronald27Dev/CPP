<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SchoolClassController extends Controller
{
    /**
     * View que lista as classes
     * 
     * @return view
     */
    public function listAll() {
        
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $classes = SchoolClass::all();

        return view('lista-classes', compact('classes'));
    }

    /**
     * Formulario para criação de uma turma
     * 
     * @var User $teacher
     * 
     * @return view
     */
    public function createClass() {
        
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $teachers = User::where('role', 2)->get();

        return view('cadastra-turma', compact('teachers'));
    }

    /**
     * Metodo que cria uma nova turma
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addClass(Request $request) {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $request->validate([
            'classname'     => '|required|unique:classes',
            'classroom'     => '|required|unique:classes',
            'teacher_id'    => '|required|exists:users,id',
        ]);

        try{
            SchoolClass::create([
                'classname'     => $request->classname,
                'classroom'     => $request->classroom,
                'teacher_id'    => $request->teacher_id,
            ]);
            return redirect('/turmas')->with('success', 'Turma criada com sucesso!');
        } catch ( Exception $e) {
        
            return redirect('/turmas/adicionar-turma')->with('fail', 'Erro ao criar turma ' . $e->getMessage());
        }
    }

    /**
     * Formulario para atualizar dados de turma
     * 
     * @param int $idturma
     * 
     * @return view
     */
    public function updateClassForm(int $idturma) {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        $turma = SchoolClass::where('id_class', $idturma)->get();

        return view('turma/atualiza-turma', compact('turma'));
    }

    /**
     * Metodo que atualiza dados turma
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateClass(Request $request) {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        $request->validate([
            'id_class'      => '|required|exists:classes,id_class',
            'classname'     => '|required|unique:classes',
            'classroom'     => '|required|unique:classes',
            'id_teacher'    => '|required|exists:users,id',
        ]);

        try{
            $turma = SchoolClass::where('id_class', $request->id_class)->update($request);
    
            return redirect('\turmas')->with('success', 'Os dados da turma foram atualizados!');
        } catch(Exception $e) {

            return redirect('/turmas/atualiza-turma')->with('fail', 'Erro ao atualizar dados ' . $e->getMessage());
        }
    }

    /**
     * Metodo que deleta turma
     * 
     * @param int $idturma
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteClass(int $idturma) {
        
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        $turma = SchoolClass::where('id_class', $idturma)->delete();

        return redirect('\turmas')->with('success', 'Turma deletada!');
    }
}
