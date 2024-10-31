<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edita Usuarios</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Atualiza Cadastro Usuario
            </div>
            @if (Session::has('fail'))
                <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
            @endif
            <div class="card-body">
                <div class="mb3">
                    <form id="userForm" action="{{route('edita-usuario')}}" method="post">
                        @csrf 
                        <input type="hidden" name="user_id" value="{{$user->id}}">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome Completo</label>
                            <input type="text" name="full_name" class="form-control" id="name" value="{{$user->name}}" placeholder="Digite o Nome Completo">
                            
                            @error('full_name')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}" placeholder="Digite o e-mail">
                        
                            @error('email')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="phone-number" class="form-label">Telefone</label>
                            <input type="tel" name="phone_number" id="phone-number" class="form-control" value="{{$user->phone_number}}" placeholder="Digite o numero de telefone/celular">
                        
                            @error('phone_number')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Senha</label>
                            <input type="password" name="password" class="form-control" id="senha" placeholder="Digite a senha">
                        
                            @error('password')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="confirm-password" class="form-label">Confirma Senha</label>
                            <input type="password" name="password_confirmation" class="form-control" id="senha" placeholder="Digite a senha novamente">
                        
                            @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>    
                            @enderror
                        </div>

                        <button type="button" class="btn btn-primary" id="submitBtn">Atualizar</button>
                        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#returnModal">Cancelar</button> 
                    </form>
                </div>
            </div>
        </div>
    </div>   
    
    <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Você tem certeza que deseja cadastrar este usuário?
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
