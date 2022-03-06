<?php
require 'Model/Produto.php';
/**
 * Está classe herda da classe Produto e lida com o processamento do formulário, fazendo a validação dos campos e depois se tudo está correto, chamando a atualização
 * da base de dados. E se está ocorre corretamente, devolvendo uma mensagem de sucesso, já se há algum problema devolve o formulário com suas respectivas
 * mensagens de erro. Em um pensamento MVC este seria o Controller.
 */

class ProcessarForm extends Produto
{
    public $produto;

    //Variaáveis de mensagens
    public $erro_nomeProduto;
    public $erro_descricao;
    public $erro_valor;
    public $erro_fornecedor;
    public $mensagem_final;

    //Variáveis de controle
    private $formValido = true;
    public $formProcessadoComSucesso = false;

    public function __construct()
    {
        parent::__construct();

    }

/**
 * Irá processar o formulário, verificar se foi enviado, se foi, irá validar os dados enviados. Se estiverem válidos fará a atualização da base de dados
 * se não retornará uma mensagem de erro.
 */
    public function processarFormulario(){
        if(isset($_POST['submit'])) {
            $this->validarFormulario();
            if ($this->formValido) {
                $this->nomeProduto = $this->sanitize($_POST['nomeProduto']);
                $this->descricao = $this->sanitize($_POST['descricao']);
                $this->valor = $this->sanitize($_POST['valor']);
                //Troca a , por ponto
                $this->valor = str_replace(",", ".", $this->valor);

                $this->fornecedor = $this->sanitize($_POST['fornecedor']);

                if ($this->inserirDadosDB()) {
                    $this->mensagem_final = "Parabéns, a base de dados foi atualizada com sucesso";
                    $this->formProcessadoComSucesso = true;
                    return true;
                } else {
                    $this->mensagem_final = "Houve um problema ao atualizar a base de dados. Favor tentar novamente mais tarde";
                }
            } else {
                $this->mensagem_final = "Há erros no formulário. Favor corrigi-los.";
                return false;
            }
        } else {
            $this->mensagem_final = "";
            return false;
        }
    }



    /**
     * Função para criar a mensagem de erro que será mostrada no formulário
     * @param $mensagem
     * @return void
     */

    public function mensagemDeErro($mensagem){
        echo '<p>';
        echo $mensagem;
        echo '</p>';
}
    /**
     * Está função valida o formulário e caso alguma validação retorne falsa altera o valor de controle $form_valido para falso
     * @return void
     */
    private function validarFormulario()
    {
        if($this->comprimentoCampo('nomeProduto', 100)){
            $this->formValido = false;
            $this->erro_nomeProduto .= 'O campo nome do produto é obrigatório e deve ter menos de 100 caracteres.';
        }
        if($this->comprimentoCampo('descricao', 255)){
            $this->formValido = false;
            $this->erro_descricao .= 'O campo descrição é obrigatório e deve ter menos de 255 caracteres.';
        }
        if($this->campoVazio('valor')){
            $this->formValido = false;
            $this->erro_valor .= 'O campo valor é obrigatório';
        }
        $valor = str_replace(",", ".", $_POST["valor"]);
        if(!is_numeric($valor)){
            $this->formValido = false;
            $this->erro_valor .= 'O campo valor deve ser um número que pode ser escrito com , ou .';
        }
        if($this->comprimentoCampo('fornecedor', 100)){
            $this->formValido = false;
            $this->erro_fornecedor .= 'O campo fornecedor é obrigatório e deve ter menos de 100 caracteres.';
        }

   

    }

    /**
     * Verifica se o campo está vazio.
     * @param $campo
     * @return bool
     */
    private function campoVazio($campo){
        if (strlen($_POST[$campo]) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * Verifica se o campo foi preenchido comprimento maior que 0 e se o campo está dentro do comprimento máximo, comprimento > comprimento máximo
     * @param $campo
     * @param $comprimento
     * @return bool
     */
    private function comprimentoCampo($campo, $comprimento)
    {
        $comprimentoString = strlen($_POST[$campo]);
        $retorno = false;
        if ($comprimentoString > $comprimento) {
            $retorno = true;
        }
        if($this->campoVazio($campo)){
            $retorno = true;
        }
        return $retorno;

    }

     /**
      * Função para limpar os dados enviados antes de enviá-los a base de dados ou mostrá-los na página para evitar SQL Injection e scripts maliciosos
      */

    public function sanitize($string)
    {

        $string_limpo_1 = htmlspecialchars($string, ENT_SUBSTITUTE);
        $string_limpo_2 = htmlspecialchars($string_limpo_1, ENT_SUBSTITUTE);
        $string_limpo_3 = htmlspecialchars($string_limpo_2, ENT_SUBSTITUTE);
        $string_limpo_4 = htmlspecialchars($string_limpo_3, ENT_SUBSTITUTE);
        $string_limpo_final = htmlspecialchars($string_limpo_4, ENT_SUBSTITUTE);

        return $string_limpo_final;
    }


}