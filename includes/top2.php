<?php

// Detecta a resolucao do cliente - Mobile ou Computador //
require_once 'mobili/Mobile_Detect.php';
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
$scriptVersion = $detect->getScriptVersion();

$primeiro_nome = addslashes($_POST['primeiro_nome']);
$sobrenome = addslashes($_POST['sobrenome']);
$email = addslashes($_POST['email']);
$nome_exibicao = addslashes($_POST['nome_exibicao']);
$cidade = addslashes($_POST['cidade']);
$estado = addslashes($_POST['estado']);
$foto_perfil = addslashes($_FILES['foto_perfil']);

$data_logo = date("Y-m-d H:i:s");
//consulta da tabela de logos
$query_logo = "SELECT * FROM `logos` WHERE status='ativo' ";
$consulta_logo = mysql_query($query_logo);
$dados_logo = mysql_fetch_array($consulta_logo);

//CONSULTA DA TABELA MODELO_POP_UP
$query_modelo_pop_up = "SELECT * FROM `modelo_pop_up` WHERE status='Ativo' order by RAND()";
$consulta_modelo_pop_up = mysql_query($query_modelo_pop_up);
$dados_modelo_pop_up = mysql_fetch_array($consulta_modelo_pop_up);

// busca o id do usuarios logado
$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
$consulta_user = mysql_query($query_user);
$total_user = mysql_num_rows($consulta_user);
$dados_user = mysql_fetch_array($consulta_user);

//imagem do perfil
if ($vip == true) {
    if ($dados_user['foto_perfil'] == '') {
        //não tem foto de perfil
        $fotoPerfil = URL . 'imagens/icones/perfil/avatar_sfoto.jpg';
    } else {
        //tem foto de perfil
        //$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
        $fotoPerfil = URL . 'imagens/icones/perfil/avatar_sfoto.jpg';
    }
}

?>

<style>
	button.btn-assinar {
    margin-top: 6px!important;
    overflow: hidden;
	}
	button.btn-login{
	overflow: hidden;
	}
	.btn-assinar .fa-lock{float: left; color: white!important;background-color: transparent!important;margin-left: 3px;}
	.btn-assinar .fa-lock:before{background-color: transparent}
	}
	.inicial_box_conteudo a{
	width:100%;
	}
	button.btn-assinar span, button.btn-login span{
	color: #fff!important;
	}
	button.btn-assinar {
	border-radius: 4px;
	}
	header.assineja-entrar li a{
	float:left;
	}

	@media (min-width:1200px){
	.busca-topo {
    float: right;
	margin-right: 15px!important;
    margin-top: 8px;
    }

	input[type=search]#search{
	width: 94%;
    padding-left: 45px;
    font-size: 17px;
    color: #676767;
    border: 1px solid #cecece;
    border-radius: 50px;
    background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0;
    height: 37px;
    margin-top: 10px;
    -webkit-appearance: none
	}

	a.nome,a:hover.nome{
    position: absolute;
    left: 0;
    top: 40%;
    text-align: center;
    width: 99%;
    font-size: 23px;
    display: none;
    line-height: 50px;
    background: #0d0d0dd1;
    color: #fff!important;
	}


	.conteudoModelo:hover .nome {
	display: block;
	top: 38%;
	}

	.conteudoModelo span{
	float: left;
	}


	.conteudoModelo .nome-modelos{
	width:80%;
	text-align:center;
	}

	.conteudoModelo .icone-pimenta img{
	width: 100%!important;
	border:0!important;
	margin-top:0px;
	}

	}
	@media (min-width:992px) and (max-width:1199px){
	input[type=search]#search{width: 94%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #cecece;border-radius: 50px;background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0;height: 37px;margin-top: 6px;-webkit-appearance: none}

    .busca-topo {
	margin-right: 15px!important;
    margin-top: 8px;
    float: right;
    }
	.logo-fundo-branco img, .logo-fundo-preto img{
	margin-left: 9px!important;
    width: 82%;
	}

	a.nome,a:hover.nome{
    position: absolute;
    left: 0;
    top: 40%;
    text-align: center;
    width: 99%;
    font-size: 23px;
    display: none;
    line-height: 50px;
    background: #0d0d0dd1;
    color: #fff!important;
	}


	.conteudoModelo:hover .nome {
	display: block;
	top: 38%;
	}

	.conteudoModelo span{
	float: left;
	}

	.conteudoModelo .nome-modelos{
	width: 80%;
    text-align: center;
    font-size: 17px;
	}

	.conteudoModelo .icone-pimenta{
	width: 20%;
	}

	.conteudoModelo .icone-pimenta img{
	width: 100%!important;
	border:0!important;
	margin-top:0px;
	}
	}






	@media (min-width:768px) and (max-width:991px){
	#cena_fotos .inicial_box_conteudo, #info1 .box{overflow:hidden;height:113px}
	.botoes-topo-acesso{
	margin-right: 12px;
	}
	.logo-fundo-branco img, .logo-fundo-preto img {
    width: 88%;
    margin-left: 6px!important;
	}
	.busca-topo{
	margin-top: -2px;
	}
	input[type=search]#search { width: 94%; padding-left: 45px; font-size: 17px; color: #676767; border: 1px solid #cecece; border-radius: 50px; background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0; height: 36px; margin-top: 1px; -webkit-appearance: none; }
	button.btn-assinar {margin-top: 9px!important;}
	.conteudoModelo a.nome{display:none}

	}



	@media (max-width:767px){
	input[type=search]#search{width: 94%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #cecece;border-radius: 50px;background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0;height: 37px;margin-top: 10px;-webkit-appearance: none}

	.conteudoModelo a.nome,.letras-paginacao{display:none}
	}

	@media (max-width:480px){
	input[type=search]#search{width: 94%;padding-left: 45px;font-size: 17px;color: #676767;border: 1px solid #cecece;border-radius: 50px;background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0;height: 37px;margin-top: 10px;-webkit-appearance: none}

	.conteudoModelo a.nome,.letras-paginacao{display:none}
	}
