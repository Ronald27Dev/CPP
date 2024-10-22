<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Todos Usuarios Cadastrados
                <div class="float-end">
                    <a href="/usuarios/adicionar-usuario" class="btn btn-success btn-sm">Novo Usuario</a>&nbsp;&nbsp;&nbsp;
                    <a href="/logout" class="btn btn-danger btn-sm">Sair</a>
                </div>
            </div>
            @if (Session::has('success'))
                <span class="alert alert-success p-2">{{Session::get('success')}}</span>
            @endif
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <table class="table table-sn table-striped table-bordered">
                    <thead>
                        <th>S/N</th>
                        <th>Nome Completo</th>
                        <th>E-mail</th>
                        <th>Telefone/Celular</th>
                        <th>Data do Registro</th>
                        <th>Data da ultima alteração</th>
                        <th colspan="2">Ação</th>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->phone_number}}</td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                    <td><a href="/usuarios/editar-usuario/{{$user->id}}" class="btn btn-primary btn-sm">Editar</a></td>
                                    <td><a href="/usuarios/deletar-usuario/{{$user->id}}" class="btn btn-danger btn-sm">Deletar</a></td>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const spans = document.querySelectorAll('span');
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
</body>
</html>