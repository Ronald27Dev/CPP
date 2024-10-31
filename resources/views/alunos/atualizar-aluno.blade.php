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
                Atualiza Registro Aluno
            </div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <div class="mb3">
                    <form id="userForm" action="{{ route('edita-aluno') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id_student" value="{{ $student->id_student }}">
                
                        <div class="form-group mb-3">
                            <label for="name">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $student->name) }}" required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="birthdate">Data de Nascimento</label>
                            <input type="date" name="birthdate" id="birthdate" class="form-control" value="{{old('birthdate', $student->birthdate)}}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="parent_id">Responsavel</label>
                            <select class="form-control" id="parent_id" name="parent_id" required>
                                <!-- Populate parents dynamically -->
                                @foreach ($parents as $parent)
                                    <option value="{{ $parent->id }}" {{ $student->parent_id == $parent->id ? 'selected' : '' }}>
                                        {{ $parent->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                
                        <div class="form-group mb-3">
                            <label for="class_id">Turma</label>
                            <select class="form-control" id="id_class" name="id_class" required>
                                <!-- Populate classes dynamically -->
                                @foreach ($classes as $class)
                                    <option value="{{ $class->id_class }}" {{ $student->id_class == $class->id_class ? 'selected' : '' }}>
                                        {{ $class->classname }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                
                        <button type="button" class="btn btn-primary" id="submitBtn">Atualizar Aluno</button>
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
                    Você tem certeza que deseja atualizar este registro?
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
                    <a href="/alunos" class="btn btn-danger">Sim</a>
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
