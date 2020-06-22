<?php 
// Inicia sessões 
session_start(); 

if(isset($_SESSION["status"]) && $_SESSION["status"] == "Inativo"){
    session_destroy();

    $msg = "Acesso negado!";
    header("location:index.php?msg=".$msg);  
}

if(!isset($_SESSION["nome"])){
    session_destroy();

    $msg = "Acesso negado!";
    header("location:index.php?msg=".$msg);
}
 
?>