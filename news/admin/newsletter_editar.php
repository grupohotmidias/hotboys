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

<STYLE type=text/css>.titulos {
	FONT-SIZE: 16px; COLOR: #b09014; FONT-FAMILY: Arial, Helvetica, sans-serif
}
</STYLE>

<title>.:: ADMINISTRA&Ccedil;&Atilde;O ::.</title></HEAD>

<BODY bgColor=#6c6c7d leftMargin=0 topMargin=0>

<form action="script_newsletter.php?acao=editar" Method="post">
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

            <TABLE class=res-bg cellSpacing=0 cellPadding=0 width=775 border=0><TBODY>

              <TR>

                <TD align=middle>

                    <TABLE cellSpacing=0 cellPadding=0 width=747 border=0>
                      <TBODY> 
                      <TR> 
                        <TD><IMG height=2 

                        src="imagens/extranet/res_linhas.gif" 

                      width=747></TD>
                      </TR>
                      <TR> 
                        <TD align=middle height=30> 
                          <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif" size="1">efetue 
                            abaixo o cadastro de um novo email.</font></div>
                        </TD>
                      </TR>
                      <TR> 
                        <TD> 
                          <TABLE cellSpacing=0 cellPadding=0 width=747 border=0>
                            <TR> 
                              <TD vAlign=bottom> 
                                <TABLE cellSpacing=0 cellPadding=0 width="100%" bgColor=#4fa9c7 border=0>
                                  <TBODY> 
                                  <TR> 
                                    <TD width=10>&nbsp;</TD>
                                    <TD width=665><STRONG><FONT color=#ffffff> 
                                      <font face="Verdana, Arial, Helvetica, sans-serif" size="2">CADASTRAR 
                                      EMAIL</font></FONT></STRONG></TD>
                                    <TD align=right width=14>&nbsp;</TD>
                                  </TR>
                                  </TBODY> 
                                </TABLE>
                              </TD>
                            </TR>
                            <TR> 
                              <TD bgColor=#ffffff valign="top"> 
                                <TABLE cellSpacing=0 cellPadding=4 width="100%" border=0>
                                  <TBODY> 
                                  <TR> 
                                    <TD valign="top"> 
                                      <?

                    $id_newsletter = $_GET['id_newsletter'];

					$query = "select * from tbl_newsletter where idemail = '$id_newsletter'";

					$rs = mysql_query ($query);

					$campo = mysql_fetch_array($rs);

					$idemail = $campo['idemail'];
					$email   = $campo['email'];


				?>

                                                        <table width="500" border="0" align="center" cellpadding="3" cellspacing="3">

                                                          <tr> 

                                                            <td valign="top"> 

                                                              <table width="100%" border="0" cellpadding="3" class="textoPretoBold">

                                                                <tr bgcolor="#D9ECFF"> 

                                                                  <td width="62%" bgcolor="#D9ECFF" class="textoMenor"><font size="2" face="Verdana, Arial, Helvetica, sans-serif">E-Mail</font></td>

                                                                </tr>

                                                                <tr bgcolor="#F2F9FF"> 

                                                                  <td bgcolor="#F2F9FF" class="texto" width="62%"> 

                                                                    <input name="emailz" type="text" class="formu" id="emailz" value="<?= $email; ?>" size="55">

                                                                  </td>

                                                                </tr>

                                                              </table>

                                                            </td>

                                                          </tr>

                                                          <tr> 

                                                            <td>

                                                              <div align="center"> 

                                                                <input name="id_newsletter" value="<?= $idemail; ?>" type="hidden">

                                                                
                                              <INPUT type=image height=18 width=100 src="imagens/bt_confirmar3.gif" border=0 name='submit'>
                                                                </div>

                                                            </td>

                                                          </tr>

                                                        </table>

                                                        

                                                      </TD>
                                  </TR>
                                  </TBODY> 
                                </TABLE>
                                <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                                  <TBODY> 
                                  <TR> 
                                    <TD>&nbsp; </TD>
                                  </TR>
                                  </TBODY> 
                                </TABLE>
                              </TD>
                            </TR>
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

