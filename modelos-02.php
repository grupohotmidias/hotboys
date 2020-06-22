<?php	
	require('config/configuracoes.php');	
	require_once('includes/funcoes.php');	
	//Recebe variavia via GET
	//class paginação
	include('includes/PaginacaoConteudoClass.php');	
	
	$s = addslashes($_GET[s]);	
	$l = addslashes($_GET[l]);
	$pag = addslashes($_GET[pag]);
    $tags = addslashes($_GET[tags]);
	
    $tags = explode("-",$tags); 
    $tags = implode(" ",$tags);
	
    //SE HOUVER TAG
	if($tags != ''){
		/*	
		//SE NAO FOR CONSULTA
		#####Página Atual
		(int)$pgAtual = addslashes($pag);
		if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		
		#####consulta total de filmes
		$query_paginacao = "SELECT * FROM modelos WHERE `exibicao`='Todos' AND status='Ativo' $complemento";
		$consulta_paginacao = mysql_query($query_paginacao);
		$totalVideos_cena = mysql_num_rows($consulta_paginacao);
		$totalPaginas = ceil($totalVideos_cena / 24);
		
		$Paginacao->SiteLink = ''; 
		#####paginação
		$Paginacao = new Paginacao;
		$Paginacao->NumPgLaterais = $totalPaginas;
		//$Paginacao->SiteLink = URL.$idioma.'/videos/'.$s;
		
		$Paginacao->SiteLink = URL.'tags/'.$tags;
		
		#####consulta videos da página
		#####consulta videos da página 
		
		if($pgAtual == 1){
			$inicio_consulta = '0';
			} else {
			$inicio_consulta = ($pgAtual +1) * 24;
		}
		
        $query_categoria ="SELECT * FROM `categorias` WHERE categoria='$tags' $complemento ";
        $consulta_categoria = mysql_query($query_categoria);    
        $dados_categoria = mysql_fetch_array($consulta_categoria);
        
        $query_categoria_conteudo = "SELECT * FROM `categorias_conteudo` WHERE id_categoria=$dados_categoria[id] AND pagina='Modelos Hot'  $complemento LIMIT $inicio_consulta, 24";
        $consulta_categoria_conteudo = mysql_query($query_categoria_conteudo);       
        //SE NÃO HOUVER TAG */
		}else{	
			//SE NAO FOR CONSULTA
			#####Página Atual
			(int)$pgAtual = addslashes($pag);
			if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
			#####paginação
			$Paginacao = new Paginacao;
			$Paginacao->NumPgLaterais = $totalPaginas;
			//se $s tiver consulta 		
			
				//se $s tiver consulta 	
				if($s != ''){
					/* 
					//se consulta houver v  consulta por visualizaçoes
					if($s == 'v'){	
						$complemento = 'ORDER BY visualizacao DESC';	
					}
					//se consulta e o modelo tiver telefone cadastrado
					if($s == 'f'){	
						$complemento = 'AND fone_contato!='."''".' ORDER BY visualizacao DESC';	
					}
					//se consulta houver n consulta por nome
					if($s == 'n'){	
						$complemento = 'ORDER BY nome ASC';	
					}*/
					//se consulta houver s consulta por letra
					if($s == 's'){	
						
						$complemento = 'AND nome LIKE "'.$l.'%" ';	
					}
					}else{
					//se nao houver consulta por id descrescente 
					$complemento = 'ORDER BY ordem ASC';  
				}
			//SE NAO FOR CONSULTA
			#####Página Atual
			(int)$pgAtual = addslashes($pag);
			if($pgAtual < 1 OR $pgAtual == '') $pgAtual = 1;
			#####paginação
			$Paginacao = new Paginacao;
			$Paginacao->NumPgLaterais = $totalPaginas;
			
			#####consulta total de filmes
			$query_paginacao = "SELECT * FROM modelos WHERE `exibicao`='Todos' AND status='Ativo' AND modelo_perfil <>'' $complemento";
			$consulta_paginacao = mysql_query($query_paginacao);
			$totalVideos_cena = mysql_num_rows($consulta_paginacao);
			$totalPaginas = ceil($totalVideos_cena /24);
			
			$Paginacao->SiteLink = ''; 
			#####paginação
			$Paginacao = new Paginacao;
			$Paginacao->NumPgLaterais = $totalPaginas;
			//$Paginacao->SiteLink = URL.$idioma.'/modelos/'.$s;
			
			$Paginacao->SiteLink = URL.'atores';
			
			
			#####consulta videos da página
			#####consulta videos da página 
			if($pgAtual == 1){
				$inicio_consulta = '0';
				} else {
				$inicio_consulta = ($pgAtual +1) * 24;
			}
			/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 28";	
			$consulta_modelos = mysql_query($query_modelos);	
			$total_modelos = mysql_num_rows($consulta_modelos);	

						/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos2 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 28, 28";	
			$consulta_modelos2 = mysql_query($query_modelos2);	
			$total_modelos2 = mysql_num_rows($consulta_modelos2);	

			/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos3 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 56, 28";	
			$consulta_modelos3 = mysql_query($query_modelos3);	
			$total_modelos3 = mysql_num_rows($consulta_modelos3);
			
						/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos4 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 84, 28";	
			$consulta_modelos4 = mysql_query($query_modelos4);	
			$total_modelos4 = mysql_num_rows($consulta_modelos4);

									/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos5 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 112, 28";	
			$consulta_modelos5 = mysql_query($query_modelos5);	
			$total_modelos5 = mysql_num_rows($consulta_modelos5);

												/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos6 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 140, 28";	
			$consulta_modelos6 = mysql_query($query_modelos6);	
			$total_modelos6 = mysql_num_rows($consulta_modelos6);

															/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos7 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 168, 28";	
			$consulta_modelos7 = mysql_query($query_modelos7);	
			$total_modelos7 = mysql_num_rows($consulta_modelos7);

												/* Busca Modelos---------------- */	
			//Consulta Todos os modelos 	
			$query_modelos8 = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND exclusivos!='Sim' $complemento LIMIT 196, 28";	
			$consulta_modelos8 = mysql_query($query_modelos8);	
			$total_modelos8 = mysql_num_rows($consulta_modelos8);


			//Consulta Todos os modelos preferidos
			$query_modelos_preferidos = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND modelo_perfil <>'' AND preferidos='Sim' ORDER BY ordem LIMIT $inicio_consulta, 18";	
			$consulta_modelos_preferidos = mysql_query($query_modelos_preferidos);	
			$total_modelos_preferidos = mysql_num_rows($consulta_modelos_preferidos);	
			
			//Consulta Todos os modelos exclusivos
			$query_modelos_exclusivos = "SELECT * FROM `modelos` WHERE `exibicao`='Todos' AND status='Ativo' AND modelo_perfil <>'' AND exclusivos='Sim' ORDER BY ordem LIMIT $inicio_consulta, 18";	
			$consulta_modelos_exclusivos = mysql_query($query_modelos_exclusivos);	
			$total_modelos_exclusivos = mysql_num_rows($consulta_modelos_exclusivos);	
		}
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once('mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<html class="no-js">	
		<head>
			<meta charset="utf-8">
			<meta http-equiv="Content-Language" content="pt-br, en">	 
			<title>🌶 <?php echo TITULO_MODELOS ?></title>
			<meta name="viewport" content="width=device-width, user-scalable=no">
			<meta name="keywords" content="HOTBOYS video, videos, mundo gay, garotos hot, gay videos, free videos, ensaios gay, homens dotados, cafuçu, gay brasil, dotados, big dotado, hot boys, hotboys, web videos, gay mais,">
			<meta name="description" CONTENT="HOTBOYS Ensaios e videos de sexo bareback dos garotos mais gostosos do Rio de Janeiro Brasil">
			
			<!-- HEAD (Include) -->
			<?php include ('includes/head.php')?>
			<Style>
			body.fundo-preto .pagination>li>a, body.fundo-preto .pagination>li>span{padding: 4px 10px;}
			.page-item i.fa-caret-left,.page-item i.fa-caret-right{font-size: 0.9em;}
			</style>
			<style>
			@import url('https://fonts.googleapis.com/css?family=Roboto:300;500');

*{
  margin: 0;
  padding: 0;
}

input[type='radio']{
 display: none;
}

.layer{
  width: 50vw;
  height: 65vh;
  display: none;
  background: rgb(236, 240, 241);
  justify-content: center;
  border-radius: 3px;
  box-shadow: 0px 2px 5px 2px rgba(220, 6, 6, 0.25);
  transition: all 1s ease;
}

.pages-all{
  width: 100%;
  height: 9vh;
  transition: all 1s ease;
  font-size: .9em;
  background: rgb(236, 240, 241);
  border-radius: 3px;
  display: flex;
  justify-content: center;
  align-items: center;
  box-shadow: 0px 2px 5px 2px rgba(220, 6, 6, 0.25);
}
label{
    cursor: pointer;
    transition: all 1s ease;
}
label:hover{
    color: rgb(52, 152, 219);
    transition: all 1s ease;
}

#page-1:checked ~ .page-1{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(192, 57, 43);
}
#page-2:checked ~ .page-2{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(41, 128, 185);
}
#page-3:checked ~ .page-3{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(142, 68, 173);
}
#page-4:checked ~ .page-4{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(241, 196, 15);
}
#page-5:checked ~ .page-5{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(211, 84, 0);
}
#page-6:checked ~ .page-6{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(211, 84, 0);
}
#page-7:checked ~ .page-7{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(211, 84, 0);
}
#page-8:checked ~ .page-8{
  display: contents;
  animation: muda .5s;
  transition: all 1s ease;
  color: rgb(211, 84, 0);
}

