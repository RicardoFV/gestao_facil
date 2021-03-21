// funcao reponsavel por deletar
function deletar(url, nome) {
    if (window.confirm('Deseja realmente excluir este(a) ' + nome + '?')) {
        window.location = url
    }
}