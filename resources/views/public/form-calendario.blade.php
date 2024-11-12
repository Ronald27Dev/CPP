<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP | Enviar Atividade</title>

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
                <a href="/classe"><img src="/image/icons/user.png"> <span>Classe</span></a>
                <a href="/calendario"><img src="/image/icons/calendar-day.png"> <span>Calendário</span></a>
                <a href="/notas"><img src="/image/icons/receipt.png"> <span>Notas</span></a>
                @if($user['role'] !== 2)<a href="/frequencia"><img src="/image/icons/time-check.png"> <span>Frequência</span></a>@endif
                <a href="/horario"><img src="/image/icons/clock.png"> <span>Horário</span></a>
                <a href="/logout"><img src="/image/icons/sign-out-alt.png"> <span>Sair</span></a>
            </div>
        </aside>

        <header>
            <h3>Bem vindo Moreno</h3>
            <a href="#"><img src="/image/icons/bell.png"></a>
        </header>


        <main class="form-calendario">
            <form action="">
                <h3>Calendário <span>CPP</span></h3>

                <div class="desc-desc">
                    <label>Turma
                        <select name="turma" id="turma" required>
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="6°A">6°A</option>
                            <option value="6°B">6°B</option>
                            <option value="6°C">6°C</option>
                        </select>
                    </label>
    
                    <label>Disciplina
                        <select name="disciplina" id="disciplina" required>
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="portugues">Português</option>
                            <option value="matematica">Matemática</option>
                            <option value="ciencias">Ciências</option>
                            <option value="historia">História</option>
                            <option value="geografia">Geografia</option>
                            <option value="educacao-fisica">Educação Física</option>
                            <option value="artes">Artes</option>
                            <option value="evento">Evento</option>
                        </select>
                    </label>
                </div>

                <div class="desc-desc">
                    <label>Descrição
                        <input type="text" name="descricao" id="descricao" minlength="5" maxlength="26" required>
                    </label>
                </div>

                <div class="desc-desc"> 
                    <label>Tipo
                        <select name="tipo" id="tipo" required>
                            <option value="" disabled selected>Escolha uma opção</option>
                            <option value="avaliacao">Avaliação</option>
                            <option value="trabalho">Trabalho</option>
                            <option value="exercicio_em_classe">Exercício em Classe</option>
                            <option value="evento">Evento</option>
                        </select>
                    </label>
    
                    <label>Data
                        <input type="date" name="data" id="data" required>
                    </label>
                </div>

                <div class="butao-form">
                    <input type="reset" value="Refazer">
                    <input type="submit" value="Enviar">
                </div>
                
            </form>
        </main>
    </section>

</body>
</html>