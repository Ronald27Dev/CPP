<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Perfil</title>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">

    <style>
        .profile {
            display: none;
        }

        .profile.active {
            display: block;
        }

        header li{
            list-style: none;
        }

        header ul li a:link, header ul li a:visited {
            
            background-color: white;
            color: black;
            border: 2px solid rgb(1, 86, 160);
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
        }

        header ul li a:hover, header ul li a:active {
            background-color: rgb(1, 86, 160);
            color: white;
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
            <ul style="display: flex; justify-content: space-between;">
                <li><a href="javascript:void(0)" onclick="showProfile('aluno')">Aluno</a></li>&nbsp;
                <li><a href="javascript:void(0)" onclick="showProfile('professor')">Professor</a></li>
            </ul>
            <a href="#"><img src="/image/icons/bell.png"></a>
        </header>

                    <!-- ALUNOS -->
         
        <main id="aluno" class="profile"> 
            <div style="display: flex;">

                <div class="profile-foto">
                    <img src="/image/alunos/6°C/JC Retrô Gonzales.jpg" alt="Foto alun@">
                </div>
                
                <div class="profile-infos">
                    <h1>JC Retrô Gonzales</h1>
                    <p><span style="font-weight: 600;">6° Ano C</span></p>
                    <p style="text-align: justify;">Sempre vestido com um toque vintage dos anos 40, JC usa suspensórios, boina e gravata borboleta. Seu estilo é inconfundível e chamativo, e ele adora ouvir músicas antigas e dançar nas festas da escola.</p>
                    <p><img src="/image/icons/cake-birthday.png"> <span>03/03/2013</span></p>
                    <p><img src="/image/icons/whatsapp.png"> <span>(31) 93456-7890 - Pai</span></p>
                    <p><img src="/image/icons/whatsapp.png"> <span>(31) 94567-8901 - Mãe</span></p>
                    <p><img src="/image/icons/home.png"> <span>Bananil, Minas Gerais</span></p>
                </div>
            </div>

        </main>
        
                <!-- PROFESSOR -->
        <main id="professor" class="profile"> 
            <div style="display: flex;">

                <div class="profile-foto">
                    <img src="/image/professores/Raimundo Melado de Oliveira.jpg" alt="Foto professor">
                </div>
                
                <div class="profile-infos">
                    <h1>Raimundo Melado de Oliveira</h1>
                    <p><span style="font-weight: 600;">Matemática</span></p>
                    <p style="text-align: justify;">Raimundo Melado de Oliveira, mais conhecido como Professor Raimundo, é um educador de 65 anos, natural de Bananil, MG. Conhecido pela sabedoria e pelo jeito carismático, é o típico professor de matemática que todos respeitam e gostam. Com um humor afiado e uma paciência invejável, Raimundo tem o talento de tornar os conceitos mais complexos em algo simples e divertido para seus alunos.</p>
                    <p><img src="/image/icons/cake-birthday.png"> <span>06/05/1959</span></p>
                    <p><img src="/image/icons/whatsapp.png"> <span>(32) 98765-4321</span></p>
                    <p><img src="/image/icons/email.png"> <span>raimundo.prof@cpp.edu.br</span></p>
                    <p><img src="/image/icons/home.png"> <span>Anta Gorda, Minas Gerais</span></p>
                </div>
                
            </div>
        </main>

    </section>


    <script>
        function showProfile(profile) {
            document.getElementById('aluno').classList.remove('active');
            document.getElementById('professor').classList.remove('active');

            if (profile === 'aluno') {
                document.getElementById('aluno').classList.add('active');
            } else if (profile === 'professor') {
                document.getElementById('professor').classList.add('active');
            }
        }

        window.onload = function() {
            showProfile('aluno');
        };
    </script>
 
</body>
</html>