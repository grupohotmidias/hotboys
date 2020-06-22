<?php
	require_once('config/configuracoes.php');
	
	$email = addslashes($_GET[email]);
	
	$query_newletter = "SELECT * FROM `mysubscribers` WHERE email='$email' LIMIT 1";
	$consulta_newletter = mysql_query ($query_newletter);
	$dados_newletter = mysql_fetch_array($consulta_newletter);
	$total_newletter = mysql_num_rows($consulta_newletter);
?>

<!-- tabela topo -->
<table class="topo" style="font-family: 'Baloo Bhaijaan',cursive; border-collapse: collapse; border-spacing: 0;" width="400" align="center" bgcolor="#f6f6f6"><!-- topo -->
	<thead>
		<tr>
			<td style="padding-bottom: 15px; padding-top: 15px; background-color: #050505;" align="center"><a style="color: #ffffff; text-decoration: none;" href="https://www.hotboys.com.br" target="_blank"> <img src="https://www.hotboys.com.br/imagens/logos/logo-topo-escuro.png" alt="logo hotboys no topo" /> </a></td>
		</tr>
		<tr>
			<td style="background-color: #e31330;" height="40">
				<p style="text-align: center; font-size: 13px; color: #ffffff; text-decoration: none;"><a style="margin-right: 25px; color: #ffffff; text-decoration: none; font-weight: bold;" title="Cenas" href="https://www.hotboys.com.br/videos" target="_blank">CENAS</a> <a style="margin-right: 25px; color: #ffffff; text-decoration: none; font-weight: bold;" title="Modelos" href="https://www.hotboys.com.br/modelos" target="_blank">MODELOS</a><strong> <a style="margin-right: 25px; color: #ffffff; text-decoration: none; font-weight: bold;" title="S&eacute;ries" href="https://www.hotboys.com.br/series" target="_blank">S&Eacute;RIES</a></strong> <a style="margin-right: 25px; color: #ffffff; text-decoration: none; font-weight: bold;" title="Contatos" href="https://www.hotboys.com.br/contato" target="_blank">CONTATOS</a></p>
			</td>
		</tr>
		<tr class="assineja" style="background-color: #b50c24;">
			<td colspan="2">
				
				<p style="text-align: center; color: #fbbc02; text-decoration: none;"><strong><a href="https://www.hotboys.com.br/assine" target="_blank" style="color:#fbbc02;text-decoration:none">ASSINE J&Aacute;</a></strong></p>
			</td>
		</tr>
	</thead>
</table>
<!-- tabela conteudo -->
<table class="conteudo" style="background-color: #ffffff; margin-bottom: 12px; border-collapse: collapse; border-spacing: 0; font-family: 'Baloo Bhaijaan',cursive;" width="400" align="center"><!-- conteudo -->
	<tbody>
		<tr>
			<td height="239">
				<a href="https://www.hotboys.com.br/cena/335/dando-o-cuzinho-no-terreno-baldio" target="_blank">
					<img src="http://www.hotboys.com.br/admin/newsletter/arquivos/1535743552-383-.jpg" alt="" width="400" height="239" />
				</a>
			</td>
		</tr>
		<tr>
			<td style="text-align: center; text-transform: uppercase; font-size: 17px;"><strong> 
				
				<a href="https://www.hotboys.com.br/cena/335/dando-o-cuzinho-no-terreno-baldio" target="_blank" style="color: black; text-decoration: none!important;" href="#">Dando o Cuzinho no terreno Baldio</a>
			</strong></td>
		</tr>
		<tr>
			<td style="font-family: arial; padding-left: 10px; padding-right: 10px; font-size: 13px;">Fetiches e desejos movem nossos pensamentos a todo momento, e logo o site HotBoys traz com exclusividade Petrick Garcias. Ele &eacute; muito tarado, tem um rabo bem grande e um tes&atilde;o fora do normal. Atra&iacute;do pelo pirocudo Chris Neg&atilde;o, que n&atilde;o &eacute; de bobeira e adora fuder um cuzinho, resolveram saciar seus desejos em um terreno baldio. Ai voc&ecirc;s sabem o desenrolar dessa hist&oacute;ria. Muita putaria, chupa&ccedil;&atilde;o, pirocadas e gozadas, pois para site mais quente da net, n&atilde;o tem hora e nem local, o neg&oacute;cio &eacute; prazer e satisfa&ccedil;&atilde;o. <br /><br /> ASSINE j&aacute;! e confira essa cena bem quent&iacute;ssima, deixe seu coment&aacute;rio, e aproveite para conferir todos nossos sucessos do site.</td>
		</tr>
	</tbody>
</table>
<table class="rodape" style="background-color: #050505; border-collapse: collapse; border-spacing: 0; font-family: 'Baloo Bhaijaan',cursive;" width="400" align="center"><!-- rodape -->
	<tfoot style="background-color: #050505;">
		<tr>
			<td>&nbsp;</td>
			<td style="background-color: #050505; color: white; text-align: center; line-height: 15px; font-size: 13px; padding-top: 12px;" width="150"><a style="text-decoration: none!important;" href="https://www.hotboys.com.br/newsletter/sair.php?<?php echo $dados_newletter[email]; ?>" target="_blank"> <span style="color: #ffffff;"> Para remover seu</span> <br /> <span style="color: #ffffff;">e-mail clique</span><br /></a>
				<h1 style="color: #e31330; font-size: 22px; margin-top: 4px;">AQUI</h1>
			</td>
			<td width="250"><a href="https://hotboys.com.br"> <img style="width: 100%; float: right;" src="http://hotmidias.com.br/imagens/hotboys/newsletter/logo-hotboys-rodape.jpg" alt="logo hotboys no rodape" /></a></td>
		</tr>
	</tfoot>
</table>
<!-- fim tabela -->