</style>


<?php
//Se Mobile, esconde o topo com botao de trocar cor
if ($detect->isMobile()) {?>
	<nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
		<div class="container">

			<!-- SLOGAN e os 4 outros sites do grupo -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				<div class="navtopo-collapse">
					<ul class="navtopo-nav mr-auto sites-topo">

						<li class="nav-item slogan solo">
							<a href="<?php echo URL_SOLO ?>" target="_blank">

								<!-- Icone solohot do topo -->
								<img src="<?php echo URL ?>imagens/icones/topo/icone-solo-topo.jpg" alt="icone solohot"/>

								<?php echo S_HOT ?>
							</a>
						</li>


						<li class="nav-item slogan">
							<?php if ($vip != true) {?>
								<a href="<?php echo URL_BARE ?>" target="_blank">
									<?php } else {?>
									<a href="<?php echo URL_VIP ?>" target="_blank">
									<?php }?>

									<!-- Icone hotboys do topo -->
									<img src="<?php echo URL ?>imagens/icones/topo/icone-bare-topo.png" alt="icone bareback"/>
									<?php echo BARE_B ?>
								</a>
							</li>
						</ul>
					</div>
				</div>

			</div>
		</nav>


		<?php
//Caso nao seja mobile, carrega o topo
} else {?>

		<!-- Topo com links e Idiomas (Fundo Preto) -->
		<nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
			<div class="container">
				<!-- SLOGAN e os 4 outros sites do grupo -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
					<div class="navtopo-collapse">
						<ul class="navtopo-nav mr-auto sites-topo">

							<li class="nav-item slogan solo" style="float: left!important;">
								<a href="<?php echo URL_SOLO ?>" target="_blank">

									<!-- Icone solohot do topo -->
									<div class="icone-solo-topo"></div>
									<span><?php echo S_HOT ?></span>
								</a>
							</li>
							<li class="nav-item slogan bare topo" style="float: left!important;">


								<a href="<?php echo URL_BARE ?>" target="_blank">
									<!-- Icone hotboys do topo -->
									<div class="icone-bare-topo"></div>
									<span><?php echo BARE_B ?></span>

								</a>
							</li>



						</ul>
					</div>
				</div>

				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 topo-slogan" >
					<div class="navtopo-collapse">
						<ul class="navtopo-nav mr-auto" style="margin: 0 auto; float: none;">
							<li class="nav-item slogan topo" ><?php echo SLOGAN ?></li>
						</ul>
					</div>
				</div>


			</div>
		</nav>
	<?php }?>



	<!-- Div da logo, botoes e busca (Fundo Branco) -->
	<?php
