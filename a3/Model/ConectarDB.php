<?php
/**
 * Está classe lida com a conexão com a base de dados loja usando PDO. Em um pensamento MVC está classe seria um Modelo.
 */

class ConectarDB
{
    private const DB_NAME = 'loja';
    private const DB_USER = 'root';
    private const DB_PASS = 'root';
    private const HOST = 'localhost:3306';
    private const DB_TIPO = 'mysql';
    public $db;

    function __construct()
    {

        $caminho = ConectarDB::DB_TIPO . ':host=' . ConectarDB::HOST . ';dbname=' . ConectarDB::DB_NAME;

        $this->db = new PDO($caminho, ConectarDB::DB_USER, ConectarDB::DB_PASS);
    }



}