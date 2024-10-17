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
                    <form action="{{route('edita-usuario')}}" method="post">
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

                        <button type="submit" class="btn btn-primary">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    
</body>
</html>
