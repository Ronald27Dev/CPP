<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nota;
use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class NotaController extends Controller
{
    /**
     * Cria nova nota ao aluno
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addNote(Request $request) {

        $request->validate([
            'student_id' => 'required|exists:students,id_student',
            'school_class_id' => 'required|exists:classes,id_class',
            'portugues' => 'required|min:0|max:100',
            'matematica' => 'required|min:0|max:100',
            'historia' => 'required|min:0|max:100',
            'geografia' => 'required|min:0|max:100',
            'ciencias' => 'required|min:0|max:100',
            'artes' => 'required|min:0|max:100',
            'educacao_fisica' => 'required|min:0|max:100',
        ]);
        $nota = Nota::create($request->all());

        return redirect('/notas')->with('success', 'Notas cadastradas com sucesso!');
    }

    /**
     * Atualiza Registro de notas do aluno
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateNote(Request $request) {

        $request->validate([
            'student_id' => 'required|exists:students,id_student',
            'school_class_id' => 'required|exists:classes,id_class',
            'portugues' => 'required|min:0|max:100',
            'matematica' => 'required|min:0|max:100',
            'historia' => 'required|min:0|max:100',
            'geografia' => 'required|min:0|max:100',
            'ciencias' => 'required|min:0|max:100',
            'artes' => 'required|min:0|max:100',
            'educacao_fisica' => 'required|min:0|max:100',
        ]);

        $update_data = [
            'student_id' => $request->student_id,
            'school_class_id' => $request->school_class_id,
            'portugues' => $request->portugues,
            'matematica' => $request->matematica,
            'historia' => $request->historia,
            'geografia' => $request->geografia,
            'ciencias' => $request->ciencias,
            'artes' => $request->artes,
            'educacao_fisica' => $request->educacao_fisica,
        ];
        Nota::where('id', $request->id)->update($update_data);

        return redirect('/notas')->with('success', 'Registro das notas atualizadas com sucesso!');
    }

    /**
     * Delete registro de notas do aluno
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirctResponse
     */
    public function deleteNote($id) {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        else {
            Nota::where('id', $id)->delete();
    
            return redirect('/notas')->with('success', 'Registro de Notas do Aluno Excluida!');
        }
    }

    /**
     * View com a lista das notas do aluno
     * 
     * @return \Illuminate\View\View
     */
    public function listAll() {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        else {
            $notas = DB::table('grades')
                ->join('students', 'grades.student_id', 'students.id_student')
                ->join('classes', 'grades.school_class_id', 'classes.id_class')
                ->select('grades.*')
                ->get();

            $currentUser = Auth::user();

            return view('alunos/notas', compact('grades', 'currentUser'));
        }
    }

    /**
     * Formulario para cadastrar notas dos alunos
     * 
     * @return \Illuminate\View\View
     */
    public function formAddNote() {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        else {
            $students = Student::all();
            $classes = SchoolClass::all();
            // return view('', compact('students', 'classes'));
        }
    }

    /**
     * Formulario para atualizar cadastro de notas dos alunos
     */
    public function formUpdateNote($id) {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        else {
            $nota = Nota::where('id', $id)->first();

            // return view('', $nota);
        }
    }
}
