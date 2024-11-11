@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Presenças Registradas</h2>

    <table class="table">
        <thead>
            <tr>
                <th>Aluno</th>
                <th>Status</th>
                <th>Data</th>
            </tr>
        </thead>
        <tbody>
            @foreach($attendances as $attendance)
                <tr>
                    <td>{{ $attendance->student->name }}</td>
                    <td>{{ $attendance->status }}</td>
                    <td>{{ $attendance->date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
