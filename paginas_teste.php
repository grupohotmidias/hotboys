<?php
	require('config/configuracoes.php');
	require('includes/funcoes.php');
	//class paginação
	
    $query_pagina = "SELECT * FROM paginas WHERE status='ativo' AND exibicao='todos'";
    $consulta_pagina = mysql_query($query_pagina);
    $dados_pagina = mysql_fetch_array($consulta_pagina);
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title>Política de Privacidade - Site HotBoys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="keywords"
		content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description"
		CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
		
		
		<script language="JavaScript" src="js/select-estado-cidade.js"></script>
		
		<script src='https://www.google.com/recaptcha/api.js'></script>
		
		<!-- HEAD (Include) -->
		<?php include('includes/head.php') ?>
		
	</head>
	<body id="body" class="fundo-pret">
		
		<!-- TOP (Include) -->
		<?php include('includes/top.php') ?>
		<div class="container-tudo">
			
			<!-- Título H1 da pagina -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<h1 class="contato_trabalhe-titulo"><?php echo $dados_pagina[titulo] ?></h1>
			</div>
			
			<div class="container">
				<div class="row centralizada">
					<div class="text-justify col-md-9 texto-pagina-contato_trabalhe">
						<div class="container container-table">
                            <?php
								
								
                                echo $dados_pagina[html];
                                
							?>
                            
						</div>
					</div>
				</div>
			</div><!-- Fim do container-tudo -->
			
			<!-- FOOTER (Include) --> 
			<?php include('includes/footer.php') ?>
			
			<!-- JAVASCRIPTS PADROES (Include) -->					
			<?php 
				if ($detect->isMobile()) { 
					include ('includes/javascript-mobile.php'); 
					}else{
					include ('includes/javascript.php'); 
				}
			?>
			
		</body>
	</html>	