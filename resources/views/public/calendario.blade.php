<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConectaPaisProfessores</title>

    <link rel="stylesheet" href="/css/index.css">
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">

    
</head>
<body>
    <section>

        <aside>
            <img src="/image/graduation-cap.svg">
            <div class="aside-link-container">
                <a href="/"><img src="/image/icons/home.png"> <span>Início</span></a>
                <a href="/perfil"><img src="/image/icons/euser.png"><span>Perfil</span></a>
                <a href="/chatify"><img src="/image/icons/comment.png"> <span>Chat do Colégio</span></a>
                <a href="/classe"><img src="/image/icons/user.png"> <span>Classe</span></a>
                <a href="/calendario"><img src="/image/icons/calendar-day.png"> <span>Calendário</span></a>
                <a href="/notas"><img src="/image/icons/receipt.png"> <span>Notas</span></a>
                <a href="/frequencia"><img src="/image/icons/time-check.png"> <span>Frequência</span></a>
                <a href="/horario"><img src="/image/icons/clock.png"> <span>Horário</span></a>
                <a href="/logout"><img src="/image/icons/sign-out-alt.png"> <span>Sair</span></a>
            </div>
        </aside>

        <header>
            <h3>Bem vindo Moreno</h3>
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
                <a href="form-calendario.html">Postar</a>
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
                            <th>Ver</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Português</td>
                            <td>Prova</td>
                            <td>Avaliação</td>
                            <td><div>02/12/2024</div></td>
                            <td><img src="/image/icons/lupinha.png"></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Matemática</td>
                            <td>Apresentação de trabalho</td>
                            <td>Trabalho</td>
                            <td><div>03/12/2024</div></td>
                            <td><img src="/image/icons/lupinha.png"></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>História</td>
                            <td>Pintura em sala</td>
                            <td>Exercício em Classe</td>
                            <td><div>04/12/2024</div></td>
                            <td><img src="/image/icons/lupinha.png"></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Evento</td>
                            <td>Projeto Xerimbabo</td>
                            <td>Evento</td>
                            <td><div>05/12/2024</div></td>
                            <td><img src="/image/icons/lupinha.png"></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Evento</td>
                            <td>Dia do cabelo maluco</td>
                            <td>Evento</td>
                            <td><div>06/12/2024</div></td>
                            <td><img src="/image/icons/lupinha.png"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

    </section>

</body>
</html>