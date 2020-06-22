<?php 
// Inicia sessões, para assim poder destruí-las 
session_start();

if(isset($_SESSION["logado"])){
    include_once('../config/conexao.php');

    $data_logout = date('Y-m-d H:i:s');
    
    $sql_login = "UPDATE `usuarios_atores` SET `logout`='$data_logout', `ip`='$_SESSION[ip]' WHERE id_ator='$_SESSION[id_ator]'";
    $consulta_login = mysql_query($sql_login);

    session_destroy();
    
$msg = "Logout efetuado!";
header("location:../index2.php?msg=".$msg);
}

?>