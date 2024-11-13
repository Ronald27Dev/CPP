

let indice = 0;
const perfisVisiveis = 3;
const perfis = Array.from(document.getElementsByClassName('container-profile'));
const totalPerfis = perfis.length;

// Função para atualizar a exibição dos perfis no carrossel
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
    indice = (indice + direcao + totalPerfis) % totalPerfis; // Atualiza o índice circularmente
    atualizarCarrossel();
}

// Inicializa o carrossel na primeira visualização
atualizarCarrossel();