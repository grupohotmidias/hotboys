<?
   
$database="localhost"; // SERVIDOR E PORTA UTILIZADA   
$dbname="c1hotboys_admin"; // BASE DE DADOS 
$usuario="c1hotboys"; // USU�RIO DO MYSQL
$dbsenha="eF!jr4cZmFGD"; // SENHA DO MYSQL

$conexao=mysql_connect ($database, $usuario, $dbsenha);
if($conexao){
      if (mysql_select_db($dbname, $conexao)){ print "";
      }else{ print "N�o foi poss�vel selecionar o Banco de Dados"; }
}else{ print "Erro ao conectar o MySQL"; }
?>
