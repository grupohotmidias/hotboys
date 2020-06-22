<?php
    include_once("../config/config.php");

    class conexao extends config{
        var $pdo;

        function __construct(){
            $this->pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->bd.'', $this->usuario, $this->senha);
        }
        function login($user, $senha){
            $stnt = $this->pdo->prepare("SELECT * FROM usuarios_atores WHERE conta= :user AND senha= :senha");
            $stnt->bindValue(":user","$user");
            $stnt->bindValue(":senha","$senha");
            $run = $stnt->execute();
            $result = $stnt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>