@keyframes muda{
  0%{transform: rotateY(90deg);}
  100%{transform: rotateY(00deg);}
}
			</style>
		
		</head>	
		<?php if ($detect->isMobile()) { ?>
			<body id="body" class="fundo-preto" style="width:100% !important;">
		<?php }else{?>
			<body id="body" class="fundo-preto">
		<?php }?>
			<div class="container">
				
				<!-- TOP (Include) -->
				<div class="row" style="float:left;width:100%">
					<?php include ('includes/top2.php')?>
				</div>
					
		
				<!-- Letras - Nomes dos Modelos	-->
				<div class="row" id="topo" style="float:left;width:100%">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 container container-table-cenas">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 letras-paginacao">
							<nav aria-label="Page navigation example" >
							<br><br>
								<ul class="pagination centraliza">
								<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>">Todos</a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=a"><?php echo PAGINACAO_A ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=b"><?php echo PAGINACAO_B ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=c"><?php echo PAGINACAO_C ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=d"><?php echo PAGINACAO_D ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=e"><?php echo PAGINACAO_E ?></a></li>
									<li class="page-link letras" <?php if($l == 'f') {echo 'disabled';} ?> letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=f"><?php echo PAGINACAO_F ?></a>
									</li>
									<li class="page-link letras" <?php if($l == 'g') {echo 'disabled';} ?> letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=g"><?php echo PAGINACAO_G ?></a>
									</li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=h"><?php echo PAGINACAO_H ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=i"><?php echo PAGINACAO_I ?></a></li> 
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=j"><?php echo PAGINACAO_J ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=k"><?php echo PAGINACAO_K ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=l"><?php echo PAGINACAO_L ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=m"><?php echo PAGINACAO_M ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=n"><?php echo PAGINACAO_N ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=o"><?php echo PAGINACAO_O ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=p"><?php echo PAGINACAO_P ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=q"><?php echo PAGINACAO_Q ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=r"><?php echo PAGINACAO_R ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=s"><?php echo PAGINACAO_S ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=t"><?php echo PAGINACAO_T ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=u"><?php echo PAGINACAO_U ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=v"><?php echo PAGINACAO_V ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=w"><?php echo PAGINACAO_W ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=x"><?php echo PAGINACAO_X ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=y"><?php echo PAGINACAO_Y ?></a></li>
									<li class="page-link letras"><a class="page-link"style="border:1px transparent !important;background:linear-gradient(to bottom,#ffffff 0,#ffffff 100%);" href="<?php echo URL.'atores/'?>?s=s&l=z"><?php echo PAGINACAO_Z ?></a></li>
								</ul>
							</nav>
						</div>
					</div>	 
				</div><br>
				<?php if ($detect->isMobile()) { ?>
  <div class="pages-all" style="background: #0d0d0d;">
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 5px 0px 0px 5px;" for="page-1">&nbsp;&nbsp;1&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-2">&nbsp;&nbsp;2&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-3">&nbsp;&nbsp;3&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-4">&nbsp;&nbsp;4&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-5">&nbsp;&nbsp;5&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-6">&nbsp;&nbsp;6&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-7">&nbsp;&nbsp;7&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 5px 5px 0px;" for="page-8">&nbsp;&nbsp;8&nbsp;&nbsp;</label>
  </div>
  <?php }else{ ?>
	<div class="pages-all" style="background: #0d0d0d;box-shadow:0px 2px 5px 0px rgba(220, 6, 6, 0.25);">
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 5px 0px 0px 5px;" for="page-1">&nbsp;&nbsp;1&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-2">&nbsp;&nbsp;2&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-3">&nbsp;&nbsp;3&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-4">&nbsp;&nbsp;4&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-5">&nbsp;&nbsp;5&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-6">&nbsp;&nbsp;6&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-7">&nbsp;&nbsp;7&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 5px 5px 0px;" for="page-8">&nbsp;&nbsp;8&nbsp;&nbsp;</label>
  </div>
	<?php } ?>
							<!-- Título H1 da pagina -->
							<div class="row" style="float:left;">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <h1 class="modelos-titulo" style="border-left:0!important;padding-left:0!important">
                                <span class="icone-pimenta-titulo"></span>
                            ATORES HOT </h1>
                        </div>
					</div><br>		
						<div class="container" style="background: #0d0d0d;">
						
  <input type="radio" id='page-1' name='pg' checked/>
  <input type="radio" id='page-2' name='pg'/>
  <input type="radio" id='page-3' name='pg'/>
  <input type="radio" id='page-4' name='pg'/>
  <input type="radio" id='page-5' name='pg'/>
  <input type="radio" id='page-6' name='pg'/>
  <input type="radio" id='page-7' name='pg'/>
  <input type="radio" id='page-8' name='pg'/>


  
  <div class="layer page-1" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
					<?php while($modelos_exclusivos = mysql_fetch_array($consulta_modelos_exclusivos)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos_exclusivos[id].'/'.URL_amigavel($modelos_exclusivos[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos_exclusivos['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos_exclusivos[id].'/'.URL_amigavel($modelos_exclusivos[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos_exclusivos['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos_exclusivos['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos_exclusivos[id].'/') ?>"><?php echo utf8_encode($modelos_exclusivos['nome'])?></a>
											<i style="font-size: 12px;">Exclusivo</i>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos_exclusivos['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
							<?php } ?>
                    <?php while($modelos = mysql_fetch_array($consulta_modelos)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos[id].'/'.URL_amigavel($modelos[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos[id].'/'.URL_amigavel($modelos[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos[id].'/') ?>"><?php echo utf8_encode($modelos['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>

					<?php while($modelos_exclusivos = mysql_fetch_array($consulta_modelos_exclusivos)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos_exclusivos[id].'/'.URL_amigavel($modelos_exclusivos[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos_exclusivos['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos_exclusivos[id].'/'.URL_amigavel($modelos_exclusivos[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos_exclusivos['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos_exclusivos['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
												
												<a href="<?php echo utf8_encode(URL.'ator/'.$modelos_exclusivos[id].'/') ?>"><?php echo utf8_encode($modelos_exclusivos['nome'])?></a>
												<i style="font-size: 12px;">Exclusivo</i>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos_exclusivos['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					
						<?php while($modelos = mysql_fetch_array($consulta_modelos)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos[id].'/'.URL_amigavel($modelos[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos['nome'])?></span>
									</a>
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos[id].'/'.URL_amigavel($modelos[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos[id].'/') ?>"><?php echo utf8_encode($modelos['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-2" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos2 = mysql_fetch_array($consulta_modelos2)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos2[id].'/'.URL_amigavel($modelos2[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos2['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos2[id].'/'.URL_amigavel($modelos2[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos2['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos2['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos2[id].'/') ?>"><?php echo utf8_encode($modelos2['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos2['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos2 = mysql_fetch_array($consulta_modelos2)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos2[id].'/'.URL_amigavel($modelos2[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos2['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos2[id].'/'.URL_amigavel($modelos2[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos2['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos2['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos2[id].'/') ?>"><?php echo utf8_encode($modelos2['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos2['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-3" style="width: 100%;height: 100%;background: #0d0d0d;">
    			
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos3 = mysql_fetch_array($consulta_modelos3)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos3[id].'/'.URL_amigavel($modelos3[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos3['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos3[id].'/'.URL_amigavel($modelos3[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos3['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos3['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos3[id].'/') ?>"><?php echo utf8_encode($modelos3['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos3['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos3 = mysql_fetch_array($consulta_modelos3)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos3[id].'/'.URL_amigavel($modelos3[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos3['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos3[id].'/'.URL_amigavel($modelos3[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos3['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos3['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos3[id].'/') ?>"><?php echo utf8_encode($modelos3['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos3['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-4" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos4 = mysql_fetch_array($consulta_modelos4)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos4[id].'/'.URL_amigavel($modelos4[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos4['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos4[id].'/'.URL_amigavel($modelos4[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos4['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos4['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos4[id].'/') ?>"><?php echo utf8_encode($modelos4['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos4['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos4 = mysql_fetch_array($consulta_modelos4)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos4[id].'/'.URL_amigavel($modelos4[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos4['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos4[id].'/'.URL_amigavel($modelos4[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos4['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos4['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos4[id].'/') ?>"><?php echo utf8_encode($modelos4['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos4['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-5" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos5 = mysql_fetch_array($consulta_modelos5)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos5[id].'/'.URL_amigavel($modelos5[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos5['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos5[id].'/'.URL_amigavel($modelos5[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos5['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos5['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos5[id].'/') ?>"><?php echo utf8_encode($modelos5['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos5['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos5 = mysql_fetch_array($consulta_modelos5)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos5[id].'/'.URL_amigavel($modelos5[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos5['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos5[id].'/'.URL_amigavel($modelos5[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos5['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos5['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos5[id].'/') ?>"><?php echo utf8_encode($modelos5['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos5['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-6" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos6 = mysql_fetch_array($consulta_modelos6)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos6[id].'/'.URL_amigavel($modelos6[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos6['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos6[id].'/'.URL_amigavel($modelos6[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos6['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos6['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos6[id].'/') ?>"><?php echo utf8_encode($modelos6['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos6['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos6 = mysql_fetch_array($consulta_modelos6)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos6[id].'/'.URL_amigavel($modelos6[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos6['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos6[id].'/'.URL_amigavel($modelos6[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos6['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos6['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos6[id].'/') ?>"><?php echo utf8_encode($modelos6['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos6['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-7" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos7 = mysql_fetch_array($consulta_modelos7)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos7[id].'/'.URL_amigavel($modelos7[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos7['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos7[id].'/'.URL_amigavel($modelos7[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos7['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos7['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos7[id].'/') ?>"><?php echo utf8_encode($modelos7['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos7['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos7 = mysql_fetch_array($consulta_modelos7)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos7[id].'/'.URL_amigavel($modelos7[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos7['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos7[id].'/'.URL_amigavel($modelos7[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos7['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos7['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos7[id].'/') ?>"><?php echo utf8_encode($modelos7['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos7['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <div class="layer page-8" style="width: 100%;height: 100%;background: #0d0d0d;">
  <?php if ($detect->isMobile()) { ?>
                    <?php while($modelos8 = mysql_fetch_array($consulta_modelos8)){ ?> 
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 inicial_box_modelos" style="width:50% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos8[id].'/'.URL_amigavel($modelos8[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos8['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos8[id].'/'.URL_amigavel($modelos8[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos8['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos8['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos8[id].'/') ?>"><?php echo utf8_encode($modelos8['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos8['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php }else{ ?>
						<?php while($modelos8 = mysql_fetch_array($consulta_modelos8)){ ?> 
							<div class="col-lg-2 col-md-2 col-sm-6 col-xs-6 inicial_box_modelos" style="width:14% !important;">	
								<div class="conteudoModelo">
									<a class="nome" href="<?php echo utf8_encode(URL.'ator/'.$modelos8[id].'/'.URL_amigavel($modelos8[nome])) ?>">
										<span class="icone-pimenta"><img src="<?php echo URL ?>imagens/icones/pimenta-nome-modelos01.gif"/></span>
										<span class="nome-modelos"><?php echo utf8_encode($modelos8['nome'])?></span>
									</a>
									
									
									<a href="<?php echo utf8_encode(URL.'ator/'.$modelos8[id].'/'.URL_amigavel($modelos8[nome])) ?>">
										<?php if ($detect->isMobile()) { ?>
										<img class="card-img-top-modelos" src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos8['modelo_perfil']?>" alt="imagem modelo mobile"></a>
										<?php }else{ ?>
										<img class="lazy card-img-top-modelos" style="width:100% !important;" src="<?php echo URL ?>imagens/icones/loading/fundo-modelo-principal.gif" data-src="https://server2.hotboys.com.br/arquivos/<?php echo $modelos8['modelo_perfil']?>" alt="imagem modelo">
									<?php } ?>
									<div class="paginas-titulo-visualizacoes">	
										<h4 class="paginas-nome-modelos" style="text-align:center;">
											<a href="<?php echo utf8_encode(URL.'ator/'.$modelos8[id].'/') ?>"><?php echo utf8_encode($modelos8['nome'])?></a>
										</h4>	
										<!--<p class="paginas-visualizacoes">
                                            <i class="far fa-eye" aria-hidden="true"></i> <?php echo number_format_short($modelos8['visualizacao'])?>
										</p>
										-->
									</div>
								</div>	
							</div>
					<?php } ?>
					<?php } ?>
  </div>
  <?php if ($detect->isMobile()) { ?>
  <div class="pages-all" style="background: #0d0d0d;">
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 5px 0px 0px 5px;" for="page-1">&nbsp;&nbsp;1&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-2">&nbsp;&nbsp;2&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-3">&nbsp;&nbsp;3&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-4">&nbsp;&nbsp;4&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-5">&nbsp;&nbsp;5&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-6">&nbsp;&nbsp;6&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-7">&nbsp;&nbsp;7&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 5px 5px 0px;" for="page-8">&nbsp;&nbsp;8&nbsp;&nbsp;</label>
  </div>
  <?php }else{ ?>
	<div class="pages-all" style="background: #0d0d0d;">
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 5px 0px 0px 5px;" for="page-1">&nbsp;&nbsp;1&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-2">&nbsp;&nbsp;2&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-3">&nbsp;&nbsp;3&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-4">&nbsp;&nbsp;4&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-5">&nbsp;&nbsp;5&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-6">&nbsp;&nbsp;6&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 0px 0px 1px;" for="page-7">&nbsp;&nbsp;7&nbsp;&nbsp;</label>
    <label class="btn btn-danger" style="background-color:#ffffff;color:#000000;border: 1px transparent;padding: 6px;border-radius: 0px 5px 5px 0px;" for="page-8">&nbsp;&nbsp;8&nbsp;&nbsp;</label>
  </div>
	<?php } ?>
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
				
			</div>
	
		</body>	
	</html>					