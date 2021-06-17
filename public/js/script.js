
// funcao para identar o texto no textarea
$(document).ready(() => {

    // recebe o textarea
    var campo = $('#descricao')
        // passa as informaçoes digitadas
    var digitado = campo.val().trim();
    //devolve as informações sem espaço
    $('#descricao').val(digitado)

})
