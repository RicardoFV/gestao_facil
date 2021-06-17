function consultarCep() {
    // recebe o que foi digitado
    let cep = document.getElementById('meu_cep').value
        // verifica a quantidade de digitos
    if (cep === '' || cep === null) {
        alert('CEP não pode ser vazio')
    } else if (cep.length < 8) { // verifica se esta vazio
        alert('CEP não pode ser menor que 8')
    } else { // realiza a consulta

        // chama a url passando o cep
        let url = 'https://viacep.com.br/ws/' + cep + '/json/'
            // cria a instancia do request
        let request = new XMLHttpRequest()
            // abre a requisiçao
        request.open('GET', url, true)
            // captura a resposta da requisiao
        request.onreadystatechange = function() {
                // numero 4 significa a transaçao concluida
                if (request.readyState == 4) {
                    // se status 200 significa que deu certo
                    if (request.status == 200) {
                        // passa a resposta para a funçao de preencher os campos
                        preencherCampos(JSON.parse(request.responseText))
                            // limpa a campo
                        document.getElementById('meu_cep').value = ''
                    }
                }
            }
            // finaliza a requisiçao
        request.send();
    }


}

   // preenche os campos do formulario
function preencherCampos(cep) {
    document.getElementById('cep').value = cep.cep
    document.getElementById('logradouro').value = cep.logradouro
    document.getElementById('complemento').value = cep.complemento
    document.getElementById('bairro').value = cep.bairro
    document.getElementById('localidade').value = cep.localidade
    document.getElementById('uf').value = cep.uf
    /*
    document.getElementById('ibge').value = cep.ibge
    document.getElementById('gia').value = cep.gia
    document.getElementById('ddd').value = cep.ddd
    document.getElementById('siafi').value = cep.siafi
    */
}
