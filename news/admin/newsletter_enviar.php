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

?>


<HTML>
<HEAD>
<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">
<script language="javascript" type="text/javascript" src="javascript.js"></script>
<script type="text/javascript">
   _editor_url = "htmlarea/";
   _editor_lang = "en";
</script>

<script type="text/javascript" src="htmlarea.js"></script>  
<SCRIPT src="javascript/jscripts.js"></SCRIPT>
                                                              
<STYLE type=text/css>.titulos {

	FONT-SIZE: 16px; COLOR: #b09014; FONT-FAMILY: Arial, Helvetica, sans-serif

}

</STYLE>

<LINK href="../css/area-restrita.css" type=text/css 

rel=stylesheet>

<SCRIPT language=JavaScript type=text/JavaScript>

<!--

function MM_jumpMenu(targ,selObj,restore){ //v3.0

  eval(targ+".location='"+selObj.options[selObj.selectedIndex].value+"'");

  if (restore) selObj.selectedIndex=0;

}

//-->

</SCRIPT>


</HEAD>

<BODY bgColor='#6c6c7d' leftMargin='0' topMargin='0' onload="HTMLArea.replaceAll()">
<FORM action='newsletter_preview.php' method='post'>

<TABLE cellSpacing=1 cellPadding=0 width=777 align=center bgColor=#000000 

border=0>

  <TBODY>

  <TR>

    <TD bgColor=#d7dbe1>

      <TABLE cellSpacing=0 cellPadding=0 width=775 border=0>

        <TBODY>

        <TR>

          <TD>

            <TABLE cellSpacing=0 cellPadding=0 width=775 border=0> 
              <TBODY> 
              <TR>

                  <TD width=12>&nbsp;</TD>
                  <TD vAlign=middle width=145> 
                    <div align="center"><a href="principal.php" target="_top">LOGOTIPO</a></div>
                  </TD>
                  <TD vAlign=bottom width=76>&nbsp;</TD>

                <TD>

                    <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                      <TBODY> 
                      <TR> 
                        <TD align=right height=36> 
                          <TABLE cellSpacing=0 cellPadding=0 width=518 border=0>
                            <TBODY> 
                            <TR> 
                              <TD class=top1><SPAN class=nome><font color="#000000" face="Verdana, Arial, Helvetica, sans-serif" size="2">Olá</font> 
                                <font face="Verdana, Arial, Helvetica, sans-serif" size="2"> 
                                <? echo "$usuario_nome"; ?>
                                </font></SPAN><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;&nbsp;|&nbsp;&nbsp;VOCÊ 
                                ESTÁ NA ÁREA DO ADMINISTRADOR </font></TD>
                              <TD width=61><A href="logout.php"><IMG height=14 src="imagens/res_bt-sair.gif" width=51 border=0></A></TD>
                            </TR>
                            </TBODY>
                          </TABLE>
                        </TD>
                      </TR>
                      <TR> 
                        <TD align=right>&nbsp; </TD>
                      </TR>
                      </TBODY>
                    </TABLE>
                  </TD></TR></TBODY></TABLE>

            <TABLE class=res-bg cellSpacing=0 cellPadding=0 width=775 

              border=0><TBODY>

              <TR>

                <TD align=middle>

                    <TABLE cellSpacing=0 cellPadding=0 width=747 border=0>
                      <TBODY> 
                      <TR> 
                        <TD><IMG height=2 width=747></TD>
                      </TR>
                      <TR> 
                        <TD align=middle height=30> 
                          <div align="center">Efetue o envio de mensagens a seus clientes.</div>
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
                                      <table width="600" border="0" align="center" cellpadding="3" cellspacing="3">
                                        <tr> 
                                          <td valign="top"> 
                                            <p class="textoNormalPreto"> 
                                              <?  

$op = $_GET['op'];

	if(($op=='novo') or ($op=='editar')){



?>
                                              <span class="textoPretoBold"><br>
                                              </span> </p>
                                            <table width="100%" border="0" align="center" cellpadding="3" cellspacing="3">
                                              <tr> 
                                                <td> 
                                                  <table width="100%" border="1" cellpadding="2" cellspacing="2" bordercolor="#CCCCCC">
                                                    <tr> 
                                                      <td bgcolor="#d7ebff" class="textoPretoBold"> 
                                                        <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Dados 
                                                          para envio:</font></div>
                                                      </td>
                                                    </tr>
                                                    <tr> 
                                                      <td bordercolor="#FFFFFF"> 
                                                        <table width="100%" border="0" cellspacing="2" cellpadding="2">
                                                          <tr class="textoNormalPreto"> 
                                                            <td width="50"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">De:</font></td>
                                                            <td> 
                                                              <input name="de" type="text" id="de" size="55" class="formu" value="<? if($op=='editar') { echo ($de); } ?>">
                                                            </td>
                                                          </tr>
                                                          <tr class="textoNormalPreto"> 
                                                            <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-mail:</font></td>
                                                            <td> 
                                                              <input name="email" type="text" id="email" size="55" class="formu"  value="<? if($op=='editar') { echo ($_SESSION['email']); } ?>">
                                                            </td>
                                                          </tr>
                                                          <tr class="textoNormalPreto"> 
                                                            <td><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Assunto:</font></td>
                                                            <td> 
                                                              <input name="assunto" type="text" id="assunto" size="55" class="formu"  value="<? if($op=='editar') { echo ($_SESSION['assunto']); } ?>">
                                                            </td>
                                                          </tr>
                                                        </table>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                  <table width="100%" border="1" cellpadding="1" cellspacing="1" bordercolor="#CCCCCC">
                                                    <tr> 
                                                      <td bgcolor="#d7ebff" class="textoPretoBold"> 
                                                        <div align="left"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">Mensagem:</font></div>
                                                      </td>
                                                    </tr>
                                                    <tr> 
                                                      <td bordercolor="#FFFFFF"> 
                                                        <?/*
                                                                    <script language="JavaScript1.2" defer>                    
																		var config = new Object(); // create new config object 
																		config.bodyStyle = 'font-family: "Times New Roman";';  
																		editor_generate('msg', config);                        
																	</script>*/ ?>
                                                        <script language="JavaScript1.2" defer>
																	     editor_generate('msg');
																     </script>
                                                        <textarea name="msg" cols="65" rows="15" class='formu' id="msg"></textarea>
                                                      </td>
                                                    </tr>
                                                  </table>
                                                </td>
                                              </tr>
                                              <tr> 
                                                <td> 
                                                  <div align="center"> 
                                                    <input name="op" type="hidden" id="op" value="envia">
                                                    <?/* <input type="submit" name="Submit" value="Enviar"> */ ?>
                                                    <input type="image" name='submit' height=18 src="imagens/bt_confirmar3.gif" width=100 border=0>
                                                  </div>
                                                </td>
                                              </tr>
                                            </table>
                                            <?}?>
                                          </td>
                                        </tr>
                                      </table>
                                    </TD>
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
                  </TD>
                </TR></TBODY></TABLE>

            </TD>
          </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>
</form>
</BODY></HTML>

