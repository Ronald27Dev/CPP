<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CPP</title>

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/css/estilos.css">
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">CPP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Inicio <span class="sr-only">(Atual)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/chatify">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/usuarios">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/alunos">Alunos</a>
                    </li>
                </ul>
                <div class="ml-auto">
                    <span class="navbar-text text-white">Ola, {{$currentUser->name}}</span>&nbsp;&nbsp;&nbsp;
                    <div class="btn-group float-end">
                        <a href="/logout" class="btn btn-danger btn-sm">Sair</a>

                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section>
       
        <main>
            <div class="info-container">
                <div class="info-img">
                    <img src="/image/mini vegetti.png" alt="Foto Aluno">
                </div>

                <div class="info">
                    <p>Mini Vegetti da Silva</p>
                    <p class="idade">99 anos</p>
    
                    <p>Turma 6°A</p>
                    <p>Professor(a) Responsável:</p>
                    <p>Pedro Paulo</p>
                </div>

                <div class="info-adicional">
                    <h3>Informações adicionais:</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti libero, adipisci quam delectus soluta hic quidem qui repellat dolores incidunt ab reprehenderit, consequuntur illum nemo, officiis vero reiciendis inventore nulla.</p>
                </div>
            </div>

            <div class="notas">
                <table>
                    <caption>Notas</caption>

                    <thead>
                        <tr>
                            <th>Matéria:</th>
                            <th>Média:</th>
                            <th>Nota:</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>Educação Física</td>
                            <td>8.5</td>
                            <td>10</td>
                        </tr>

                        <tr>
                            <td>Língua Portuguesa</td>
                            <td>5</td>
                            <td>2</td>
                        </tr>

                        <tr>
                            <td>Matemática</td>
                            <td>7</td>
                            <td>7</td>
                        </tr>

                        <tr>
                            <td>História</td>
                            <td>6</td>
                            <td>5.5</td>
                        </tr>

                        <tr>
                            <td>Ciências</td>
                            <td>6</td>
                            <td>5.5</td>
                        </tr>

                        <tr>
                            <td>Geografia</td>
                            <td>6</td>
                            <td>5.5</td>
                        </tr>

                        <tr>
                            <td>Artes</td>
                            <td>6</td>
                            <td>5.5</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="calendario-conteiner">
                <div class="calendario-titulo">
                    <h3>Frequência e datas importantes</h3>
                </div>

                <div class="calendario-img">
                    <img src="assets/img/CalendarioDezembro.png" alt="Calendario">
                </div>

                <div class="datas-importantes">
                    <p>Prova: Educação Física - 03/12</p>
                    <p>Prova: Língua Portuguesa - 05/12</p>
                    <p>Férias: 13/12</p>
                </div>

            </div>
            
            <div class="msg">
                <div class="msg-titulo">
                    <h3>Quadro de Mensagens:</h3>
                </div>

                <div class="msg-input">
                    <input type="text">
                </div>
            </div>
        </main>

    </section>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>