//Se Mobile, carrega o perfil administrativo do cliente
if ($detect->isMobile()) {?>

		<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<!-- LOOGOMARCAS DO TOPO -->

					<!-- Logo Branca p/ fundo escuro -->
					<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 logo-fundo-preto" style="margin-top:25px;">
						<a class="navlogo-brand" href="<?php if ($vip != true) {echo URL;} else {echo URL_VIP;}?> "><?php if ($dados_logo[data_termino] > $data_logo) {?>
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;"/>
							<?php } else {?>
							<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;"/>
						<?php }?>
						</a>
					</div>

					<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 topo-menu-principal-mobile">
						<header class="cf">
							<a id="navicon" class="closed">&#9776;
								<span><?php echo MENU ?></span>
							</a>
						</header>
					</div>

				</div>
			</div>
		</nav>

		<?php
if ($vip != true) {?>

					<div class="col-sm-6 col-xs-6" style="height: 32px;text-align: center;background-color: #d60000;z-index: 9998;">
							<button style="height: 32px;background-color: transparent;padding: 4px 56px;line-height: 1.4;" onclick="window.location.href='<?php echo URL ?>assine'">Assine Já</button>
					</div>
					<div class="col-sm-6 col-xs-6" style="height: 32px;text-align: center;background-color: #ffffff;z-index: 9999;">
							<button style="height: 32px;background-color: transparent;padding: 4px 68px;line-height: 1.4;color:black !important;" onclick="window.location.href='<?php echo URL ?>vip/login'">Entrar</button>
					</div>


		<?php }?>
		<?php
//Caso contrario, carrega o menu principal
} else {?>

		<!-- Div da logo, botoes e busca (Fundo Branco) -->
		<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
			<div class="container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

					<!-- LOOGOMARCAS DO TOPO -->
					<!-- Logo Preta p/ fundo claro -->

					<?php
if ($vip != true) {?>
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top:0px;margin-bottom:0px">
							<?php } else {?>
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top:0;margin-bottom:0">
							<?php }?>

							<a class="navlogo-brand" href="<?php if ($vip != true) {echo URL;} else {echo URL_VIP;}?> ">
								<?php if ($dados_logo[data_termino] > $data_logo) {?>
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;width: 64%;"/>
									<?php } else {?>
									<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;width: 64%;"/>
								<?php }?>
							</a>
						</div>


						<!-- botoes ASSINE e ENTRAR -->
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center">
							<?php //Se logado botoes some
    if ($vip == true) {?>
								<form method="post" action="<?php echo URL_VIP ?>busca">
									<input type="search" id="search" name="search" placeholder="Busca..." list="preenchimento-automatico">
								</form>

								<?php } else {?>
								<!-- campo de busca no menu desktop -->
								<form method="get" action="<?php echo URL ?>busca">
									<input type="search" id="search" name="s" placeholder="Busca..." list="preenchimento-automatico">
								</form>

							<?php }?>
						</div>


						<?php //Se logado botoes somem
    if ($vip != true) {?>
							<!-- Formulario NÃO VIP - Botão Busca -->
							<div class="col-lg-3 col-md-3 col-sm-4 col-xs-3 busca-topo">
								<?php //Se logado botoes somem
        if ($vip != true) {?>
									<div class="botoes-topo-acesso" style="float: right;">
										<a href="<?php echo URL ?>vip/login"><button type="button" class="btn-login"><span>Entrar</span></button></a>
										<a href="<?php echo URL ?>assine">
										<button type="button" class="btn-assinar"><span><i class="fa fa-lock"></i> Assinar</span></button></a>

									</div>
									<?php } else {?>
									<span class="minha-conta"><a href="<?php echo URL_VIP ?>minha-conta"><button type="button" class="btn-assinar">
									<span><?php echo M_CONTA ?></span></button></a></span>
									<span class="minha-conta-sair"><a href="<?php echo URL_VIP ?>login/index.php?acao=sair"><button type="button" class="btn-login"><span>Sair</span></button></a></span>
								<?php }?>

							</div><!-- FIM Formulario NÃO VIP - Botão Busca -->

							<?php } else {?>
							<!-- Formulario VIP - Botão Busca -->
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 recursos-topo-vip" style="float:right">

								<!--##	INICIO Area do Cliente VIP no TOPO  ##-->
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:7px;">
									<span class="minha-conta-sair" style="float:right"><a href="<?php echo URL ?>vip/login/index.php?acao=sair">
									<button type="button" class="btn btn-assinar" style="background:#5a5657!important;"><span>Sair</span></button></a></span>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
									<div class="usuario-topo">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" class="area-cliente-topo" style="background: #e2dcde;height:56px">

											<!--## INICIO Link - Area do Cliente VIP no TOPO  ##-->
											<a href="<?php echo URL_VIP ?>minha-conta" style="color: #0d0d0d;">

												<div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12 info-cliente-topo-desktop" style="margin:0 auto;float:none!important;padding-left: 5px!important;padding-right: 5px!important;margin-top:5px;">

													<!-- Imagem - Area do Cliente VIP no TOPO -->
													<div class="espaco-imagem-topo-desktop" style="float: left; width: 40%;">
														<img src="<?php echo $fotoPerfil ?>" alt="imagem cliente" style="width: 39px; border-radius:50%;margin-top: 4px; margin-right: 16px">
													</div>


													<!--## INICIO Saudacao - Area do Cliente VIP no TOPO  ##-->
													<div class="espaco-perfil-topo-desktop" style=" float: left; width: 60%; text-align: left">
														<div class="perfil-info espaco-saudacao" style="float: left; margin-top: 9px;text-align:leftc;color: #000;">


															<!-- Saudacao - Area do Cliente VIP no TOPO  -->
															<span class="saudacao" style="width: 100%; float: left">
																<?php
$hr = date(" H ");
        if ($hr >= 12 && $hr < 18) {
            $resp = "Boa tarde";} else if ($hr >= 0 && $hr < 12) {
            $resp = "Bom dia";} else {
            $resp = "Boa noite";}
        echo "$resp";
        ?>
															</span>

															<!-- Nome Exibicao - Area do Cliente VIP no TOPO -->
															<span class="nome" style="width: 100%; float: left">
																<?php if ($dados_user[primeiro_nome]) {
            echo (substr($dados_user[primeiro_nome], 0, 10));
        } else {
            echo 'Usuario';
        }?>
															</span>

														</div>
													</div>
													<!--## FIM Saudacao - Area do Cliente VIP no TOPO  ##-->


												</div>
												<i class="fa fa-caret-up fa-2x seta-cliente-topo-desktop" style="font-size: 2em; color: #e31330; width: 100%"></i>
											</a>
											<!--## FIM Link - Area do Cliente VIP no TOPO  ##-->

										</div>
									</div>
								</div>
								<!--##	FIM Area do Cliente VIP no TOPO  ##-->




							</div>
							<!-- FIM Formulario VIP - Botão Busca -->
						<?php }?>
					</div>
				</div>
			</nav>


		<?php }?>


		<?php
