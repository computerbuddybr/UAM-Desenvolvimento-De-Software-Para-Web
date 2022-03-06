<?php
require 'Model/ConectarDB.php';

/**
 * A classe Produto lida com a tabela produtos da Base de Dados loja. Em um pensamento MVC está classe seria um Modelo.
 */

class Produto
{
    //Estas variáveis já começam vazias por se houver problemas com o formulário.
    protected $nomeProduto = "";
    protected $descricao = "";
    protected $valor = "";
    protected $fornecedor = "";

    //Está variável será a conexão com a base de dados
    protected $db;

    public function __construct()
    {
        $this->db = new ConectarDB();
    }

    /**
     * Ecoar propriedades privadas ou protegidas
     * @param $propriedade
     * @return void
     */
    public function displayPropriedade($propriedade)
    {
        echo $this->$propriedade;
    }

    /**
     * @return bool
     * Função para inserir dados na Base de Dados
     */

    protected function inserirDadosDB()
    {

        $sql = "INSERT INTO produtos (nomeProduto, descricao, valor, fornecedor) VALUES (:nomeProduto, :descricao, :valor, :fornecedor)";
        //Preparando a declaração
        $declaracao = $this->db->db->prepare($sql);

        //Ligando os valores
        $declaracao->bindValue(':nomeProduto', $this->nomeProduto, PDO::PARAM_STR);
        $declaracao->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
        $declaracao->bindValue(':valor', $this->valor, PDO::PARAM_STR);
        $declaracao->bindValue(':fornecedor', $this->fornecedor, PDO::PARAM_STR);


        //Executando
        $declaracao->execute();
        //Checando se deu certo
        if ($declaracao->rowCount() > 0) {

            return true;
        } else {

            return false;
        }


    }


}