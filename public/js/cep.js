function consultarCep() {
    // recebe o que foi digitado
    let cep = document.getElementById('cep').value
    // verifica a quantidade de digitos
    if (cep === '' || cep === null) {
        swal ( "Erro" , " CEP não pode ser vazio " , "error" )
    } else if (cep.length < 8) { // verifica se esta vazio
        swal ( "Erro" , " CEP não pode ser menor que 8 " ,"error" )   ;
    } else { // realiza a consulta

        // chama a url passando o cep
        let url = 'https://viacep.com.br/ws/' + cep + '/json/'
        // cria a instancia do request
        let request = new XMLHttpRequest()
        // abre a requisiçao
        request.open('GET', url, true)
        // captura a resposta da requisiao
        request.onreadystatechange = function () {
            // numero 4 significa a transaçao concluida
            if (request.readyState == 4) {
                console.log(request)
                // se status 200 significa que deu certo
                if (request.status == 200) {
                    // passa a resposta para a funçao de preencher os campos
                    preencherCampos(JSON.parse(request.responseText))
                } else if (request.status == 0) {
                    swal ( "Erro" , " CPF digitado e incorreto " , "error" )   ;
                }
            }

        }
        // finaliza a requisiçao
        request.send();
    }


}

// preenche os campos do formulario
function preencherCampos(cep) {
    // passa o cep para uma nova variavel
    let novo_cep = cep.cep
    // tira o sext caractere que e o tracho -
    document.getElementById('cep').value = novo_cep.replace('-', '')
    document.getElementById('logradouro').value = cep.logradouro
    if (cep.complemento == '') {
        document.getElementById('complemento').value = 0
    } else {
        document.getElementById('complemento').value = cep.complemento
    }
    document.getElementById('bairro').value = cep.bairro
    document.getElementById('localidade').value = cep.localidade
    document.getElementById('uf').value = cep.uf
}