//Se Mobile, carrega o perfil administrativo do cliente
if ($detect->isMobile()) {?>
			<?php if ($vip == true) {?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perfil-mobile">
					<div class="container">
						<div class="row centralizada">

							<!-- Menu do Cliente -->
							<div class="menu-area-cliente">
								<nav class="navbar navbar-default sidebar" role="navigation">
									<div class="navbar-header">


										<!-- Informacoes do  cliente -->
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">


												<!-- Imagem do Cliente -->
												<div class="perfil-mobile-foto">

													<div style="width:46px;height:46px;background-image: url(<?php echo $fotoPerfil ?>); background-repeat: no-repeat;background-size: 46px 46px;border-radius: 50%;">

														<?php
if ($dados_user['foto_perfil'] == '') {
    //não tem foto de perfil
    $fotoPerfil = '../imagens/comentarios/avatar_sfoto.jpg';
} else {
    //tem foto de perfil
    $fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
}
    ?>
													</div>


												</div>


												<div class="perfil-mobile-info">


													<!-- Saudacao ao cliente -->
													<span class="saudacao">
														<?php
$hr = date(" H ");
    if ($hr >= 12 && $hr < 18) {
        $resp = "Boa tarde";} else if ($hr >= 0 && $hr < 12) {
        $resp = "Bom dia";} else {
        $resp = "Boa noite";}
    echo "$resp";
    ?>,
													</span>
													<span class="nome-area-cliente">
														<?php if ($dados_user[nome_exibicao]) {
        echo ($dados_user[nome_exibicao]);
    } else {
        echo 'Usuario';
    }?>
													</span>
												</div>
											</div>

											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
												<!-- Botao de engrenagem que carrega o menu vertical -->
												<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1" href="#bs-sidebar-navbar-collapse-1">
													<span class="sr-only">Toggle navigation</span>
													<span class="glyphicon glyphicon-cog"></span>
												</button>   <!-- FIM Botao de engrenagem que carrega o menu vertical -->
											</div><!-- Informacoes do  cliente -->
										</div>


									</div>

									<!-- Menu vertical do cliente -->
									<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
										<ul class="nav navbar-nav">
											<li class="#"><a href="<?php echo URL_VIP ?>minha-conta"><span style="font-size:16px;margin-right:5px;" class="pull-left showopacity glyphicon glyphicon-home"></span> <?php echo M_CONTA ?></a></li>
											<li ><a href="<?php echo URL_VIP ?>cenas-favoritas"><span style="font-size:16px;margin-right:5px;" class="pull-left showopacity glyphicon glyphicon-heart"></span> Cenas Favoritas</a></li>
											<li ><a href="https://www.hotboys.com.br/vip/login/index.php?acao=sair"><span style="font-size:16px;margin-right:5px;" class="pull-left showopacity glyphicon glyphicon-log-out"></span> Sair</a></li>
										</ul>
									</div><!-- FIM Menu vertical do cliente -->


								</nav>
							</div><!-- FIM Menu do Cliente -->


						</div>
					</div>
				</div>
			<?php }?>

			<?php
//Caso contrario, carrega o menu principal
} else {?>


			<!-- Menu principal DESKTOP(Fundo Vermelho) -->
			<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
				<div class="container">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
					<div class="collapse navbar-collapse" id="navbarResponsive">
						<?php
$sql = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Aberto' AND status='' ORDER BY ordem ASC ";
    $consulta = mysql_query($sql);

    if (isset($consulta) >= 1) {?>
								<ul class="navbar-nav mx-auto">
								<?php	while ($dados_menu = mysql_fetch_array($consulta)) {

        if (isset($dados_menu['tipo']) && $dados_menu['tipo'] != '') {?>
											<li class="sub-menu-parent" style="padding-left:35px !important;">
											<a class="nav-link"><?=utf8_encode($dados_menu['nome_exibicao'])?></a>
									<?php	} else {?>
										<li class="nav-item" style="padding-left:35px !important;">
											<a class="nav-link"  href="<?= utf8_encode(URL.$dados_menu['link'])?>"><?=utf8_encode($dados_menu['nome_exibicao'])?></a>
											<?php }?>

											<?php if (isset($dados_menu['tipo']) && $dados_menu['tipo'] == 'categorias') {

            $query_categoria = "SELECT * FROM `categorias` WHERE `categoria` IN ('dotados','cafucu','mega dotados','interracial','sexo dotados','suruba')  LIMIT 17";
            $consulta_categoria = mysql_query($query_categoria);
            $total_categoria = mysql_num_rows($consulta_categoria);

            $query_continuacao_categorias = "SELECT * FROM `categorias` ORDER BY categoria ASC";
            $consulta_continuacao_categorias = mysql_query($query_continuacao_categorias);
            $total_continuacao_categorias = mysql_num_rows($consulta_continuacao_categorias);

            if (isset($consulta_categoria) >= 1) {?>
													<ul class="sub-menu" style="background-color: #0d0d0d !important;width: 550%;left: -212%;">
													<div class="categorias-tags-imagens" style="display: flex;height: 125px;">
														<?php while ($dados_categoria = mysql_fetch_array($consulta_categoria)) {
														?>
														<?php if ($vip != true) {?>
															<a href="<?php echo utf8_encode(URL . 'tag/'. URL_amigavel($dados_categoria['categoria']))?>/">
																<li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
																	<span>
																		<?php if ($dados_categoria[imagem_categoria] != '') {?>
																			<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_categoria[imagem_categoria]; ?>"/>
																			<?php } else {?>
																			<img src="https://server2.hotboys.com.br/arquivos/sem_foto_submenu.jpg"/>
																			<?php }?>
																	</span>
																	</span>
																	<span class="titulo-submenu"><?php echo utf8_encode($dados_categoria[categoria]) ?></span>
																</li>
															</a>
														<?php } else {?>
														<a href="<?php echo URL_VIP . 'tag/' . URL_amigavel($dados_categoria[categoria])?>">
																<li style="display:inline-block;padding:10px 10px 0 10px;width:110px;">
																	<span>
																		<?php if ($dados_categoria[imagem_categoria] != '') {?>
																			<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_categoria[imagem_categoria]; ?>"/>
																			<?php } else {?>
																			<img src="https://server2.hotboys.com.br/arquivos/sem_foto_submenu.jpg"/>
																			<?php }?>
																	</span>
																	<span class="titulo-submenu"><?php echo utf8_encode($dados_categoria[categoria]) ?></span>
																</li>
															</a>
														<?php }}?>
													</div>
													<div class="categorias-tags-texto" style="height: 331px;">
														<?php
$categorias_url = strtr($categorias_url, "äåö", "aao");
                echo $categorias_url;
                ?>
														<div class="mais-categorias"><?=$categorias_url?>Todas as Categorias</div>
														<?php if ($total_continuacao_categorias >= 6) {?>
															<?php while ($dados_continuacao_categorias = mysql_fetch_array($consulta_continuacao_categorias)) {?>
															<?php if ($vip != true) {?>
																<a style="font-size: 12px;display: flex;padding: 8px 0px 27px 0px;" href="<?php echo URL . 'tag/' . URL_amigavel($dados_continuacao_categorias[categoria]) ?>/">
																<?php } else {?>
																<a href="<?php echo URL_VIP . 'tag/' . URL_amigavel($dados_continuacao_categorias[categoria]) ?>/">
																<?php }?>
																	<li><span class="titulo-submenu"><?php echo utf8_encode($dados_continuacao_categorias[categoria]) ?></span></li>
																</a>
														</a>
														<?php }}?>
														</div>
														<?php }?>
													</ul>
											<?php }?>

										<?php
if (isset($dados_menu['tipo']) && $dados_menu['tipo'] == 'atores') {

            $sql_atores = "SELECT * FROM `modelos` WHERE `exclusivos`='Sim' AND `status`='Ativo' ORDER BY ordem ASC LIMIT 6";
            $consulta3 = mysql_query($sql_atores);

            if (isset($consulta3) >= 1) {?>
												<ul class="sub-menu" style="height:200px;display: flex;background-color: #0d0d0d !important;width: 700%;left: -280%;">
												<?php
while ($dados_menu3 = mysql_fetch_array($consulta3)) {?>
														<div class="categorias-tags-imagens">
														<a href="https://hotboys.com.br/ator/<?=$dados_menu3['id']?>/<?=$dados_menu3['nome']?>">
															<li style="display:inline-grid;padding:10px 10px 0 10px;width:110px;">
															<?php	if ($dados_menu3['foto_principal'] != '') {?>
																	<span>
																	<img style="width:100%;" src="https://server2.hotboys.com.br/arquivos/<?=$dados_menu3['foto_principal'];?>"/>
																	</span>
																	<?php } else {?>
																	<span>
																	<img style="width:100%;" src="https://server2.hotboys.com.br/arquivos/sem_foto_submenu.jpg"/>
																	</span>
																	<?php }?>

																<span class="titulo-submenu"><?=utf8_encode($dados_menu3['nome'])?></span>
																</li>
															</a>
														</div>
														<?php }?>
														<div class="categorias-tags-imagens">
															<a href="https://hotboys.com.br/atores">
																<li style="display:inline-grid;padding:10px 10px 0 10px;width:110px;">
																	<span>
																	<i class="fa fa-plus fa-3x" aria-hidden="true" style="height: 147px;width: 100%;line-height: 130px;background-color: transparent;color: white !important;"></i>
																	</span>
																<span class="titulo-submenu">Mais Atores</span>
																</li>
															</a>
														</div>
												</ul>
											<?php }?>
										<?php }?>
										</li>
									</li>
									<?php }?>
									<li class="nav-item" style="padding-left:35px !important;">
											<a class="nav-link" href="https://www.hotboys.com.br/videos-gratis/" style="background-color: yellow;color: black !important;">Vídeos Grátis</a>						
									</li>
								</ul>
							<?php }?>
							<?php }?>

							</div>
						</div>

					</nav>

				<?php
