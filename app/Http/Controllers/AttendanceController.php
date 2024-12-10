<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Exibe o formulário para registrar a presença dos alunos.
     *
     * @return \Illuminate\View\View
     */
    public function showAttendanceForm() {

        // Exemplo: Obtém todos os alunos para registrar presença
        $students = DB::table('students')
            ->join('classes', 'students.id_student', '=', 'classes.id_students')
            ->select('students.*', 'classes.classname as turma')
            ->get()
        ;
        return view('attendance.register', compact('students'));
    }

    public function showRegisterForm() {

        $user = Auth::user();
        // dd($currentUser->id);
        $result = DB::table('classes')
            ->join('students', 'classes.id_class', '=', 'students.id_class')
            ->join('users as teacher', 'teacher.id', '=', 'classes.id_teacher')
            ->where('classes.id_teacher', '=', "$user->id")
            ->select('students.*', 'teacher.name as professsor', 'classes.classname as turma')
            ->get()
            ;
        // dd($result);
        // Retorna a view de registro de presença
        return view('attendance.register', compact('result', 'user'));
    }

    /**
     * Registra a presença de alunos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerAttendance(Request $request) {
        $request->validate([
            'students' => 'required|array', // Alunos selecionados
            'students.*' => 'required|in:presente,ausente,justificado', // Status de presença
        ]);

        foreach ($request->students as $studentId => $status) {
            Attendance::create([
                'student_id' => $studentId,
                'date' => now()->format('Y-m-d'),
                'status' => $status,
            ]);
        }

        return redirect()->route('attendance.form')->with('success', 'Presença registrada com sucesso!');
    }

    /**
     * Exibe as presenças registradas.
     *
     * @return \Illuminate\View\View
     */
    public function showAttendanceList() {

        $currentUser    = Auth::user();

        $attendances = DB::table('attendances')
            ->join('students', 'students.id_student', '=', 'attendances.id_student')
            ->join('classes', 'classes.id_class', '=', 'students.id_class')
            ->join('users as teacher', 'teacher.id', '=', 'classes.id_teacher')
            ->select('students.*', 'classes.classname', 'attendances.status', 'attendances.date as dia', 'teacher.name as professor')
            ->get()
        ;
        return view('attendance.list', compact('attendances', 'currentUser'));    
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id_student',  // Validação para garantir que o ID do estudante exista
            'status' => 'required|in:presente,ausente,justificado',
        ]);

        Attendance::create([
            'id_student'    => $request->student_id,
            'date'          => now()->format('Y-m-d'),
            'status'        => $request->status,
        ]);

        return redirect()->route('attendance.register')->with('success', 'Presença registrada com sucesso!');
    }
}
