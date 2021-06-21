// arquivo para criar as validaçoes dos campos
// mascara de cnpj
function mascaraCnpj() {
    document.getElementById('cnpj').addEventListener('input', function (e) {
        var x = e.target.value.replace(/\D/g, '').match(/(\d{0,2})(\d{0,3})(\d{0,3})(\d{0,4})(\d{0,2})/);
        e.target.value = !x[2] ? x[1] : x[1] + '.' + x[2] + '.' + x[3] + '/' + x[4] + (x[5] ? '-' + x[5] : '');
    });
}
function mascaraTelefone1()
{
    // recebe as informaçoes
    let telefone = document.getElementById('telefone_1').value

    // passa o tamanho
    let tamanho = telefone.length
     // tira os dois primeiros digitos parafazer o ddd
     let ddd = telefone.substring(0,2);
    // variavel que retornara o telefone
    let telefoneFormatado;

    // somente o telefone
    var semddd = '' ;
    // se o tamanho for 10
    if(tamanho == 10){
        // tira o ddd
        semddd = telefone.substring(2,10)
        // monta os campos
        telefoneFormatado = '('+ddd+')' + semddd.substring(0,4) + '-'+  semddd.substring(4,8)
        // faz o campo receber o telefone formatado
        document.getElementById('telefone_1').value = telefoneFormatado
    }
}


function mascaraTelefone2()
{
    // recebe as informaçoes
    let telefone = document.getElementById('telefone_2').value

    // passa o tamanho
    let tamanho = telefone.length
     // tira os dois primeiros digitos parafazer o ddd
     let ddd = telefone.substring(0,2);
    // variavel que retornara o telefone
    let telefoneFormatado;

    // somente o telefone
    var semddd = '' ;
    // se o tamanho for 10
    if(tamanho == 11){
        // tira o ddd
        semddd = telefone.substring(2,11)
        // monta os campos
        telefoneFormatado = '('+ddd+')' + semddd.substring(0,4) + '-'+  semddd.substring(4,9)
        // faz o campo receber o telefone formatado
        document.getElementById('telefone_2').value = telefoneFormatado
    }
}
