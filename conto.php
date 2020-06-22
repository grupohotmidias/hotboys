<?php	
	require('config/configuracoes.php');
	require_once('includes/funcoes.php');
	
	header('Content-Type: text/html; charset=utf-8');
	
	$id = addslashes($_GET[id]);
	
	$query="SELECT * FROM contos_hot WHERE id='$id' limit 1";
	$consulta=mysql_query($query);
    $row=mysql_fetch_array ($consulta);	
	
	if($row[descricaoContent]==""){
		$texto = $row[texto];
		$description = substr($texto ,0,156);
		}else{
		$texto = $row[descricaoContent];
		$description = substr($texto ,0);
	}
	
	
?>


<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	
	<head>		
		<meta http-equiv="Content-Language" content="pt-br, en">
		<title><?php echo utf8_encode($row['titulo']) ?> - Contos Eróticos HotBoys</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">		
		<meta name="description" CONTENT="<?php echo utf8_encode(strip_tags($description));?>">	
		
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		
		<script>
            $(document).ready(function() {
                setTimeout(function(){
                    request = $.ajax({
                        url: "<?php echo URL ?>ajax/registrar-visitas.php",
                        type: "post",
                        data: {
                            'idConteudo':  '<?=$dados_conteudo[id];?>',
                            'tipoConteudo':  'Conto',
                            <?php if($dados_conteudo[tag_principal]!=""){?>
								'emailCliente':  '<?=$_SESSION[email_cliente_logado]?>',                            
								'tag': '<?=$dados_conteudo[tag_principal];?>'
								<?php }else{ ?>
								'emailCliente':  '<?=$_SESSION[email_cliente_logado]?>'
							<?php }?>
						}
					});
				}, 30000);
			});
		</script>
		
		<!-- HEAD (Include) -->		
		<?php include ('includes/head.php')?>		
		
	</head>	
	
	<body id="body" class="fundo-preto">	
		<!-- TOP (Include) -->		
		<?php include ('includes/top.php')?>		
		
		<div class="container-tudo" style="min-height:auto!important"><!-- Inicio do container-tudo -->	
			
			<!-- Título H1 do conteúdo -->		
			<div class="container" >			
				<div class="row">				
					<div class="col-lg-12 col-sm-12 col-xs-12">					
						<h1 class="conto-titulo" style="border-left:0!important;padding-left:0!important">
						<span class="icone-pimenta-titulo"></span><?php echo utf8_encode('CONTO ERÓTICO') ?></h1>					
					</div>				
				</div>			
			</div>		
			
			<div class="container container-table" >					
				<div class="row centralizada">						
					<div class="text-justify col-lg-9 col-md-9 col-sm-11 col-xs-11 texto-pagina-contos">
						
						<!-- Banner do Conto -->
						<div class="container " >
							<?php
                                $query="SELECT * FROM contos_hot WHERE id=$id limit 1";
                                $consulta=mysql_query($query);
							?>
							<div class="row">	
								<?php
									while ($row=mysql_fetch_array ($consulta))
									{
									?>
									<div class="col-lg-12 col-sm-12 col-xs-12 text-justify conto-banner-topo">
										<?php 
											// Se o conto nao tiver imagem cadastrada, puxa imagem de outro conto
											if($row['img'] =='') { 
												
												// puxa o banco e consulta 
												$query_img_conto = "SELECT * FROM `contos_hot` order by RAND()";
												$consulta_img_conto = mysql_query($query_img_conto);
												$linha_img_conto = mysql_fetch_array($consulta_img_conto);
												$total_img_conto = mysql_num_rows($consulta_img_conto);
												
											?>
											
											<img class="card-img-top-contos" src="https://server2.hotboys.com.br/arquivos/<?php echo $linha_img_conto['img'] ?>" alt="imagem conto">
											
											
											<?php 
												// caso contrario, carrega a imagem cadastrada junto com o conto
											}else{ ?>
											
											<img class="card-img-top-contos" src="https://server2.hotboys.com.br/arquivos/<?php echo $row['img'] ?>" alt="imagem conto">
											
										<?php } ?>
										
										<div class="paginas-titulo-visualizacoes contos-home">
											<h4 class="paginas-titulo">
												
													<?php echo utf8_decode($row['titulo']) ?>
												
											</h4>
										</div>
									</div>
								<?php } ?> 
							</div>			
						</div>	
						
						<!-- Conteúdo - Cenas -->		
						<div class="container" >			
							
							<!-- Título do Conto -->			
							<!-- PHP Cenas -->			
							<?php 				
								$query="SELECT * FROM contos_hot WHERE id=$id order by id desc limit 1";				
								$consulta=mysql_query($query);
								$row=mysql_fetch_array ($consulta);							
								
							?>			
							<div class="row conto-texto-conteudo">				
								<?php					
								?>					
								
								<?php echo utf8_encode($row['texto']); ?> 
								
							</div>		 				
						</div>					
						
					</div>				
				</div>
			</div>	
		</div><!-- Fim do container-tudo -->
		
		
		<!-- Comentários (Include) -->		
		<?php include ('includes/comentarios.php') ?>		
		
		<!-- FOOTER (Include) -->		
		<?php include ('includes/footer.php') ?>
		
		<!-- JAVASCRIPTS PADROES (Include) -->					
		<?php 
			if ($detect->isMobile()) { 
				include ('includes/javascript-mobile.php'); 
				}else{
				include ('includes/javascript.php'); 
			}
		?>
		
		<?php //adiciona 1 visita no campo visualizacoes quando acessado
			$query_visita = mysql_query("UPDATE contos_hot SET visualizacao = visualizacao + 1 WHERE id='$id' ") or die(mysql_error());
		?>
		
	</body>	
</html>																																					