 <?php
	require_once('config/configuracoes.php');
	require_once('includes/funcoes.php');  
	
	//CONSULTA DA TABELA MODELO DE ENTRADA
    $query_modelo_entrada = "SELECT * FROM `modelo_pop_up` WHERE status='Ativo' order by RAND()";
    $consulta_modelo_entrada = mysql_query($query_modelo_entrada);
    $dados_modelo_entrada = mysql_fetch_array($consulta_modelo_entrada);
	
	
	require_once('geoplugin.class.php');

	$geoplugin = new geoPlugin();

	$geoplugin->locate();

?>
<!DOCTYPE html>
<html lang="pt-br">
	<html class="no-js">	
		
		<head>		
			<meta charset="utf-8">
			<meta http-equiv="Content-Language" content="pt-br, en">
			<title>HOTBOYS O Site Mais Quente da Net - Seu Mundo Mais Prazeroso</title>		
			<meta name="viewport" content="width=device-width, user-scalable=no">	
			<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">		
			<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">		
			<style>
				a{color:#e31330!important;}
				a:hover{text-decoration:underline!important}
				.modal-backdrop{display:none}
			</style>
			
			
			<!-- HEAD (Include) -->		
			<?php include ('includes/head.php')?>	
		</head>	
		
		<body id="agreementPopupContainer" class="fundo-preto" style="color:black!important">	
			
			<!-- TOPO (Include) -->
			<?php include ('includes/top-entrada.php')?>
			
			
			
			
			
			<div class="container tudo" style="background-color: white;">
				
				
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:left;width: 100%;background-size: contain;">
					
					<!-- Imagem de entrada -->
					<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_entrada['imagem_pop_up']?>" style="width:100%;"/>
					
					
					
					
					<!-- Conteudo -->
					<div class="col-lg-7 col-md-7 mx-auto text-justify" style="margin:0 auto;text-align:center;float:none!important; ">
						<div class="col-lg-12 col-md-12" style="font-size:25px;color:#e31330;margin-top:20px"> O SITE MAIS QUENTE DA NET!</div>
						
					<div class="col-lg-12 col-md-12" style=" display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center; ">
					
					<!-- Link do Botão Entrar -->
					<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
					<a href="/" onclick="document.cookie='verificacao_idade=sim; expires=<?php echo $dataExpiracaoCookie ?>; path=/;'">
					
					<!-- Botão Entrar -->
					<div class="col-lg-3 col-md-3 botao-vermelho-enviar mx-auto text-justify" style="font-size:25px;padding: 10px;width: 100%;margin-top: 23px;margin-bottom: 15px!important;border-radius:6px;"> Entrar <span style="
					font-size: 16px;
					">+ 18 anos</span></div>
					</a>
					</div>
					
					<?php /* if(isset($geoplugin->countryName) && $geoplugin->countryName != 'Brazil' && $geoplugin->countryName != ''){ ?>
					<div class="col-lg-12 col-md-12" style=" display: -ms-flexbox; display: flex; -ms-flex-pack: center; -ms-flex-pack: center; justify-content: center; -ms-flex-align: center; align-items: center; ">
					
					<!-- Link do Botão Entrar -->
					<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
					<a href="/en" onclick="document.cookie='verificacao_idade=sim; expires=<?php echo $dataExpiracaoCookie ?>; path=/;'">
					
					<!-- Botão Entrar -->
					<div class="col-lg-3 col-md-3 botao-vermelho-enviar mx-auto text-justify" style="font-size:25px;padding: 10px;width: 100%;margin-top: 23px;margin-bottom: 15px!important;border-radius:6px;"> Enter <span style="
					font-size: 16px;
					">+ 18 years</span></div>
					</a>
					</div>
					<?php } */ ?>
					
					<a href="/blog">
					<div class="col-lg-12 col-md-12" style=" margin-top: 5px; margin-bottom: 15px;color:black;">Não quero entrar no site</div>
					</a>
					
					<div class="col-lg-12 col-md-12" style="font-family: 'Open Sans',sans-serif;line-height: 24px;margin-top: 10px;margin-bottom: 25px;text-align: left;font-size: 14px;padding-top: 14px;font-weight: bold;">
					<p style="padding: 0 0 20px;">
					Este site contém materiais com restrição de idade. Se você é menor de 18 anos, ou menor de idade no local de onde você está acessando este site, você não tem autorização ou permissão para entrar neste site ou acessar qualquer um dos seus materiais.</p>
					
					<p style="padding: 0 0 20px;">Se você tem mais de 18 anos ou mais de idade no local de onde você está acessando este site, entrando no site você concorda em cumprir com todos os <a href="https://www.hotboys.com.br/termos-de-uso" style="font-weight:bold;color:#e31330!important;">Termos de uso e condições</a>. Você também reconhece e concorda que não é ofendido por nudez e representações explícitas de atividade sexual.</p>
					
					<p style="padding: 0 0 20px;">Ao clicar no botão "Entrar", e ao entrar neste site, você concorda com todos os itens acima e certifica, sob pena de perjúrio, que você é um adulto.</p>
					
					<p style="padding: 0 0 20px;">Se você deseja os caras mais gostosos da net em cenas quentissimas, o site HotBoys é o único lugar para se estar. Mais 3000 horas de putaria que vai te levar à loucura, em filmes hardcore em HD. Pornô gay cheio de profundas penetrações anal, gozadas, histórias sexuais, é apenas um pouco do que te espera aqui. Levar sensações de puro prazer e tesão é o que fazemos de melhor.
					Quando você experimentar nosso site, terá muitos orgasmos, você voltará inúmeras vezes. As maratonas de foda são inigualáveis ​​e rotineiras no Hotboys, com lançamentos semanais, tornando-se, de longe, o site mais quente da net. Então, o que você está esperando?
					</p>
					
					</div>
					</div>
					
					
					
					
					
					</div>
					</div>
					</div><!-- Fim do container tudo -->
					
					<!-- FOOTER (Include) -->	
					<?php include ('includes/footer-entrada.php')?>		
					
					<!-- JAVASCRIPTS PADROES (Include) -->					
					<?php include ('includes/javascript.php');?>
					
					</body>
					</html>																																																							