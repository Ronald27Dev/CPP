<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Login</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/login.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

    <section>
        
        <div class="banner-background">
            <img src="/image/background-login3.png">
        </div>
        
        <div class="banner-image">
            <img src="/image/GFXHhagWcAAOCh3-removebg-preview.png" alt="CPP - Aluno modelo">
        </div>

        <div class="form-container">
            <img src="/image/Cpp.png" alt="Logo CPP" class="logo">
            <form action="{{route('login')}}" method="post">
                @csrf

                @if (Session::has('fail'))
                    <span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
                @endif
                @if (Session::has('success'))
                    <span class="alert alert-success p-2">{{Session::get('success')}}</span>
                @endif

                <div>
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>
                </div>
        
                <div>
                    <label for="senha">Senha:</label>
                    <input type="password" name="password" id="senha" required>
                </div>
                
                <div>
                    <label class="forgot">
                        <a href="/login/forgot" class="esqueceu_senha">Esqueceu a senha?</a>
                    </label>
                </div>

                <div>
                    <input type="submit" value="Entrar" class="butao">
                </div>

            </form>
        </div>      

        <footer>
            <p>Conecta Pais e Professores inc &copy; 2024 </p>
        </footer>

    </section>

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