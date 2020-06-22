<?php
class Conexao {
    private $tabela;
    static $conexao;
    private $clausula;
    
    function __construct() {
        try {
            $pdo = new PDO("mysql:host=localhost;dbname=c1hotboys_admin", "c1hotboys", "eF!jr4cZmFGD");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        self::$conexao = $pdo;
    }
    function setTabela($tabela) {
        $this->tabela = $tabela;
    }
    function where($parametro, $valor) {
        if ($parametro != NULL && $valor != NULL) {
            $this->clausula = "WHERE {$parametro} = '{$valor}'";
        } else {
            $this->clausula = NULL;
        }
        return $this->clausula;
    }
    function count() {
        $query = "SELECT * FROM {$this->tabela} {$this->clausula}";
        $count = self::$conexao->prepare($query);
        $count->execute();
        if ($count->rowCount()) {
            return true;
        }
    }
    function getAll() {
        $select = self::$conexao->prepare("SELECT * FROM {$this->tabela}");
        $select->execute();
        return $select->fetchAll(PDO::FETCH_ASSOC);
    }
    function getAllBy() {
        if($this->clausula != NULL || $this->clausula != ""){
            $select = self::$conexao->prepare("SELECT * FROM {$this->tabela} {$this->clausula}");
            $select->execute();
            if ($select->rowCount()) {
                return $select->fetch(PDO::FETCH_ASSOC);
            } else {
                return false;
            }
        }else{
            return false;
        }
    }
    function insert($dados) {
        $chaves = implode(',', array_keys($dados));
        $valores = "'" . implode("','", $dados) . "'";
        //Criando Segurança para cadastro
        $count = 0;
        foreach ($dados as $key => $valor) {
            if ($valor == null) {
                $count++;
                break;
            }
        }
        if ($count == 0) {
            $insert = self::$conexao->prepare("INSERT INTO {$this->tabela} ({$chaves}) VALUES({$valores})");
            $insert->execute();
            if ($insert->rowCount()) {
                return true;
            }
        }
    }
    function update(array $dados) {
        $count = 0;
        foreach ($dados as $key => $valor) {
            if ($valor == null) {
                continue;
            }
            $update = self::$conexao->prepare("UPDATE {$this->tabela} SET {$key} = '{$valor}' {$this->clausula}");
            $update->execute();
            if ($update->rowCount()) {
                $count++;
            }
        }
        if ($count > 0) {
            return true;
        }
    }
    function delete() {
        $query = "DELETE FROM {$this->tabela} {$this->clausula}";
        $prepare = self::$conexao->prepare($query);
        $prepare->execute();
        if ($prepare->rowCount()) {
            return true;
        }
    }
}