$query = "SELECT * FROM informs_indicativos WHERE pagina_exibicao = 'geral' AND status='Ativo'";
$consulta = mysql_query($query);
$dados = mysql_fetch_array($consulta);

if ($dados['status'] == "ativo" && $dados['tipo_informacao'] == "manutencao") {
    ?>

					<!-- Alerta de AVISO -->
					<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
						<div class="container">
							<div class="row">
								<div class="col-md-12">

									<!-- CSS do alerta de AVISO -->
									<style>
										.alert {
										border-radius: 0;
										-webkit-border-radius: 0;
										box-shadow: 0 1px 2px rgba(0,0,0,0.11);
										display: table;
										width: 99%;
										}

										.alert-white {
										border-top-color: #d8d8d8;
										border-bottom-color: #bdbdbd;
										border-left-color: #cacaca;
										border-right-color: #cacaca;
										color: #404040;
										padding-left: 61px;
										position: relative;
										}

										.alert-white.rounded {
										border-radius: 3px;
										-webkit-border-radius: 3px;
										}

										.alert-white.rounded .icon {
										border-radius: 3px 0 0 3px;
										-webkit-border-radius: 3px 0 0 3px;
										}

										.alert-white .icon {
										text-align: center;
										width: 45px;
										height: 100%;
										position: absolute;
										top: 0;
										left: 0;
										border: 1px solid #bdbdbd;
										padding-top: 15px;
										}


										.alert-white .icon:after {
										-webkit-transform: rotate(45deg);
										-moz-transform: rotate(45deg);
										-ms-transform: rotate(45deg);
										-o-transform: rotate(45deg);
										transform: rotate(45deg);
										display: block;
										content: '';
										width: 10px;
										height: 10px;
										border: 1px solid #bdbdbd;
										position: absolute;
										border-left: 0;
										border-bottom: 0;
										top: 50%;
										right: -6px;
										margin-top: -3px;
										background: #fff;
										}

										.alert-white .icon i {
										font-size: 20px;
										color: #fff;
										left: 12px;
										margin-top: -10px;
										position: absolute;
										top: 50%;
										}
										/*============ colors ========*/
										.alerta-manutencao {
										color: #0e0e0e!important;
										background-color: #ffffff;
										border-color: #e31330;
										width: 98%;
										}
										@media (max-width:480px){
										.alerta-manutencao {width: 96%;}
										}
										.alerta-manutencao p{
										color: #0d0d0d;
										font-family: "Open Sans";
										font-weight: bold;
										text-align: left;
										margin-top: 3px;
										}

										.alert-white.alerta-manutencao .icon,
										.alert-white.alerta-manutencao .icon:after {
										border-color: #dc0606;
										background: #dc0606;
										}

										.alert-info {
										background-color: #d9edf7;
										border-color: #98cce6;
										color: #3a87ad;
										}

										.alert-white.alert-info .icon,
										.alert-white.alert-info .icon:after {
										border-color: #3a8ace;
										background: #4d90fd;
										}


										.alert-white.alert-warning .icon,
										.alert-white.alert-warning .icon:after {
										border-color: #d68000;
										background: #fc9700;
										}

										.alert-warning {
										background-color: #fcf8e3;
										border-color: #f1daab;
										color: #c09853;
										}

										.alert-danger {
										background-color: #f2dede;
										border-color: #e0b1b8;
										color: #b94a48;
										}

										.alert-white.alert-danger .icon,
										.alert-white.alert-danger .icon:after {
										border-color: #ca452e;
										background: #da4932;
										}


									</style>

									<div class="container bootstrap snippet aviso-audicoes">
												<div class="alert alerta-manutencao alert-white rounded">
												<button type="button" data-dismiss="alert" aria-hidden="true" class="close">
												<i class="fa fa-window-close" aria-hidden="true"></i></button>
												<div class="icon">
													<!--<i class="fas fa-couch"></i>-->
													<i class="fas fa-exclamation-triangle"></i>
												</div>
												<strong style="display:none"><?php echo AVISO_IMPORTANTE ?></strong>
												<?php echo $dados['informacao']; ?>
											</div>
									</div>
								</div>
							</div>
						</div>
					</div><!-- Alerta de Aviso-->


				<?php }?>

				<!-- Menu principal (MOBILE) -->

				<div id="main-nav">
					<nav>
						<!-- Bandeiras do menu MOBILE -->
						<div class="col-sm-12 col-xs-12">
							<div id="topo-bandeiras">
								<div class="topo-bandeira">
								<a href="#"><img src="<?php echo URL ?>imagem/bandeira-br.png" border="0" alt="bandeira brasil"></a></div>
								<div class="topo-bandeira">
								<a href="#"><img src="<?php echo URL ?>imagem/bandeira-us.png" border="0" alt="bandeira eua"></a></div>
							</div>
						</div>
						<div class="col-sm-12 col-xs-12 logo-branca-menu">
							<a href="<?php if ($vip != true) {echo URL;} else {echo URL_VIP;}?>">
								<img src="<?php echo URL ?>imagens/logos/hotBoys_whitefull.png" alt="logo menu mobile"/>
							</a>
						</div>

						<?php
