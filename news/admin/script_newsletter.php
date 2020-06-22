<?
session_start();
if (empty($_SESSION['usuario_id'])) {
 echo "Acesso negado!";
 exit;
}else{
include('config/conexao.php');

$usuario_id   = $_SESSION['usuario_id'];
$usuario_nome = $_SESSION['usuario_nome'];
}
?>
<? 
// PEGA OS DADOS DO USUÁRIO

$query = "SELECT * FROM tbl_usuarios where id = '$usuario_id'";
    $resultado = mysql_query ($query);
	$campo = mysql_fetch_array ($resultado);   
	$usuario_nome = $campo ['nome'];  

?>

<?

$acao = $_GET['acao'];

switch ($acao) {

case cadastrar:

$id_newsletter  = $_POST['id_newsletter'];
$email          = $_POST['emailz'];
$hoje           = date('d/m/Y'); 

$query = "insert into tbl_newsletter(email, data_cadastro) values ('$email', '$hoje')";
$rs= mysql_query($query);

if ($rs){

?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("NEWSLETTER\n email cadastrado com sucesso")</SCRIPT>
<SCRIPT language="JavaScript">window.location.href="newsletter_listar.php";</SCRIPT>

<?
}
break;

case editar:

$id_newsletter     = $_POST['id_newsletter'];
$email             = $_POST['emailz'];

$query2 = "update tbl_newsletter SET
           email       = '$email'
           
           where idemail = '$id_newsletter'";
           
$rs2    = mysql_query($query2);

?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("NEWSLETTER\n edição de email efetuada com sucesso")</SCRIPT>
<SCRIPT language="JavaScript">window.location.href="newsletter_listar.php";</SCRIPT>

<?


break;

case excluir:

$id_newsletter      = $_GET['id_newsletter'];

$query1 = "delete from tbl_newsletter where idemail ='$id_newsletter'";
$rs1    = mysql_query($query1);

if ($rs1){
?>

<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript"> alert ("NEWSLETTER\n email excluído com sucesso")</SCRIPT>
<SCRIPT language="JavaScript">window.location.href="newsletter_listar.php";</SCRIPT>
<?
     
}

break;
}

?>
