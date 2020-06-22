<?php
//require('../traducao/traducoes.php');
//verifica_url_traducao();
require('../config/configuracoes.php');
require_once('../includes/funcoes.php');
include('includes/vip.php');

?>

<!DOCTYPE html>
<html lang="pt-br" class="no-js">
<head>
<meta http-equiv="Content-Language" content="pt-br, en">
<meta charset="utf-8">
<title>Hot Boys O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
<meta name="description" CONTENT="Hot Boys Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
<!-- HEAD (Include) -->
<?php include ('../includes/head.php');?>
</head>
<body id="body" class="fundo-branco">
<!-- TOP (Include) -->
<?php include ('../includes/top.php');?>
<div class="text-justify col-md-12 texto-pagina-busca">
<div class="container container-table">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 titulo-pagina-contatotrabalhe">
</div>
</div></div>
<!-- Conteúdo - Cenas -->

<div class="container-tudo" >

<?php 
	
	$query_exe = "SELECT COUNT(*) FROM `usuarios_perfil` LIMIT 1";
	$consulta_exe = mysql_query($query_exe);
	$total_exe = mysql_num_fields($consulta_exe);
	
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]' LIMIT 1";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
?>

	<div class="container-tudo">
		
			<h1 class="contato_email-titulo">Usuário</h1>
			<div class="container">
				<div class="row centralizada">
					<div class="text-justify col-md-9 texto-pagina-contato_trabalhe">
						<div class="container container-table">
							<div class="col-md-12 col-xs-12 contato_email-titulo-conteudo">
								<h2 class="contato_email-titulo-conteudo">Editar Usuário</h2>
							</div>
						</div>
						
						<!-- Comeco do formulário -->
						<form  method="POST" name="form" action="" >  
							<div class="container margin-top-10">
								<div class="row">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-6 col-sm-12 col-xs-12 input-box form-group">	
											<input class="form-control sel1" type="text" name="nome" id="nome" value="<?php echo($dados_user[nome])?> " />
											<span class="unit">Nome:</span>
										</div>
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-6 col-sm-12 col-xs-12 formulario-col-direita input-box form-group">
											<input class="form-control sel1" type="text" name="nome" id="nome" value="<?php echo($dados_user[apelido])?> " />
											<span class="unit-direita">Apelido:</span>
										</div>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<input class="form-control sel1" type="text" name="nome" id="nome" value="<?php echo($dados_user[email])?> " disabled />
										<span class="unit">E-mail*:</span>
									</div>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
										<span>Avatar</span>
										<input type="file" name="nome" id="nome" value="<?php echo($dados_user[foto_perfil])?> " />
										
									</div>
							

									
									<!-- Botão Enviar formulário -->
									<label for="bt-enviar-form">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 botao-vermelho-enviar text-justify">
											<input type="hidden" name="acao" value="Editar"/>
											<div class="envia-contato">
												<input type="submit" value="Editar" name="editar" id="bt-enviar-form"/>
											</div>
										</div>
									</label>
									
									
								</div>
							</div>
						</form><!-- Fim do Formulario -->    
						
						<div id="mensagem-enviada">
							
						</div>
						
						
						
						
					</div>
				</div>
			</div>
		</div><!-- Fim do container-tudo -->
</div>



<!-- FOOTER (Include) -->
<?php include ('../includes/footer.php');?>
<?php include ('../includes/javascript.php');?>

<?php
			require('includes/hotmidias/js.php');
		?>

</body>
</html>
