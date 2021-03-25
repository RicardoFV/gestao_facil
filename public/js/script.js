// funcao para identar o texto no textarea
$(document).ready(function() {

    // recebe o textarea
    var campo = $('#descricao')
        // passa as informaçoes digitadas
    var digitado = campo.val().trim();
    //devolve as informações sem espaço
    $('#descricao').val(digitado)

})

// funcao reponsavel por deletar
// nao usar
function deletar(url, nome) {
    if (window.confirm('Deseja realmente excluir este(a) ' + nome + '?')) {
        window.location = url
    }
}