<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ConectaPaisProfessores</title>

    <!-- CSS -->
    <link rel="stylesheet" href="/css/index.css">

    <!-- Favicon -->
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

        <!-- PROFESSOR -->
        <main class="form-frequencia">
            <form action="">

                <div class="titulo-frequencia">
                    <h3>Lista de Presença</h3>
                    <h3>Raimundo</h3>
                    <span id="dataHj"></span>
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
                                <th>Presente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Ana Souza</td>
                                <td><input type="checkbox" name="presenca1"></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Carlos Lima</td>
                                <td><input type="checkbox" name="presenca2"></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Fernanda Oliveira</td>
                                <td><input type="checkbox" name="presenca3"></td>
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

    </section>
        

    <script>
        const hoje = new Date();
        
        // Formatar a data no formato desejado (exemplo: DD/MM/YYYY)
        const dia = String(hoje.getDate()).padStart(2, '0');
        const mes = String(hoje.getMonth() + 1).padStart(2, '0'); // Janeiro é 0!
        const ano = hoje.getFullYear();
        const dataFormatada = `${dia}/${mes}/${ano}`;

        // Exibir a data no elemento <span>
        document.getElementById('dataHj').textContent = dataFormatada;
    </script>
        
    </body>
    </html>