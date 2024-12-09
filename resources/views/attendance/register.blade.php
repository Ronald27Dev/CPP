<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Presença</title>
</head>
<body>
    <h1>Registro de Presença</h1>
    <form action="{{ route('attendance.store') }}" method="POST">
        @csrf
        <!-- Adicione aqui os campos necessários para registrar a presença -->
        <label for="student_id">ID do Estudante:</label>
        <input type="text" id="student_id" name="student_id" required>

        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="presente">Presente</option>
            <option value="ausente">Ausente</option>
            <option value="justificado">Justificado</option>
        </select>

        <button type="submit">Registrar Presença</button>
    </form>
</body>
</html>