if ($vip != true) {?>
							<div class="col-sm-12 busca-mobile float-left" align="center">

								<form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/busca" style="float:left">
									<input type="search" id="search" name="search" placeholder="Busca...">

								</form>
							</div>

							<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
								<div class="col-sm-12 col-xs-12 float-left">
									<a href="<?php echo URL ?>assine">
										<button type="button" class="btn btn-assinar" style="margin-left:0%">
											<span>Assinar</span>
										</button>
									</a>
								</div>
								<div class="col-sm-12 col-xs-12 float-left">
									<a href="<?php echo URL ?>vip/login">
										<button type="button" class="btn btn-login" style="margin-right:0%">
											<span>Entrar</span>
										</button>
									</a>
								</div>
							</div>
							<?php } else {?>

							<div class="col-sm-12 busca-mobile float-left" align="center">

								<form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/vip/busca" style="float:left">
									<input type="search" id="search" name="search" placeholder="Busca...">

								</form>
							</div>
							<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
								<div class="col-sm-12 col-xs-12 float-left">
									<a href="<?php echo URL ?>vip/minha-conta">
									<button type="button" class="btn btn-minhaconta"><?php echo M_CONTA ?></button></a>
									<a href="<?php echo URL ?>vip/login/index.php?acao=sair">
										<button type="button" class="btn btn-sair">
											Sair
										</button>
									</a>
								</div>
							</div>
						<?php }?>

						<!--Menu AUDIÇÕES -->
						<div class="col-sm-12 menu-mobile" >


							<!-- menu mobile HOME -->
							<?php //Se for VIP, carrega url da VIP
