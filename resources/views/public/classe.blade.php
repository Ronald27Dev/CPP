<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Alunos</title>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .prof {
            background-color: #f9f9f9; /* Cor de fundo suave */
            padding: 20px;
            border-radius: 8px; /* Bordas arredondadas */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra suave */
            margin: 20px 0; /* Margem acima e abaixo */
            max-width: 400px; /* Limitar a largura para não ficar muito largo */
            margin-left: auto;
            margin-right: auto;
        }

        .prof p {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-align: center;
        }

        .prof select {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #fff;
            color: #333;
        }

        .prof select:focus {
            outline: none;
            border-color: #007bff; /* Cor de foco */
        }

        .prof button {
            width: 100%;
            padding: 12px;
            background-color: #007bff; /* Cor de fundo do botão */
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .prof button:hover {
            background-color: #0056b3; /* Cor mais escura quando passar o mouse */
        }

        .prof button:active {
            background-color: #004085; /* Cor ainda mais escura quando clicar */
        }

    </style>

</head>
<body>

    <section>

        <aside>
            <img src="/image/graduation-cap.svg">
            <div class="aside-link-container">
                <a href="/"><img src="/image/icons/home.png"><span>&nbsp;Início</span></a>
                <a href="/perfil"><img src="/image/icons/euser.png"><span>&nbsp;Perfil</span></a>
                <a href="/chatify"><img src="/image/icons/whatsapp.png"> <span>Chat do Colégio</span></a>
                <a href="/classe-alunos"><img src="/image/icons/student.png"> <span>Alunos</span></a>
                <a href="/professores"><img src="/image/icons/teacher.png"> <span>Professores</span></a>
                <a href="/calendario"><img src="/image/icons/calendar-day.png"> <span>Calendário</span></a>
                <a href="/notas"><img src="/image/icons/receipt.png"> <span>Notas</span></a>
                @if($user['role'] !== 3)<a href="/frequencia"><img src="/image/icons/time-check.png"> <span>Frequência</span></a>@endif
                <a href="/horario"><img src="/image/icons/clock.png"> <span>Horário</span></a>
                <a href="/logout"><img src="/image/icons/sign-out-alt.png"> <span>Sair</span></a>
                @if($user['role'] === 1)<a href="/usuarios"><img src="/image/icons/admin.png"> <span>Administração</span></a>@endif
            </div>
        </aside>

        <header>
            <h3>Bem vindo, {{$user['name']}}</h3>
            <a href="#"><img src="/image/icons/bell.png"></a>
        </header>

        <main class="professor profs profile2" id="carrossel">
            
            <!-- Seção para buscar os alunos -->
            <div class="prof">
                    
                <p>Selecione uma Turma</p>&nbsp;&nbsp;
                <select id="turma">
                    <option value="6°A">6°A</option>
                    <option value="6°B">6°B</option>
                    <option value="6°C">6°C</option>
                </select>&nbsp;&nbsp;
                <button onclick="buscarAlunos()">Buscar Alunos</button>
            </div>
            
            <button onclick="mudarCarrossel(-1)" class="prev">&#10094;</button>
            <button onclick="mudarCarrossel(1)" class="next">&#10095;</button>

            <!-- Carrossel de alunos (ou onde as informações serão inseridas) -->
            <div class="carousel-container" id="carouselInner">
                    
                <!-- Os alunos serão carregados aqui -->
            </div>
        </main>
        
    </section>

    <script src="/js/carrossel.js"></script>
</body>
</html>
