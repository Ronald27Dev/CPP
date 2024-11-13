let indice = 0;  // Índice atual do carrossel
const perfisVisiveis = 3;  // Número de perfis visíveis por vez
let perfis = [];  // Array para armazenar os perfis dos alunos filtrados
let totalPerfis = 0;  // Total de perfis filtrados (inicializado com 0)

// Função para atualizar a exibição do carrossel
function atualizarCarrossel() {
    // Esconde todos os perfis primeiro
    perfis.forEach((perfil) => {
        perfil.style.display = 'none';
    });

    // Mostra os três perfis, ajustando o índice circularmente
    for (let i = 0; i < perfisVisiveis; i++) {
        const indiceVisivel = (indice + i) % totalPerfis;
        perfis[indiceVisivel].style.display = 'flex';
    }
}

// Função para alterar o índice do carrossel
function mudarCarrossel(direcao) {
    indice = (indice + direcao + totalPerfis) % totalPerfis;  // Atualiza o índice com navegação circular
    atualizarCarrossel();
}

// Função para buscar alunos e carregar os dados no carrossel
function buscarAlunos() {
    const turmaSelecionada = document.getElementById('turma').value;  // Obtém a turma selecionada

    $.ajax({
        url: '/json/alunos.json',  // Supondo que o arquivo JSON esteja na pasta '/json/'
        method: 'GET',
        dataType: 'json',
        success: function(data) {
            // Filtra os alunos pela turma selecionada
            const alunosDaTurma = data.filter(aluno => aluno.turma === turmaSelecionada);

            // Limpar o carrossel antes de adicionar novos resultados
            const lista = document.getElementById('carouselInner');
            lista.innerHTML = '';  // Limpa o conteúdo do carrossel

            // Adiciona os novos alunos ao carrossel
            perfis = alunosDaTurma.map(aluno => {
                const container = document.createElement('div');
                container.classList.add('container-profile');

                container.innerHTML = `
                    <div class="img-container">
                        <img src="/image/alunos/${aluno.turma}/${aluno.nome_completo}.jpg" alt="Foto de perfil ${aluno.nome_completo}">
                    </div>

                    <div class="desc-prof">
                        <h4>${aluno.nome_completo}</h4>
                        <p>${aluno.turma} | ${aluno.idade} | ${aluno.cidade_nascimento}</p>
                    </div>

                    <div class="dados-adicionais">
                        <h4>Infos adicionais</h4>
                        <span>Data de Nascimento: ${aluno.data_nascimento}</span>
                        <h4>Responsáveis</h4>
                        <span>${aluno.nome_pai}</span>
                        <span><img src="/image/icons/phone.png"> ${aluno.contato_pai}</span>
                        <span>${aluno.nome_mae}</span>
                        <span><img src="/image/icons/phone.png"> ${aluno.contato_mae}</span>
                    </div>
                `;

                lista.appendChild(container);
                return container;  // Retorna o container do perfil
            });

            // Atualiza a quantidade de perfis e reinicia o carrossel
            totalPerfis = perfis.length;  // Atualiza o total de perfis carregados
            indice = 0;  // Reinicia o índice para começar do início
            atualizarCarrossel();  // Atualiza o carrossel para exibir os perfis
        },
        error: function() {
            alert('Erro ao buscar os dados');
        }
    });
}