if ($vip) {?>
								<a class="nav-link" href="<?php echo URL_VIP ?>">
									<?php
//caso nao, carrega url normal
} else {?>
									<a class="nav-link" href="<?php echo URL ?>">
									<?php }?>
									<div>HOME</div>
								</a>

								<?php //Se for VIP, carrega url da VIP
if ($vip) {?>
									<a class="nav-link" href="<?php echo URL_VIP ?>audicoes"><div style=" color: #fff7f7!important; background-color:#bf001a!important;">AUDIÇÕES</div></a>
									<?php
//caso nao, carrega url normal
} else {?>
									<a class="nav-link" href="<?php echo URL ?>audicoes"><div style=" color: #fff7f7!important; background-color:#bf001a!important;">AUDIÇÕES</div></a>
								<?php }?>


								<?php // tras Menu para mobile
//tras o banco mediante a localização
if ($vip) {
    $query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Vip' AND status='Ativo' ORDER BY ordem ASC ";
} else {
    $query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Aberto' AND status='Ativo' ORDER BY ordem ASC ";
}
$consulta = mysql_query($query);
$total = mysql_num_rows($consulta);
while ($dados_menu = mysql_fetch_array($consulta)) {
    ?>

									<a href="<?php if ($vip != true) {echo URL;} else {echo URL_VIP;}
    ;
    echo $dados_menu['link'];?>" align="center">
										<div><?php echo utf8_encode(strtoupper($dados_menu['nome_exibicao'])); ?></div>
									</a>
								<?php }?>





								<!-- Solohot no menu mobile -->
								<div class="col-lg-12 solohot-menu" style="margin-top: 13px;">
									<a href="<?php echo URL_SOLO ?>">
										<img src="<?php echo URL ?>imagens/logos/solohot_whitefull.png" alt="logo solohot menu mobile"/>
									</a>
								</div>
								<!-- Logo Cinehot no menu mobile -->
								<div class="col-lg-12 cinehot-menu">
									<a href="#"><img src="<?php echo URL ?>imagens/logos/cinehot_whitefull.png" alt="logo cinehot menu mobile"/></a>
								</div>
								<!-- Logo HoTV no menu mobile -->
								<div class="col-lg-12 hotv-menu">
									<a href="#"><img src="<?php echo URL ?>imagens/logos/hotv_whitefull.png" alt="logo hotv menu mobile"/></a>
								</div>
							</div>





							<?php
