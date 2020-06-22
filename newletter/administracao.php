<? session_start();
include "cabecalhoadm.inc";
include "config.inc";
if($opcao==1){
	if(strcmp($senha,$senha2)==0){
		$logado=true;
		session_register("logado");
		echo "<b>Logado!</b>";
	}else{
		$logado=false;
		session_register("logado");
	}
}else if($opcao==9){
	session_destroy();
	echo "<b>Obrigado</b>";
}
if($logado!=true){ ?> 
<form name="form1" method="post" action="administracao.php">
  <b>Senha: 
  <input type="text" name="senha2">
  <br>
  <input type="submit" name="Submit" value="Enviar">
  <input type="hidden" name="opcao" value="1">
  </b> 
</form>
<? }else{
	if($opcao==2||$opcao==NULL){
		include "conectar.inc";
		$resultado=mysql_query("select * from $nometabela order by id",$conexao);
		if(mysql_num_rows($resultado)==0){
			echo "<b>Nenhum email cadastrado!</b>";
		}else{
			echo "<b>Emails cadastrados: </b>".mysql_num_rows($resultado)."</p>";
			for($i=0;$i<mysql_num_rows($resultado);$i++){ ?>
<form name="form2" method="post" action="administracao.php">
  <input type="text" name="email" value="<?=mysql_result($resultado,$i,email)?>">
  <input type="submit" name="Submit2" value="Atualizar">
  <a href="administracao.php?opcao=4&id=<?=mysql_result($resultado,$i,id)?>">Apagar</a> 
  <input type="hidden" name="id" value="<?=mysql_result($resultado,$i,id)?>">
  <input type="hidden" name="opcao" value="3">
</form>
			
<? }
		}
		mysql_close($conexao);
	}else if($opcao==3){
		if(strpos($email,"@")<3||strrpos($email,".")<7||strlen($email)>255){
			echo "<b>Volte e conserte o email!</b>";
		}else{
			include "conectar.inc";
			mysql_query("update $nometabela set email='$email' where id=$id",$conexao);
			echo "<b>Email atualizado!</b>";
			mysql_close($conexao);
		}
	}else if($opcao==4){
		include "conectar.inc";
		mysql_query("delete from $nometabela where id=$id",$conexao);
		echo "<b>Email apagado!</b>";
		mysql_close($conexao);
	}else if($opcao==5){ ?>
<form name="form3" method="post" action="administracao.php">
  <b>Assunto: 
    <input type="text" name="assunto" maxlength="255">
    <br>
    Email em formato 
    <input type="radio" name="formato" value="text/html" checked>
    HTML 
    <input type="radio" name="formato" value="text/plain">
    Texto<br>
    Mensagem: 
    <textarea name="mensagem" rows="5" cols="75"></textarea>
    <br>
    <input type="submit" name="Submit3" value="Enviar">
    <input type="hidden" name="opcao" value="6">
    </b>
  </form>
<? }else if($opcao==6){
		if(strlen($mensagem)!=0){
			$cabecalho="from: ".$emailrem."\nContent-type:".$formato."\n\n";
			include "conectar.inc";
			$resultado=mysql_query("select * from $nometabela",$conexao);
			for($i=0;$i<mysql_num_rows($resultado);$i++){
				mail(mysql_result($resultado,$i,email),$assunto,$mensagem,$cabecalho);
			}
			echo "<b>Mensagem enviada para ".mysql_num_rows($resultado)." pessoas!</b>";
			mysql_close($conexao);
		}else{
			echo "<b>Volte e escreva uma mensagem!</b>";
		}
	}
}
include "rodape.inc";?>
