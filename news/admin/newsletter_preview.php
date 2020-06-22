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
$resultado = mysql_query($query); 
	$campo = mysql_fetch_array ($resultado);
	$usuario_nome = $campo ['nome'];

// VARIAVEIS QUE ESTAO SENDO UTILIZADAS 

$op       = $_POST['op']; // Para a opção preview
$op_envia = $_GET['op_envia']; // Para a opção enviar
$msg      = $_POST['msg'];                              
$de       = $_POST['de'];
$email    = $_POST['email']; 
$assunto  = $_POST['assunto'];


?>

<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<META content="MSHTML 6.00.2800.1543" name=GENERATOR>
<SCRIPT language=JavaScript>
in_pessoa = 0;
function enviar(){

    f = window.document.formident;       
    f.action = "newsletter_preview.php?op_envia=envia";  
	f.submit();                                    
}
</SCRIPT>
</HEAD>
<BODY bgColor='#6c6c7d' leftMargin='0' topMargin='0'>
<FORM name='formident' action='newsletter_preview.php?op=envia' method='post'>
<TABLE cellSpacing=1 cellPadding=0 width='100%' align=center bgColor='#000000' border='0'>
    <TBODY>
        <TR>
            <TD bgColor='#d7dbe1'>
                <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>
                    <TBODY>
                        <TR>
                            <TD>
                                <table cellspacing=0 cellpadding=0 width='100%' border=0>
                <tbody> 
                <tr> 
                  <td width=12>&nbsp;</td>
                  <td valign=middle width=145> 
                    <div align="center"><a href="principal.php" target="_top">LOGOTIPO</a></div>
                  </td>
                  <td valign=bottom width=76>&nbsp;</td>
                  <td> 
                    <table cellspacing=0 cellpadding=0 width="100%" border=0>
                      <tbody> 
                      <tr> 
                        <td align=right height=36> 
                          <table cellspacing=0 cellpadding=0 width=518 border=0>
                            <tbody> 
                            <tr> 
                              <td class=top1><span class=nome><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Olá</font> 
                                <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                                <? echo "$usuario_nome"; ?>
                                </font></span><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;&nbsp;|&nbsp;&nbsp;VOCÊ 
                                ESTÁ NA ÁREA DO ADMINISTRADOR </font></td>
                              <td width=61><a href="logout.php"><img height=14 src="imagens/res_bt-sair.gif" width=51 border=0></a></td>
                            </tr>
                            </tbody> 
                          </table>
                        </td>
                      </tr>
                      <tr> 
                        <td align=right>&nbsp; </td>
                      </tr>
                      </tbody> 
                    </table>
                  </td>
                </tr>
                </tbody>
              </table>
              <TABLE class=res-bg cellSpacing=0 cellPadding=0 width=775 

              border=0 align="center">
                <TBODY> 
                <TR>

                <TD align=middle>

                    <TABLE cellSpacing=0 cellPadding=0 width=747 border=0>
                      <TBODY> 
                      <TR> 
                        <TD><IMG height=2 width=747></TD>
                      </TR>
                      <TR> 
                        <TD align=middle height=30> 
                          <div align="center"><span class=hm-tab1tx>Verefique 
                            abaixo os emails cadastrados. Para editar ou excluir 
                            um endere&ccedil;o de email, clique no endere&ccedil;o 
                            espec&iacute;fico.</span></div>
                        </TD>
                      </TR>
                      <TR> 
                        <TD> 
                          <TABLE class=textos cellSpacing=0 cellPadding=0 

                        width=747 border=0>
                            <TBODY> 
                            <TR> 
                              <TD vAlign=bottom 

                            background=imagens/extranet/barra_branco-bg.gif> 
                                <TABLE class=textos cellSpacing=0 cellPadding=0 

                              width="100%" bgColor=#4fa9c7 border=0>
                                  <TBODY> 
                                  <TR> 
                                    <TD width=665><STRONG><FONT color=#ffffff> 
                                      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">NEWSLETTER: 
                                      ENVIO DE MENSAGEM</font></FONT></STRONG></TD>
                                  </TR>
                                  </TBODY> 
                                </TABLE>
                              </TD>
                            </TR>
                            <TR> 
                              <TD bgColor=#ffffff valign="top"> 
                                <TABLE class=textosmedios cellSpacing=0 

                              cellPadding=4 width="100%" border=0>
                                  <TBODY> 
                                  <TR> 
                                    <TD valign="top"> 
                                      <table width="95%" border="0" align="center" cellpadding="1" cellspacing="1" class="textoVerdanaPreto">
                                        <tr> 
                                          <td valign="top"> 
                                            <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF" class="textobold">
                                              <tr> 
                                                <td valign="top"> 
                                                  <table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
                                                    <tr> 
                                                      <td valign="top"> 
                                                        <p class="textoNormalPreto"> 
                                                          <?


