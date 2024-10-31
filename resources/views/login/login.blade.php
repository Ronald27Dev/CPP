<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>

    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
		}
		a{
			text-decoration:none;
			color:#444444;
		}
		.login-reg-panel{
			position: relative;
			top: 50%;
			transform: translateY(-50%);
			text-align:center;
			width:70%;
			right:0;left:0;
			margin:auto;
			height:44%;
			background-color: rgba(20, 175, 236, 1);
		}
		.white-panel{
			background-color: rgba(255,255, 255, 1);
			height:130%;
			position:absolute;
			top:-15%;
			width:50%;
			right:calc(50% - 50px);
			transition:.3s ease-in-out;
			z-index:0;
			box-shadow: 0 0 15px 9px #00000096;
		}
		.login-reg-panel input[type="radio"]{
			position:relative;
			display:none;
		}
		.login-reg-panel{
			color:#B8B8B8;
		}
		.login-reg-panel #label-login, 
		.login-reg-panel #label-register{
			border:1px solid #9E9E9E;
			padding:5px 5px;
			width:150px;
			display:block;
			text-align:center;
			border-radius:10px;
			cursor:pointer;
			font-weight: 600;
			font-size: 18px;
		}
		.login-info-box{
			width:30%;
			padding:0 50px;
			top:20%;
			left:0;
			position:absolute;
			text-align:left;
		}
		.register-info-box{
			width:30%;
			padding:0 50px;
			top:20%;
			right:0;
			position:absolute;
			text-align:left;
			color: #f9f9f9;
			
		}
		.right-log{right:50px !important;}

		.login-show, 
		.register-show{
			z-index: 1;
			display:none;
			opacity:0;
			transition:0.3s ease-in-out;
			color:#242424;
			text-align:left;
			padding:50px;
		}
		.show-log-panel{
			display:block;
			opacity:0.9;
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
			background: #444444;
			color: #f9f9f9;
			border: none;
			padding: 10px;
			text-transform: uppercase;
			border-radius: 2px;
			float:right;
			cursor:pointer;
		}
		.login-show a{
			display:inline-block;
			padding:10px 0;
		}
		a{
		text-decoration:none;
		color:#2c7715;
		}

		@media(max-width: 768px){
			body {
				background-image: none; /* Change background for mobile, if desired */
				background-color: #f0f0f0; /* Light background for better readability */
			}

			.login-reg-panel {
				width: 90%;
				padding: 15px; Reduce padding 
				display: hidden;
			}

			.white-panel {
				padding: 15px; /* Adjust padding */
				right:calc(5%);
				width: 90%;
			}

			.login-show input[type="email"],
			.login-show input[type="password"],
			.login-show button {
				width: 100%; /* Full width */
				margin: 10px 0; /* Adjust margin */
				padding: 12px; /* Adjust padding */
			}

			.register-info-box {
				display: none; /* Hide registration info on mobile */
			}
		}
	</style>
</head>

<body>

<div class="login-reg-panel">
							
		<div class="register-info-box">
			<h2>Não possui acesso?</h2>
			<p>Entre em contato com o nosso colegio</p>
		</div>
							
		<div class="white-panel">
			<div class="login-show">
				<h2>LOGIN</h2>
				<form action="{{route('login')}}" method="post">
					@csrf
					<input type="email" name="email" placeholder="Email">
					<input type="password" name="password" placeholder="Password">
					<button type="submit">Login</button>
					<a href="/login/forgot">Esqueceu senha?</a>
				</form>
			</div>
			@if (Session::has('fail'))
				<span class="alert alert-danger p-2">{{Session::get('fail')}}</span>
			@endif
			@if (Session::has('success'))
				<span class="alert alert-success p-2">{{Session::get('success')}}</span>
			@endif
		</div>
	</div>

	<script>

		$(document).ready(function(){
			$('.login-info-box').fadeOut();
			$('.login-show').addClass('show-log-panel');
		});


		$('.login-reg-panel input[type="radio"]').on('change', function() {
			if($('#log-login-show').is(':checked')) {
				$('.register-info-box').fadeOut();
				$('.login-info-box').fadeIn();
				
				$('.white-panel').addClass('right-log');
				$('.register-show').addClass('show-log-panel');
				$('.login-show').removeClass('show-log-panel');
				
			}
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