<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Notas</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/index.css">

    <!-- Favicon -->
    <link rel="shortcut icon" href="/image/graduation-cap.svg" type="image/x-icon">
    
    <style>
        .profile2 {
            display: none;
        }

        .profile2.active {
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
                @if($user['role'] !== 2)<a href="/frequencia"><img src="/image/icons/time-check.png"> <span>Frequência</span></a>@endif
                <a href="/horario"><img src="/image/icons/clock.png"> <span>Horário</span></a>
                <a href="/logout"><img src="/image/icons/sign-out-alt.png"> <span>Sair</span></a>
                @if($user['role'] === 1)<a href="/usuarios"><img src="/image/icons/admin.png"> <span>Administração</span></a>@endif
            </div>
        </aside>

        <header>
            <h1>Bem vindo {{$user['name']}}</h1>
            @if($user['role'] === 1)
                <ul style="display: flex; justify-content: space-between;">
                    <li><a href="javascript:void(0)" onclick="showProfile('aluno')">Aluno</a></li>&nbsp;
                    <li><a href="javascript:void(0)" onclick="showProfile('professor')">Professor</a></li>
                </ul>
            @endif
            <a href="#"><img src="/image/icons/bell.png"></a>
        </header>
        
        @if($user['role'] === 3)
                <!-- ALUNO -->
            <main class="container_notas">
                <div class="notas">
                    <table>
                        <caption>Quadro de Faltas e Notas</caption>
                        
                        <thead>
                            <tr>
                                <th>Disciplinas</th>
                                <th>Faltas</th>
                                <th>Total da Nota</th>
                                <th>Média da turma</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Educação Física</div></td>
                                <td>0</td>
                                <td>8.5</td>
                                <td>10</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Língua Portuguesa</div></td>
                                <td>0</td>
                                <td>5</td>
                                <td>2</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Matemática</div></td>
                                <td>0</td>
                                <td>7</td>
                                <td>7</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">História</div></td>
                                <td>0</td>
                                <td>6</td>
                                <td>5.5</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Ciências</div></td>
                                <td>0</td>
                                <td>6</td>
                                <td>5.5</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Geografia</div></td>
                                <td>0</td>
                                <td>6</td>
                                <td>5.5</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Artes</div></td>
                                <td>0</td>
                                <td>3</td>
                                <td>5.5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        @elseif($user['role'] === 2)
                <!-- PROFESSOR -->
            <main class="form-frequencia">
                <form action="">

                    <div class="titulo-frequencia">
                        <h3>Pontuação</h3>
                        <h3>Raimundo</h3>
                        <h3>Prova - 10 pts</h3>
                    </div>

                    <div class="turma">
                        <label class="titulo-label">Turma</label>
                        <input type="radio" name="turma" id="6A" value="6A">
                        <label for="6A">6°A</label>
                        <input type="radio" name="turma" id="6B" value="6B">
                        <label for="6B">6°B</label>
                        <input type="radio" name="turma" id="6C" value="6C">
                        <label for="6C">6°C</label>
                    </div>

                    <div class="alunos">
                        <h2>Classe 6°A</h2>
                        <table class="tabela-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Aluno</th>
                                    <th>Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ana Souza</td>
                                    <td><input type="number" name="notas1" min="0"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Carlos Lima</td>
                                    <td><input type="number" name="notas2" min="0"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Fernanda Oliveira</td>
                                    <td><input type="number" name="notas3" min="0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="butao">
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Refazer">
                    </div>
                    
                </form>
            </main>
        @else 
                <!--ADMIN -->  
            <main id="professor" class="form-frequencia profile2" style="border: 0px !important; background-color:white;">
                &nbsp;
                <form action="">
                    <div class="titulo-frequencia">
                        <h3>Pontuação</h3>
                        <h3>Raimundo</h3>
                        <h3>Prova - 10 pts</h3>
                    </div>

                    <div class="turma">
                        <label class="titulo-label">Turma</label>
                        <input type="radio" name="turma" id="6A" value="6A">
                        <label for="6A">6°A</label>
                        <input type="radio" name="turma" id="6B" value="6B">
                        <label for="6B">6°B</label>
                        <input type="radio" name="turma" id="6C" value="6C">
                        <label for="6C">6°C</label>
                    </div>

                    <div class="alunos">
                        <h2>Classe 6°A</h2>
                        <table class="tabela-infos">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nome do Aluno</th>
                                    <th>Pontos</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Ana Souza</td>
                                    <td><input type="number" name="notas1" min="0"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Carlos Lima</td>
                                    <td><input type="number" name="notas2" min="0"></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Fernanda Oliveira</td>
                                    <td><input type="number" name="notas3" min="0"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="butao">
                        <input type="submit" value="Enviar">
                        <input type="reset" value="Refazer">
                    </div>
                    
                </form>
            </main>
            <main id="aluno" class="container_notas profile2">
                <div class="notas">
                    <table>
                        <caption>Quadro de Faltas e Notas</caption>
                        
                        <thead>
                            <tr>
                                <th>Disciplinas</th>
                                <th>Faltas</th>
                                <th>Total da Nota</th>
                                <th>Média da turma</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Educação Física</div></td>
                                <td>0</td>
                                <td>8.5</td>
                                <td>10</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Língua Portuguesa</div></td>
                                <td>0</td>
                                <td>5</td>
                                <td>2</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Matemática</div></td>
                                <td>0</td>
                                <td>7</td>
                                <td>7</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">História</div></td>
                                <td>0</td>
                                <td>6</td>
                                <td>5.5</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Ciências</div></td>
                                <td>0</td>
                                <td>6</td>
                                <td>5.5</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Geografia</div></td>
                                <td>0</td>
                                <td>6</td>
                                <td>5.5</td>
                            </tr>
                            
                            <tr>
                                <td><div><img src="/image/icons/lupinha.png">Artes</div></td>
                                <td>0</td>
                                <td>3</td>
                                <td>5.5</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>
        @endif
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