<?php 
	session_start();
	require_once('../config/configuracoes.php');
	require_once('../includes/funcoes.php');
	
	
    // Detecta a resolucao do cliente - Mobile ou Computador //
	require_once ('../mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	
	$id = addslashes($_GET[id]);
	
	$query_publicidade = "SELECT * FROM `cliques_banners` WHERE id='$id' LIMIT 1 ";
	$consulta_publicidade = mysql_query($query_publicidade);
	$total_publicidade = mysql_num_rows($consulta_publicidade);
	
?>


<!DOCTYPE HTML>
<html lang="en-US">
	<head>
		<meta charset="UTF-8">
		<title></title>
		<style type="text/css">
			iframe.publicidade-video{
			width:350px!important;
			height:250px!important;
			max-width: auto!important;
			overflow-y: hidden;
			border:0;
			}
			video{width:100%}
		</style>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	</head>
	<body>
		
	
		<?php
			while ($dados_publicidade = mysql_fetch_array($consulta_publicidade)){
				
				//verifica o site cadastrado e faz o link
				if($dados_publicidade[site]=='hotboys'){
					$url_publicidade = 'http://www.hotboys.com.br/';
				}
				
				if($dados_publicidade[site]=='solohot'){
					$url_publicidade = 'http://www.solohot.com.br/';
				}		
		?>
			
			<a href="<?php echo $url_publicidade.'p/'.$dados_publicidade[id]?>" target="_blank">
			
			<?php if ($detect->isMobile()) { ?>
				<img src="//server2.hotboys.com.br/arquivos/<?php echo $dados_publicidade['imagem_banner'] ?>"/>
			
			<?php }else{ ?>
			
				<?php if($dados_publicidade['video_preview'] != '') { ?>
					<video autoplay playisnline loop muted> <source src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_publicidade['video_preview'] ?>"></video>
					
					<?php }else{ ?>
					<img src="//server2.hotboys.com.br/arquivos/<?php echo $dados_publicidade['imagem_banner'] ?>"/>
					
				<?php } ?>
				</a>
			<?php } } ?>
		
			
	</body>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</html>