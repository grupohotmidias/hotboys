<?php 
// session_start inicia a sessão
session_start();
// as variáveis login e senha recebem os dados digitados na página anterior
$login = $_POST['conta'];
$senha = $_POST['senha'];

//conexao com o banco de dados
require_once("config/config2.php");

//verifica se esta logada
$consulta_login = "SELECT * FROM `usuarios_atores` WHERE `conta`='$login' AND `senha`='$senha'";
$resultado = mysqli_query($conexao, $consulta_login);
if(mysqli_num_rows($resultado) > 0 )
{
$_SESSION['conta'] = $login;
$_SESSION['senha'] = $senha;
header('location:painel2.php');
}
else{
  unset ($_SESSION['conta']);
  unset ($_SESSION['senha']);
  echo  "<script>alert('$senha');</script>";
  }
  
 $_SESSION['nome'] = $dados_user['nome'];

                $_SESSION['email'] = $dados_user['email'];

                $_SESSION['permissao'] = $dados_user['permissao'];

                $_SESSION['status'] = $dados_user['status'];

                $_SESSION['id_ator'] = $dados_user['id_ator'];