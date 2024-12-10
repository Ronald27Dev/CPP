<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Professores</title>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
            <h1>Professores</h1>

            <button onclick="mudarCarrossel(-1)" class="prev">&#10094;</button>
            <button onclick="mudarCarrossel(1)" class="next">&#10095;</button>

            <div class="carousel-container" id="carouselInner">

                <div class="container-profile">

                    <div class="img-container">
                        <img src="/image/professores/Tibúrcia Pé-de-moleque Costa.jpg" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Tibúrcia Pé-de-moleque Costa</h4>
                        <p>Ela/Dela | 46 anos | Passa Quatro, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h5>
                        <p><img src="/image/icons/phone.png">(31) 94567-1234<br>
                        <img src="/image/icons/email.png">tiburcia.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>Geografia</h2>
                    </div>

    
                </div>
                
                <div class="container-profile">
    
                    <div class="img-container">
                        <img src="/image/professores/Tonico Goiabinha Almeida.jpg" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Tonico Goiabinha Almeida</h4>
                        <p>Ele/Dele | 42 anos | Sem-Peixe, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h5>
                        <p><img src="/image/icons/phone.png">(31) 91234-5678 <br>
                        <img src="/image/icons/email.png">tonico.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>Artes</h2>
                    </div>
    
                </div>
    
                <div class="container-profile">
    
                    <div class="img-container">
                        <img src="/image/professores/Joventino Pão-duro da Silvaaa.png" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Joventino Mito da Silva</h4>
                        <p>Ele/Dele | 49 anos | Buritizeiro, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h5>
                        <p><img src="/image/icons/phone.png">(31) 93456-7890<br>
                        <img src="/image/icons/email.png">joventino.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>História</h2>
                    </div>
    
                </div>

                <div class="container-profile">
    
                    <div class="img-container">
                        <img src="/image/professores/Raimundo Melado de Oliveira.jpg" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Raimundo Melado de Oliveira</h4>
                        <p>Ele/Dele | 65 anos | Anta Gorda, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h5>
                        <p><img src="/image/icons/phone.png">(31) 98765-4321<br>
                        <img src="/image/icons/email.png">raimundo.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>Matemática</h2>
                    </div>
    
                </div>
    
                <div class="container-profile">
    
                    <div class="img-container">
                        <img src="/image/professores/Donária Bananada de Souza.jpg" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Donária Bananada de Souza</h4>
                        <p>Ela/Dela | 44 anos | Cabeceira Grande, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h5>
                        <p><img src="/image/icons/phone.png">(31) 91234-5678<br>
                        <img src="/image/icons/email.png">donaria.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>Ciências</h2>
                    </div>
    
                </div>
    
                <div class="container-profile">
    
                    <div class="img-container">
                        <img src="/image/professores/Gilmar Pamonha dos Santos.jpg" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Gilmar Pamonha dos Santos</h4>
                        <p>Ele/Dele | 59 anos | Formoso, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h5>
                        <p><img src="/image/icons/phone.png">(31) 92345-6789<br>
                        <img src="/image/icons/email.png">gilmar.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>Educação Física</h2>
                    </div>
    
                </div>
    
                <div class="container-profile">
    
                    <div class="img-container">
                        <img src="/image/professores/Perpétua Bolachinha Carneiro.jpg" alt="Foto de perfil Professores">
                    </div>
    
                    <div class="desc-prof">
                        <h4>Perpétua Bolachinha Carneiro</h4>
                        <p>Ela/Dela | 52 anos | Pintópolis, MG</p>
                    </div>
    
                    <div>
                        <h4>Contato</h4>
                        <p><img src="/image/icons/phone.png">(31) 96789-1234<br>
                        <img src="/image/icons/email.png">perpetua.prof@cpp.edu.br</p>
                    </div>
    
                    <div class="disciplina">
                        <h2>Língua Portuguesa</h2>
                    </div>
    
                </div>
            </div>

        </main>
        
    </section>
    <script src="/js/carrossel-professores.js"></script>

</body>
</html>
