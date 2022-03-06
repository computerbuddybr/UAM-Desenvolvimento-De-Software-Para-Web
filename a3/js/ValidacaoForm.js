//Garantido que todos os elementos carregam antes de capturá-los
window.onload = function(){

let campoNomeProduto = document.getElementById("nomeProduto");
let campoDescricao = document.getElementById("descricao");
let campoValor = document.getElementById("valor");
let campoFornecedor = document.getElementById("fornecedor");
let botaoEnviar = document.getElementById("submit");
let valido = true;

/**
 * Verifica se o campo está vazio
 * @param infoCampo
 * @returns {boolean}
 */
function campoVazio(infoCampo){
    if(infoCampo.length > 0){
        return true;
    } else {
        return false;
    }

}



/**
 * Verifica se o string fornecido tem menos caracteres do que o máximo permitido
 * @param infoCampo
 * @param maxlength
 * @returns {boolean}
 */
function comprimentoMaximo(infoCampo, maxlength){
    console.log(infoCampo.length);
    if(infoCampo.length > maxlength){
        return false;
    } else {
        return true;
    }
}

/**
 * Roda todas as expressões de validação e cria a mensagem de erro. Usada na chamada do Event Listener
 * @param elemento
 * @param campo
 * @param infoCampo
 * @param maxlength
 * @param regex
 */
function validar(elemento, campo, infoCampo, maxlength){
    let nomeSpan = 'erro_' + campo;
    let spanErro = document.getElementById(nomeSpan);
    let mensagem = "";
    valido = true;
    if(!campoVazio(elemento.value)){
        mensagem +="<p>O " + infoCampo + " é obrigatório. </p>";
        valido = false;        
    }

    if(campo != 'valor') {
        if (!comprimentoMaximo(elemento.value, maxlength)) {
            mensagem += "<p>Não ultrapassar "+ maxlength + " caracteres.</p>";
            valido = false;
        }
    }

    spanErro.innerHTML = mensagem;

}
/**
 * Função para usar de callback no botão enviar para impedir o envio caso haja erros
 */ 
function possoEnviar(evento){
    if(!valido){
        evento.preventDefault();

    }
}

//Adicionando o EventListener em cada campo e ao botão
campoNomeProduto.addEventListener("blur", function(){
    console.log("I blurred");
   validar(campoNomeProduto, "nomeProduto", "nome do produto", 100);
   

});
campoDescricao.addEventListener("blur", function(){
    validar(campoDescricao, "descricao", "descrição do produto", 255);
});
campoValor.addEventListener("blur", function(){
    validar(campoValor, "valor", "valor do produto", 255);
});
campoFornecedor.addEventListener("blur", function(){
    validar(campoFornecedor, "fornecedor", "fornecedor do produto", 100);
});

botaoEnviar.addEventListener('click', possoEnviar);
}
