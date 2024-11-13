<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    /**
     * Exibe o formulário para registrar a presença dos alunos.
     *
     * @return \Illuminate\View\View
     */
    public function showAttendanceForm()
    {
        // Exemplo: Obtém todos os alunos para registrar presença
        $students = Student::all();
        return view('attendance.register', compact('students'));
    }
    public function showRegisterForm()
    {
        // Retorna a view de registro de presença
        return view('attendance.register');
    }

    /**
     * Registra a presença de alunos.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function registerAttendance(Request $request)
    {
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
    public function showAttendanceList()
    {
        $attendances = Attendance::with('student')->whereDate('date', now()->format('Y-m-d'))->get();
        return view('attendance.list', compact('attendances'));  // referência correta da view
    }
    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id_student',  // Validação para garantir que o ID do estudante exista
            'status' => 'required|in:presente,ausente,justificado',
        ]);

        Attendance::create([
            'id_student' => $request->student_id,
            'date' => now()->format('Y-m-d'),
            'status' => $request->status,
        ]);

        return redirect()->route('attendance.register')->with('success', 'Presença registrada com sucesso!');
    }
}
