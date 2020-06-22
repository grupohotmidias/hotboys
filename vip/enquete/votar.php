<?php
require('traducao/traducoes.php');
verifica_url_traducao();
$get = get();

require('configuracoes/configuracoes.php');
require_once('includes/funcoes.php');
require_once('mobili/mobili.php');

header('Content-type: text/html; charset=utf-8');

require('includes/PaginacaoConteudoClass.php');

		
		#####Página Atual
		(int)$pgAtual = addslashes($get['pag']);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->SiteLink = "cenas.php?cat=$id_categoria";
		$Paginacao->NumPgLaterais = $totalPaginas;
		
		#####consulta total de filmes
		$query = "SELECT * FROM cenas WHERE `exibicao`='Todos' AND status='Ativo'";
		$consulta = mysql_query($query);
		$totalVideos = mysql_num_rows($consulta);
		$totalPaginas = ceil($totalVideos / 21);
		
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;	
		
		#####consulta videos da página
		if($pgAtual == 1){
			$inicio_consulta = '0';
		} else {
			$inicio_consulta = ($pgAtual - 1) * 20;
		}
		
		//Tras todos os videos 
		$query = "SELECT * FROM `cenas` WHERE `exibicao`='Todos' AND status='Ativo' ORDER BY `data` DESC LIMIT $inicio_consulta, 21";
		$consulta = mysql_query($query);
		$total = mysql_num_rows($consulta);

		if($total != 1){
			//header("Location: http://www.hotboys.com.br/home.php");
			//exit();
		}
 		$dados_conteudo = mysql_fetch_array($consulta);
		
?>



<!doctype html>
<html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Videos Hot Boys Gay</title>
<meta charset="UTF-8">
<meta name="description" content="Cenas de Vídeo Bareback Gay Gratis, entre homens  completamente bonitos e gostosos Free. Amadores, Cafuçus e muita putaria gostosa.">
<meta name="keywords" content="video, sexo, bareback, HotBoys, Hot Boys, Gay, gangbang, incesto, homens fudendo">
<meta name="author" content="Hot Boys">
<!-- Header site -->
<?php require_once ('includes/head.php'); ?>


</head>

<body>
<?php require_once ('top.php'); ?>


<div class="content" >
<!-- conteudo -->
<div class="conteudo_page"> 

<h1 class="titulo_conteudo1">Videos Hot Boys </h1>

<div style="420px; margin-left:auto; margin-right:auto">
<iframe width="400" height="250" src="http://www.hotboys.com.br/enquete/index.html"  scrolling="no" seamless frameborder="0" marginheight="0" marginwidth="0" style="empty-cells: hide;">
  <p>Your browser does not support iframes.</p>
</iframe>
</div>

</div> <!-- End conteudo --> 
<!--fotter -->
<?php require_once ('footer.php'); ?>

</div><!-- End content -->

</body>
</html>