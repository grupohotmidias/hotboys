<? include "config.inc";
$erro=false;
echo "<font size=4 color=red><b>";
if($opcao!="cadastrar"&&$opcao!="descadastrar"){
	echo "A opção selecionada não existe!<br>";
	$erro=false;
}else{
	if(strpos($email,"@")<3||strrpos($email,".")<7||strlen($email)>255){
		echo "Volte e digite um email correto!<br>";
		$erro=false;
	}
	echo "</b></font>";
	include "conectar.inc";
	$resultado=mysql_query("select id from $nometabela where email='$email'",$conexao);
	if($opcao=="cadastrar"){
		if(mysql_num_rows($resultado)==0){
			mysql_query("insert into $nometabela values(NULL,'$email')",$conexao);
			echo "<b>Email registrado!</b>";
		}else{
			echo "<b>Esse email já está cadastrado em nosso banco de dados!</b>";
		}
	}else{
		if(mysql_num_rows($resultado)==1){
			mysql_query("delete from $nometabela where email='$email'",$conexao);
			echo "<b>O email foi retirado do nosso banco de dados!</b>";
		}else{
			echo "<b>Esse email não está cadastrado em nosso banco de dados!</b>";
		}
	}
	mysql_close($conexao);
}
echo "</b></font>";
?>