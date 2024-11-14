<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Calendario</title>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">

    
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
            <h3>Bem vindo , {{$user['name']}}</h3>
            <a href="#"><img src="/image/icons/bell.png"></a>
        </header>

        <main class="calendario">

            <article>
                <div>
                    <h1>Tipos</h1>
                    <div>
                        <p>Todas</p>
                        <p>Disciplinas</p>
                        <p>Eventos</p>
                    </div>
                </div>
            </article>

            <div class="titulo-calendario">
                
                <h1>Calendário Escolar</h1>
                
            </div>
                
            <!-- PROF -->
            <div class="titulo-calendario prof">
                <label for="turma">Turma:
                    <select name="turma" id="turma">
                        <option value="6°A">6°A</option>
                        <option value="6°B">6°B</option>
                        <option value="6°C">6°C</option>
                    </select>
                </label>
                @if($user['role'] !== 3 )
                    <a href="/form-calendario">Postar</a>
                @endif
            </div>

            <div class="posts">

                <table>
                    <thead>
                        <tr>
                            <th></th>
                            <th>Disciplinas</th>
                            <th>Descrição</th>
                            <th>Tipo</th>
                            <th>Data</th>
                            @if($user['role'] !== 3 )<th>Ver</th>@endif
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Português</td>
                            <td>Prova</td>
                            <td>Avaliação</td>
                            <td><div>02/12/2024</div></td>
                            @if($user['role'] !== 3 )<td><img src="/image/icons/lupinha.png"></td>@endif
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Matemática</td>
                            <td>Apresentação de trabalho</td>
                            <td>Trabalho</td>
                            <td><div>03/12/2024</div></td>
                            @if($user['role'] !== 3 )<td><img src="/image/icons/lupinha.png"></td>@endif
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>História</td>
                            <td>Pintura em sala</td>
                            <td>Exercício em Classe</td>
                            <td><div>04/12/2024</div></td>
                            @if($user['role'] !== 3 )<td><img src="/image/icons/lupinha.png"></td>@endif
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Evento</td>
                            <td>Projeto Xerimbabo</td>
                            <td>Evento</td>
                            <td><div>05/12/2024</div></td>
                            @if($user['role'] !== 3 )<td><img src="/image/icons/lupinha.png"></td>@endif
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Evento</td>
                            <td>Dia do cabelo maluco</td>
                            <td>Evento</td>
                            <td><div>06/12/2024</div></td>
                            @if($user['role'] !== 3 )<td><img src="/image/icons/lupinha.png"></td>@endif
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

    </section>

</body>
</html>