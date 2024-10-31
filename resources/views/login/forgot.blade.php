<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Esqueceu a Senha</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        @import url('https://fonts.googleapis.com/css?family=Mukta');
		body{
			font-family: 'Mukta', sans-serif;
			height:100vh;
			min-height:550px;
			background-image: url("https://images.pexels.com/photos/2387532/pexels-photo-2387532.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1");
			background-repeat: no-repeat;
			background-size:cover;
			background-position:center;
			position:relative;
			overflow-y: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
		}
		a{
			text-decoration:none;
			color:#444444;
		}

        .white-panel{
			background-color: rgba(255,255, 255, 1);
			height:400px;
			/* position:absolute;
			top:-50px;*/
			/* width:50%;  */
			right:calc(50% - 50px);
			transition:.3s ease-in-out;
			z-index:0;
			box-shadow: 0 0 15px 9px #00000096;
		}
        .login-show input[type="email"], .login-show input[type="password"]{
			width: 100%;
			display: block;
			margin:20px 0;
			padding: 15px;
			border: 1px solid #b5b5b5;
			outline: none;
		}
		.login-show button {
			max-width: 150px;
			width: 100%;
			background: #163a17;
			color: #f9f9f9;
			border: none;
			padding: 10px;
			text-transform: uppercase;
			border-radius: 2px;
			float:right;
			cursor:pointer;
		}
        .login-show{
            
			color:#242424;
			text-align:left;
			padding:50px;
		}
    </style>
</head>
<body>
    <div class="white-panel">
        <div class="login-show">
            <h2>Recuperar Senha</h2>
            <p>Enviaremos um email com o link de recuperação para o email informado.</p>
            <form action="{{ route('forgot') }}" method="POST">
                @csrf
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Digite seu email" required>
                @if ($errors->has('email'))
                    <div class="text-danger">{{ $errors->first('email') }}</div>
                @endif
                <button type="submit">Enviar email</button>
                <a href="{{ route('login') }}">Voltar</a>
            </form>
        </div>
        @if (Session::has('fail'))
            <span class="alert alert-danger p-2 text-center">{{ Session::get('fail') }}</span>
        @endif
        @if (Session::has('success'))
            <span class="alert alert-success p-2 text-center">{{ Session::get('success') }}</span>
        @endif
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