if($op=='preview') {

 /*
	session_unregister("msg");

	session_unregister("de"); 

	session_unregister("email");
	
	session_unregister("assunto");	                                  
     
 
 	session_register("msg");
    
	session_register("de");
    
	session_register("email");
    
	session_register("assunto");
 	
*/  

//   $mensagem = ereg_replace("\n","<br>",$mensagem);   

 
//    session_register('msg');
    
 //   session_register('de');
    
   // session_register('email');    
    
   // session_register('assunto');   
    
?>
                                                        </p>
                                                        <p><span class="textoPretoBold">Instru&ccedil;&otilde;es 
                                                          de uso:</span><br>
                                                          <span class="textoNormalPreto"> 
                                                          - Clique em confirmar 
                                                          para finalizar o envio. 
                                                          </span> </p>
                                                        <table width="500" border="0" align="center" cellpadding="3" cellspacing="3">
                                                          <tr> 
                                                            <td> 
                                                              <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC">
                                                                <tr> 
                                                                  <td bgcolor="#e1e1e1" class="textoPretoBold"> 
                                                                    <div align="left">Preview 
                                                                      do Boletim</div>
                                                                  </td>
                                                                </tr>
                                                                <tr> 
                                                                  <td bordercolor="#FFFFFF"> 
                                                                    <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                                      <tr class="textoNormalPreto"> 
                                                                        <td width="10%"> 
                                                                          <div align="right"><strong>De:</strong></div>
                                                                        </td>
                                                                        <td> 
                                                                          <? echo ($_POST['de']); ?>
                                                                          ( 
                                                                          <? echo ($_POST['email']); ?>
                                                                          )</td>
                                                                      </tr>
                                                                      <tr class="textoNormalPreto"> 
                                                                        <td> 
                                                                          <div align="right"><strong>Assunto:</strong></div>
                                                                        </td>
                                                                        <td> 
                                                                          <? echo ($_POST['assunto']); ?>
                                                                        </td>
                                                                      </tr>
                                                                      <tr class="textoNormalPreto"> 
                                                                        <td colspan="2"> 
                                                                          <table width="500" border="0" cellspacing="1" cellpadding="4" bgcolor="#4a66a3">
                                                                            <tr> 
                                                                              <td bgcolor="white" valign="top"> 
                                                                                <link rel="important stylesheet" href="chrome://messenger/skin/messageBody.css">
                                                                                <style type="text/css" media="screen"></style>
                                                                                <br>
                                                                                <? echo stripslashes($_POST['msg']); ?>
                                                                              </td>
                                                                            </tr>
                                                                          </table>
                                                                        </td>
                                                                      </tr>
                                                                    </table>
                                                                  </td>
                                                                </tr>
                                                              </table>
                                                            </td>
                                                          </tr>
                                                          <tr> 
                                                            <td> 
                                                              <div align="center"> 
                                                                <input name="op" type="hidden" id="op" value="envia">
                                                                <IMG onclick=enviar(); height=18 src="imagens/extranet/bt_confirmar3.gif" width=100 border=0> 
                                                              </div>
                                                            </td>
                                                          </tr>
                                                        </table>
                                                        <p class="textoNormalPreto"> 
                                                          <font face="Verdana, Arial, Helvetica, sans-serif"> 
                                                          <?
}


if($op == 'envia'){
		$x=0;        

		$texto    = $_POST['msg'];
		$message  = '   
		'.stripslashes($texto).'';



      echo $message;

		$query = "select email from tbl_newsletter";
        $rs = mysql_query($query);

		while ($emails_res = mysql_fetch_array($rs)){

			$to = $emails_res['email'];              

			$headers  = "MIME-Version: 1.0\r\n";   
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			//$headers .= "To: $to \r\n";                                   
			$headers .= "From: $de <$email> \r\n";                        
			mail($to, $assunto, $message, $headers);                      
			
			$x=$x+1;                                                      
		} 
    if ($x == '1'){
	echo "<font size='1' face='Verdana, Arial, Helvetica, sans-serif'><center><br><br>$x email foi enviado com sucesso com a mensagem acima!</center></font>";
	}else{
	echo "<font size='1' face='Verdana, Arial, Helvetica, sans-serif'><center><br><br>$x emails foram enviados com sucesso com a mensagem acima!</center></font>";
	}
          
	//atualiza_log();
          
	}      
?>
                                                          </font></p>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr> 
                                                <td> </td>
                                              </tr>
                                            </table>
                                          </td>
                                        </tr>
                                        <tr> 
                                          <td></td>
                                        </tr>
                                      </table>
                                    </TD>
                                  </TR>
                                  </TBODY> 
                                </TABLE>
                                <TABLE class=textosmedios cellSpacing=0 

                              cellPadding=0 width="100%" border=0>
                                  <TBODY> 
                                  <TR> 
                                    <TD>&nbsp; </TD>
                                  </TR>
                                  </TBODY> 
                                </TABLE>
                              </TD>
                            </TR>
                            </TBODY> 
                          </TABLE>
                        </TD>
                      </TR>
                      <TR> 
                        <TD></TD>
                      </TR>
                      </TBODY>
                    </TABLE>
                    <BR></TD></TR></TBODY></TABLE>

            </TD>
          </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
</FORM>
</BODY></HTML>

