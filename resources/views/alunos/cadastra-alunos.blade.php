<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adiciona Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <br>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Adicionando Novo Aluno
            </div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <div class="mb3">
                    <form id="userForm" action="{{route('adiciona-aluno')}}" method="post" enctype="multipart/form-data">
                        @csrf 
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Completo do Aluno</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{old('full_name')}}" placeholder="Digite o Nome Completo">
                            
                            @error('name')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="birthdate" class="form-label">Selecione o Ano de Nascimento do Aluno</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required">
                            @error('birthdate')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="parent" class="form-label">Selecione o Responsavel</label>
                            <select class="form-select" name="parent_id" id="parent">
                                @foreach ($parents as $parent)
                                    <option value="{{$parent->id}}">{{$parent->name}}</option>           
                                @endforeach
                            </select>
                        
                            @error('parent_id')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="parent" class="form-label">Selecione a Turma</label>
                            <select class="form-select" name="id_class" id="class">
                                @foreach ($classes as $class)
                                    <option value="{{$class->id_class}}">{{$class->classname}}</option>           
                                @endforeach
                            </select>
                        
                            @error('id_class')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto do Aluno</label>
                            <input type="file" class="form-control" name="image" id="image" accept="image/*">
                        
                            @error('image')
                                <span class="text-danger">{{$message}}</span>
                            @enderror
                        </div>
                        <button type="button" class="btn btn-primary" id="submitBtn">Cadastrar</button>&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#returnModal">Cancelar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja atualizar este usuário?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="confirmSubmit">Confirmar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Return Modal -->
    <div class="modal fade" id="returnModal" tabindex="-1" aria-labelledby="returnModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="returnModalLabel">Cancelar Cadastro</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Tem certeza que deseja cancelar o cadastro? Todas as informações serão perdidas.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Não</button>
                    <a href="{{ route('usuarios') }}" class="btn btn-danger">Sim</a>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const submitBtn = document.getElementById('submitBtn');
            const confirmSubmit = document.getElementById('confirmSubmit');

            submitBtn.addEventListener('click', function() {
                const confirmModal = new bootstrap.Modal(document.getElementById('confirmModal'));
                confirmModal.show();
            });

            confirmSubmit.addEventListener('click', function() {
                document.getElementById('userForm').submit();
            });
        });
    </script>
</body>
</html>
