<?php
	session_start();
	
	require_once('config/configuracoes.php');
	require_once('includes/funcoes.php');
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	//Caso o cookie esteja vazio e seja desktop, carrega a pagina de entrada(+18 anos)
	if ($detect->isMobile()) { 
		
		}else{
		//Cookie que carrega a pagina de entrada = verificacao de idade
		if(@$_COOKIE['verificacao_idade'] != 'sim'){
			
			header('Location: home/');
		} }
		
?>
<!DOCTYPE html>
<html lang="pt-br" class="no-js">
	<head>
		<!-- Titulo no navegador -->
		<title>Votação - Audições Hot 3 - Hotboys.com.br</title>
		<!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="Content-Language" content="pt-br, en">	
		<meta name="keywords" content="Bareback video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
		<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo dos garotos mais gostosos do Brasil">
		<!-- HEAD (Include) -->
		<?php include ('includes/head.php'); ?>
		
	</head>
	<body id="body" class="fundo-preto" style="background-image: url(../imagens/audicoes/fundo-formulario-audicoes.jpg)!important;">
		<div class="container">
			
			
			
			<div class="row" style="float:left;width:100%;margin-top:5px">
				
				
				<!-- Acima do conteudo da pagina -->
				<div class="row" style="width:100%;float:left;background-color: #010101;margin-top: 30px;margin-bottom: 30px;padding-top: 15px;padding-bottom: 20px;">
					
					<!-- imagens circulos dos participantes -->
					<div class="col-lg-9 col-md-11 texto-pagina-contato_trabalhe">
						<img src="<?php echo URL ?>imagens/audicoes/participantes/participantes-circulos.jpg" style="width:100%"/>
					</div> 
				</div>
				
				<div class="col-md-12 col-xs-12">
					
					<!-- Imagem - logo da votação -->
					<div class="col-lg-9 col-md-11 texto-pagina-contato_trabalhe">
						<div class="col mx-auto text-center">
							<img src="<?php echo URL ?>imagens/audicoes/votacao/logo-votacao-audicoes.png"/>
						</div>
					</div>
					
					
		
		
				</div>
				
		
		<div class="col-lg-9 col-md-12 texto-pagina-contato_trabalhe">
			<div class="col-lg-12 col-xs-12">
				<h1 style="margin-top: 37px!important;margin-bottom: 37px!important;color:white;text-align: center;margin: 0 auto;float: none;">Vem aí o  Reality Show mais quente da net! “As Audições Hot 3”.</h1>
				
				<div class="col-lg-9 col-md-9 col-xs-11 texto-pagina-contato_trabalhe">
				<p>Se preparem para muito glamour, festas badaladas de tirar o fôlego, disputas quentíssimas, homens maravilhosos, além de muito, mais muito sexo.	</p>
				<p>Em breve vocês conhecerão os 8 candidatos que selecionamos, que vão tacar fogo nesse parquinho de diversões sexual. Porém o site Hotboys resolveu dar a chance a mais 2 gostosos de entrar nesse jogo. E deixamos pra vocês clientes VIP, a escolha desses 2 participantes. Afinal contamos vocês a todo momento, para traçar os rumos dessa competição, assim revelar as 2 novas ESTRELAS EXCLUSIVAS do site Hotboys.</p>
				<p>Fique calmo! O jogo ainda não começou, precisamos que você decida. Qual ATIVO e qual PASSIVO você quer ver nessa disputa?</p>
				<p>Escolha com cuidado, pois você só poderá votar 1 única vez, para cada posição.</p>
				<p>Assista ao vídeo dos candidatos e em seguida dê seu voto. Pois o site Hotboys se rendeu a submissão, e você nosso cliente VIP está no controle!</p>
			</div>
			
			
			<div id="enquete-index">
				<form id="form_enquete" name="form_enquete" method="post" onSubmit="xajax_votar(xajax.getFormValues('form_enquete')); return false;">
				<?php	
						
							//pega infos da enquete
							$queryEnquete = "SELECT * FROM `enquetes` WHERE id='$idEnquete'";
							$consultaEnquete = mysql_query($queryEnquete);
							$linha = mysql_fetch_array($consultaEnquete);
						?>
						<div class="col-lg-12 col-xs-12">
							<h1 class="pergunta" style="font-size:2em;margin-top:50px;margin-bottom:25px;text-transform: uppercase;"><span class="icone-pimenta-titulo"></span> Ativo</h1>
						</div>
						
						
						
						<div class="col-lg-12 col-xs-12 alternativas">
							<?php
								//consulta alternativas
								$queryAlternativas = "SELECT * FROM `enquetes_alternativas` WHERE id_enquete='$linha[id]' order by id";
								$consultaAlternativas = mysql_query($queryAlternativas);
									
								?>
							<!-- Caio Gaspar -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Sao Paulo - SP</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/e1b06_Caio-Gaspar.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado1" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Caio Gaspar</h2>
								<a href="#" data-toggle="modal" data-target="#caiogaspar">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;"> Assine e veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;"> Assine e veja as fotos</div>
								</a>
							</div>
							
							
							<!-- Fabricio Silva -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Mesquita - RJ</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/34feb_fabricio-silva.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado2" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Fabricio Silva</h2>
								<a href="#" data-toggle="modal" data-target="#fabricio">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							
							<!-- Junior Almeida -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Curitiba - PR</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/ef251_Junior-Almeida.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado3" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Junior Almeida</h2>
								<a href="#" data-toggle="modal" data-target="#junioralmeida">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							
							<!-- Gustavo Nutella -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Rio de Janeiro - RJ</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/2b30f_Gustavo-Nutella.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado4" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_<?php echo $linha[id] ?>" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Gustavo Nutella</h2>
								<a href="#" data-toggle="modal" data-target="#nutella">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							<div class="col-lg-12 col-xs-12">
							<h1 class="pergunta" style="font-size:2em;margin-top:50px;margin-bottom:25px;text-transform: uppercase;"><span class="icone-pimenta-titulo"></span> Passivo</h1>
						</div>
						
							<!-- Max Ford -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Rio de Janeiro - RJ</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/80758_Max-Ford.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado5" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_21" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Max Ford</h2>
								<a href="#" data-toggle="modal" data-target="#maxford">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							<!-- Caio Rodrigues -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Vila Velha - ES</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/9e9ae_caio-rodirgues.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado6" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_21" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Caio Rodrigues</h2>
								<a href="#" data-toggle="modal" data-target="#caiorodrigues">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							<!-- Riicky -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Recife - PE</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/895ba_Riicky.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado7" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_21" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Riicky</h2>
								<a href="#" data-toggle="modal" data-target="#riicky">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							
							<!-- Lucas Rodrigues -->
							<div class="col-lg-3 col-xs-3  alternativa">
								<label>
									<div class="col-lg-12 col-xs-12" onclick="show<?php echo $counter2++ ?>()">
										<span style="position: absolute;color: white;z-index: 99;bottom: 10px;background-color: #00000070;padding: 3px;font-size: 14px;width: 100%;text-align: center;">Sao Gonçalo - RJ</span>
										
										<img class="foto" id="foto<?php echo $counter3++ ?>" src="https://server2.hotboys.com.br/arquivos/9c549_Lucas-Rodrigues.png" style="-webkit-filter: grayscale(100%);filter: grayscale(100%);"/>
										
										<img src="<?php echo URL ?>imagens/audicoes/pre-candidatos/icone-voto.png" id="selecionado8" style="visibility:hidden">
									</div>
									<input type="radio" name="enquete_21" value="<?php echo $linhaAlternativa[id] ?>"/>
								</label>
								<h2 style="text-align: center;margin: 0 auto;color: #e31330;margin-top: -12px;font-size: 17px;">Lucas Rodrigues</h2>
								<a href="#" data-toggle="modal" data-target="#lucasrodrigues">
									<div class="col-lg-12 col-xs-12" style="background-color: #df2137;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja o vídeo</div>
								</a>
								<a href="#">
									<div class="col-lg-12 col-xs-12" style="background-color: #3a3838;width: 75%;margin: 0 auto;float: none;text-transform: uppercase;color: #ffffff;font-family: 'Baloo Bhaijaan',cursive, sans-serif;line-height: 23px;margin-top: 5px;text-align: center;">Veja as fotos</div>
								</a>
							</div>
							
							
						</div>
					
					<div id="botao">
						<input type="submit" value="Votar" />
					</div>
				</form>
			</div>
		</div>
		</div>
		
				
				<!-- Modal - Caio Gaspar -->
					<div class="modal fade" id="caiogaspar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Caio Gaspar</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/1dvrsk1dc83uukv" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>

								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
		
		
		<!-- Modal - Fabricio Silva -->
					<div class="modal fade" id="fabricio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Fabrício Silva</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/e1e21m1dc83uulo" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
		
		
				<!-- Modal - Junior Almeida -->
					<div class="modal fade" id="junioralmeida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Junior Almeida</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/j5bsaq1dc83uulp" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Modal - Gustavo Nutella -->
					<div class="modal fade" id="nutella" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Gustavo Nutella</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/q6r11i1dc8egqh5" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Modal - Max Ford -->
					<div class="modal fade" id="maxford" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Max Ford</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/1v336c1dc83uulr" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
							
					<!-- Modal - Caio Rodrigues -->
					<div class="modal fade" id="caiorodrigues" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Caio Rodrigues</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/mt0ss91dc83uuln" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					
					<!-- Modal - Riicky -->
					<div class="modal fade" id="riicky" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Riicky</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/ha4hq71dc83uuls" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
					
						<!-- Modal - Lucas Rodrigues -->
					<div class="modal fade" id="lucasrodrigues" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel" style=" margin-top:12px;">Video do Lucas Rodrigues</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<iframe src="https://player.jmvstream.com/qAGjxuwNoNQIj2i9kkVHgLMIxUuMu7/igm0751dc83uulq" allowfullscreen allow="autoplay; fullscreen" frameborder="0" width="100%" height="360" ></iframe>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
								</div>
							</div>
						</div>
					</div>
				
				
			</div>
			
		
		
		
		<!-- FOOTER (Include) -->
		<?php include ('includes/footer.php')?>
		
		
		<!-- JAVASCRIPTS PADROES (Include) -->	
		<?php 
			if ($detect->isMobile()) { 
				include ('includes/javascript-mobile.php'); 
				}else{
				include ('includes/javascript.php'); 
			}
		?>
		
		
		
		
		
		<!-- Carousel Mobile de Modelos -->
		<script>
			jQuery3211(document).ready(function ($) {
				$(function() {
					
					$('#myCarousel').carousel({
						interval: 4000,
						cycle: true
					})
					console.log($('#myCarousel .item'))
					$('#myCarousel .item').each(function() {
						
						var next = $(this).next();
						console.log(next);
						if (!next.length) {
							next = $(this).siblings(':first');
						}
						next.children(':first-child').clone().appendTo($(this));
						
						if (next.next().length > 0) {
							next.next().children(':first-child').clone().appendTo($(this));
							} else {
							$(this).siblings(':first').children(':first-child').clone().appendTo($(this));
						}
					})
				})
			});
		</script>
		
		</div>
	</body>
</html>											