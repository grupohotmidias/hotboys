<?php 
require_once('config/configuracoes.php');

$id = addslashes($_GET[id]);

if($id != ''){
$query = mysql_query("UPDATE `cliques_banners` SET `cliques`= cliques + 1 WHERE id=".$id);
 echo mysql_error();
 
 if(mysql_query){
	header("Location: https://www.hotboys.com.br/index.php");
		exit();
 }
}
?>