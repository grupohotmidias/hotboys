<?

include('admin/config/conexao.php');

$nome  = $HTTP_POST_VARS['nome'];
$email = $HTTP_POST_VARS['email'];

$dia_cadastro        = date("d");
$mes_cadastro        = date("m");
$ano_cadastro        = date("Y");
$data_cadastro       = "$dia_cadastro/$mes_cadastro/$ano_cadastro";

$query_select_email  = "SELECT * FROM tbl_newsletter where email = '$email'";
$rs_select_email     = mysql_query($query_select_email);

$contador_rows = mysql_num_rows($rs_select_email);

if($contador_rows >= 1){
	

?>

<script language="JavaScript">                        
alert('Desculpe, este email já está cadastrado !!!');
</script>                                            
<meta HTTP-EQUIV='Refresh' CONTENT='0; URL=http://hotboys.com.br/index2.php'>

<?
}else{

$query_newsletter = "INSERT INTO tbl_newsletter (email, nome, data_cadastro) VALUES ('$email', '$nome', '$data_cadastro')";
$rs_newsletter    = mysql_query($query_newsletter);

echo '<div id="main" style="position: relative; margin: 0 auto; width: 70%; top: -10px;height: 100%; text-align:center; font-size:36px; padding-top:200px; color:#090; border:0px;\"><img src="http://www.hotboys.com.br/img_home/positivo.jpg" width="240" height="240" /><br />Cadastro efetuado com sucesso !!! </div>';
?>
          
<meta HTTP-EQUIV='Refresh' CONTENT='3; URL=http://hotboys.com.br/index2.php'>
<?
} 
?>

