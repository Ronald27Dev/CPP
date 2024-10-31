<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StudentController extends Controller
{
    /**
     * Cria novo usuario
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addStudent(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'birthdate'  => 'required|date',
            'parent_id' => 'required|exists:users,id', 
            'id_class'  => 'required|exists:classes,id_class',
        ]);
        $student = Student::create($request->all());

        return redirect('/alunos')->with('success', 'Aluno cadastrado com sucesso!');
    }

    /**
     * Atualiza Registro de aluno
     * 
     * @param \Illuminate\Http\Request
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateStudent(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'birthdate' => 'required|date',
            'parent_id' => 'required|exists:users,id', 
            'id_class'  => 'required|exists:classes,id_class',
        ]);
        
        $update_data = [
            'name'      => $request->name,
            'birthdate' => $request->birthdate,
            'parent_id' => $request->parent_id,
            'id_class'  => $request->id_class,
        ];
        Student::where('id_student', $request->id_student)->update($update_data);

        return redirect('/alunos')->with('success', 'Registro do aluno atualizado com sucesso!');
    }

    /**
     * Delete registro de aluno
     * 
     * @param int $id
     * 
     * @return \Illuminate\Http\RedirctResponse
     */
    public function deleteStudent($id)
    {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        
        Student::where('id_student', $id)->delete();

        return redirect('/alunos')->with('success', 'Registro de Aluno Excluido!');
    }


    /**
     * View com a lista de Alunos
     * 
     * @return view
     */
    public function listAll() {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        else {
            $students = DB::table('students')
                ->join('classes', 'students.id_class', '=', 'classes.id_class')
                ->join('users as teacher', 'classes.id_teacher', '=', 'teacher.id')
                ->join('users as parents', 'parents.id', '=', 'students.parent_id')
                ->select('students.*', 'classes.classname', 'parents.name as parentName', 'teacher.name as teacherName', 'classes.classname')
                ->get();

            $currentUser = Auth::user();

            return view('alunos/alunos', compact('students', 'currentUser'));
        }
    }

    /**
     * Formulario para cadastrar usuarios
     * 
     * @return view
     */
    public function formAddStudent() {
        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');
        else {
            $parents = User::where('role' , 3)->get();
            $classes = SchoolClass::all();
            // dd($classes);
            return view('alunos/cadastra-alunos', compact('parents', 'classes'));
        }
    }

    /**
     * Formulario para atualizar cadastro Alunos
     */
    public function formUpdateStudent ($id_student) {

        if(!Auth::check()) return redirect('/login')->with('fail', 'É preciso estar logado!');

        $student = Student::where('id_student', $id_student)->first();
        // dd($student);
        $parents = User::where('role' , 3)->get();
        $classes = SchoolClass::all();

        return view('alunos/atualizar-aluno', compact('student', 'parents', 'classes'));
    }
}
