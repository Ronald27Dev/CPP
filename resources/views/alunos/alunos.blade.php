<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alunos</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CPP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Inicio <span class="sr-only">(Atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/chatify">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/alunos">Alunos</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <span class="navbar-text text-white">{{$currentUser->name}}</span>&nbsp;&nbsp;&nbsp;
                    <div class="btn-group float-end">
                        <a href="/logout" class="btn btn-danger btn-sm">Sair</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <br><br>
    
    <div class="container">
        <div class="card">
            <div class="card-header">
                Todos Alunos Cadastrados
                <div class="float-end">
                    <a href="/alunos/adicionar-aluno" class="btn btn-success btn-sm">Novo Aluno</a>
                </div>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sn table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Nome Completo</th>
                                <th>Professor</th>
                                <th>Turma</th>
                                <th>Responsavel</th>
                                <th>Ano de Nascimento</th>
                                <th colspan="2">Ação</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (count($students) > 0)
                                @foreach ($students as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->teacherName}}</td>
                                        <td>{{$user->classname}}</td>
                                        <td>{{$user->parentName}}</td>
                                        <td>{{$user->birthdate}}</td>
                                        <td><a href="/alunos/editar-aluno/{{$user->id_student}}" class="btn btn-primary btn-sm">Editar</a></td>
                                        <td><a href="/alunos/deletar-aluno/{{$user->id_student}}" class="btn btn-danger btn-sm">Deletar</a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="8">Nenhum Usuario Cadastrado</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const spans = document.querySelectorAll('.alert');
            spans.forEach(span => {
                if (span) {
                    setTimeout(() => {
                        span.classList.add('fade-out');
                        setTimeout(() => {
                            span.style.display = 'none';
                        }, 500);
                    }, 3000);
                }
            });
        });
   </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>