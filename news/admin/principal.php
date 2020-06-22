<?
session_start();
if (empty($_SESSION['usuario_id'])){
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

<HTML>
<HEAD>
<title>.:: ADMINISTRA&Ccedil;&Atilde;O ::.</title></HEAD>

<META http-equiv=Content-Type content="text/html; charset=iso-8859-1">

<STYLE type=text/css>.style1 {
	COLOR: #ffffff 
}         
</STYLE>

<BODY bgColor=#6c6c7d leftMargin=0 topMargin=0>
<TABLE cellSpacing=1 cellPadding=0 width='100%' align=center bgColor=#000000 border=0>

  <TBODY>

  <TR>

    <TD bgColor=#d7dbe1>

      <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

        <TBODY> 
        <TR>    
          <TD>  
            <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

              <TBODY>

              <TR>

                <TD width=12>&nbsp;</TD>

                <TD vAlign=middle width=145> 
                  <div align="center">LOGOTIPO</div>
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
                              </font></SPAN><font face="Verdana, Arial, Helvetica, sans-serif" size="2">&nbsp;&nbsp;|&nbsp;&nbsp; 
                              VOCÊ ESTÁ NA ÁREA DO ADMINISTRADOR </font></TD>
                            <TD width=61><a href='logout.php'><IMG height=14 src="imagens/res_bt-sair.gif" width=51 

                              border=0></a></TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                      </TD>
                    </TR>
                    <TR> 
                      <TD align=right 

                        background=imagens/extranet/res_07.gif>&nbsp; </TD>
                    </TR>
                    </TBODY>
                  </TABLE>
                </TD></TR></TBODY></TABLE>

            <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>

              <TBODY>

              <TR>

                <TD align=middle>

                  <TABLE height=200 cellSpacing=0 cellPadding=0 width='100%' bgColor='#f9f9fb' border=0>
                    <TBODY> 
                    <TR> 
                      <TD vAlign=top align=middle height=175> 
                        <TABLE cellSpacing=0 cellPadding=0 width='100%' border=0>
                          <TBODY> 
                          <TR> 
                            <TD 

                            style="BACKGROUND-POSITION: 50% top; BACKGROUND-IMAGE: url(imagens/extranet/hm_tab-degrade.jpg); BACKGROUND-REPEAT: no-repeat" 

                            align=middle> 
                              <TABLE cellSpacing=0 cellPadding=0 width=710 

                              border=0>
                                <TBODY> 
                                <TR> 
                                  <TD colSpan=2 height=19><IMG height=1 width=1> </TD>
                                </TR>
                                </TBODY> 
                              </TABLE>
                              <TABLE cellSpacing=0 cellPadding=0 width=710 

                              border=0>
                                <TBODY> 
                                <TR> 
                                  <TD width=1><IMG height=121 width=1></TD>
                                  <TD width=1><IMG height=121 width=1></TD>
                                  <TD width=1><IMG height=121 width=1></TD>
                                  <TD vAlign=top align=middle width=140> 
                                    <table cellspacing=0 cellpadding=0 width=158 

                                border=0>
                                      <tbody> 
                                      <tr valign=top> 
                                        <td width=25>&nbsp;</td>
                                        <td height=28 width="133"><font face="Verdana, Arial, Helvetica, sans-serif" size="2">NEWSLETTER</font></td>
                                      </tr>
                                      </tbody> 
                                    </table>
                                    <table cellspacing=0 cellpadding=0 width=160 

                                border=0>
                                      <tbody> 
                                      <tr> 
                                        <td width=8>&nbsp;</td>
                                        <td class=hm-tab1tx valign=top><font face="Verdana, Arial, Helvetica, sans-serif" size="2">• 
                                          <a href="newsletter_cadastrar.php"> 
                                          <span class=textos>Cadastrar Email</span></a></font></td>
                                      </tr>
                                      <tr> 
                                        <td width=8>&nbsp;</td>
                                        <td class=hm-tab1tx valign=top><font face="Verdana, Arial, Helvetica, sans-serif" size="2">• 
                                          <a href="newsletter_enviar.php?op=novo"><span class=textos>Enviar 
                                          Mensagem</span></a></font></td>
                                      </tr>
                                      <tr> 
                                        <td width=8>&nbsp;</td>
                                        <td class=hm-tab1tx valign=top><font face="Verdana, Arial, Helvetica, sans-serif" size="2">• 
                                          <a href="newsletter_listar.php"><span class=textos>Listar 
                                          Emails</span></a></font></td>
                                      </tr>
                                      </tbody> 
                                    </table>
                                  </TD>
                                  <TD width=1><IMG height=121 width=1></TD>
                                </TR>
                                </TBODY> 
                              </TABLE>
                            </TD>
                          </TR>
                          </TBODY>
                        </TABLE>
                      </TD>
                    </TR>
                    </TBODY>
                  </TABLE>

                  <BR>
                </TD></TR></TBODY></TABLE>

            
          </TD>
        </TR></TBODY></TABLE></TD></TR></TBODY></TABLE>

</BODY></HTML>