$query = "SELECT * FROM informs_indicativos WHERE pagina_exibicao = 'geral' AND status='Ativo'";
$consulta = mysql_query($query);
$dados = mysql_fetch_array($consulta);

if ($dados['status'] == "ativo" && $dados['tipo_informacao'] == "aviso") {?>



							<?php }?>

							<?php
if ($dados['status'] == "ativo" && $dados['tipo_informacao'] == "manutencao") {?>

								<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<h2 class="alert alerta-manutencao alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
													<div style="font-weight:bold;margin-bottom:7px">
														<span class="glyphicon glyphicon-wrench"></span>
														MANUTENÇÃO
													</div>
													<?php echo $dados['informacao']; ?>
												</h2>
											</div>
										</div>
									</div><!-- Alerta de Manutencao -->
								</div>
							<?php }?>
							<?php
if ($dados['status'] == "ativo" && $dados['tipo_informacao'] == "mensagem") {?>
								<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
									<div class="container">
										<div class="row">
											<div class="col-md-12">
												<div class="alert alerta-manutencao alert-dismissable">
													<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
													×</button>
													<div style="font-weight:bold;margin-bottom:7px">
														<span class="glyphicon glyphicon-envelope"></span>
														Mensagem INFORMATIVA
													</div>

													<?php echo $dados['informacao']; ?>
												</div>
											</div>
										</div>
									</div><!-- Alerta de mensagem -->
								</div><!-- fim do script de mensagem tipo = mensagem-->
							<?php }?>
						</nav>
					</div>
					<?php if ($detect->isMobile()) {?>
		<?php } else {?>
		<div class="botao-whatsapp">
			<a href="https://wa.me/5521979417517" target="_blank" style="
  position:fixed;
  left: 96.5%;
  width:60px;
  height:60px;
  bottom:40px;
  right:40px;
  background-color:#25d366;
  color:#FFF;
  border-radius:50px;
  text-align: center;
  font-size:30px;
  box-shadow: 1px 1px 2px #888;
  z-index:1000;
  ">
				<span data-toggle="tooltip" data-placement="left" title="Atendimento">
					<i class="fab fa-whatsapp" style="font-size: 39px;margin-top: 0px;margin-right: 0px;">
					</i>
				</span>

				<span style="font-size: 12px;font-family: &quot;Open Sans&quot;;float: none;line-height: 2em;"></span>
			</a>

		</div> 
	<?php }?>