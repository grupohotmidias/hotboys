<?php
	
	include('../includes/vip.php');		
	
	if($_GET[acao]=='iframe-informacoes-pgto'){
		//abrir iframe de pagamento	
		$AbrirIframePagamento = true;
		
		} else {
		//verificar se pagamento est� ok	
		verificar_pgto();
	}
	
	$id_email_gpagamentos = criar_id_iframe($_SESSION[email_cliente_logado]);
	
	$email_cliente_logado = $_SESSION[email_cliente_logado];
	
	if($_SESSION[email_cliente_logado] !=''){
		
		//consulta se usuario ja exite no bd 
		$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$email_cliente_logado' ";
		$consulta_user = mysql_query($query_user);
		$total_user = mysql_num_rows($consulta_user);
		
		//cadastra o email no banco de user caso o perfil dele nao esteja prenchido
		if($total_user < 1){
			
			$query = "INSERT INTO `usuarios_perfil`(
			`id`, 
			`primeiro_nome`, 
			`email`, 
			`nome_exibicao`,
			`foto_perfil`
			) VALUES (
			NULL , '', '$email_cliente_logado','','')";
			
			$status = mysql_query($query);
			
		}//FIM total user
	}// FIM consulta user
	
	
	//imagem do perfil
	if($vip == true){ 
		if($dados_user['foto_perfil'] == ''){
			//não tem foto de perfil
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';		
			} else {
			//tem foto de perfil
			//$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';	
		}
	}
?>
<?php 
	//configuracao
	require_once('../config/configuracoes.php'); 
	
	//Recursos importantes do site  
	require_once('../../includes/funcoes.php');
	
	//class paginação
	require('../includes/PaginacaoConteudoClass.php');
	
	//programacao
	require('includes/paginacao/programacao-cenas.php');
?>


<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Hotboys - Área VIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- CSS Principal (do admin) -->
	<link href="./main.css?v=35115" rel="stylesheet"></head>
	
	<!-- CSS do site -->
	<link href="https://www.hotboys.com.br/novo-projeto/assets/css/estilo.css?v=<?php echo Version; ?>" rel="stylesheet">
	
	<body>
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			<div class="app-header header-shadow">
				<div class="app-header__logo">
					
					<!-- Logo topo -->
					<div>
						<img src="https://www.hotboys.com.br/novo-projeto/assets/img/logos/logo-topo.png?v=30050" alt="logo topo" title="Hotboys - O site mais quente da net" style="width: 90%">
					</div>
					
					<div class="header__pane ml-auto">
						<div>
							<button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
								<span class="hamburger-box">
									<span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
				</div>
				<div class="app-header__mobile-menu">
					<div>
						<button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
							<span class="hamburger-box">
								<span class="hamburger-inner"></span>
							</span>
						</button>
					</div>
				</div>
				<div class="app-header__menu">
					<span>
						<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
							<span class="btn-icon-wrapper">
								<i class="fa fa-ellipsis-v fa-w-6"></i>
							</span>
						</button>
					</span>
					</div>    <div class="app-header__content">
					<div class="app-header-left">
						<div class="search-wrapper">
							<div class="input-holder">
								<input type="text" class="search-input" placeholder="Digite sua busca">
								<button class="search-icon"><span></span></button>
							</div>
							<button class="close"></button>
						</div>
						<ul class="header-menu nav">
							<li class="nav-item">
								<a href="javascript:void(0);" class="nav-link">
									<i class="nav-link-icon fa fa-database"> </i>
									Statistics
								</a>
							</li>
							<li class="btn-group nav-item">
								<a href="javascript:void(0);" class="nav-link">
									<i class="nav-link-icon fa fa-edit"></i>
									Projects
								</a>
							</li>
							<li class="dropdown nav-item">
								<a href="javascript:void(0);" class="nav-link">
									<i class="nav-link-icon fa fa-cog"></i>
									Settings
								</a>
							</li>
						</ul>        
					</div>
					
					<div class="app-header-right">
						<div class="header-btn-lg pr-0">
							<div class="widget-content p-0">
								<div class="widget-content-wrapper">
									<div class="widget-content-left">
										<div class="btn-group">
											<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
												<img width="42" class="rounded-circle" src="<?php echo $fotoPerfil ?>" alt="">
												<i class="fa fa-angle-down ml-2 opacity-8"></i>
											</a>
											<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
												<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa fa-user"></i>  Conta de usuário</button>
												<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa-cog"></i> Configurações</button>
												<h6 tabindex="-1" class="dropdown-header">Header</h6>
												<a href="<?php echo URL_VIP ?>login/index.php?acao=sair">
												<button type="button" tabindex="0" class="dropdown-item">Sair</button>
												</a>
											</div>
										</div>
									</div>
									<div class="widget-content-left  ml-3 header-user-info">
										<div class="widget-heading">
											<?php if($dados_user[primeiro_nome]){
												echo($dados_user[primeiro_nome]);
												}else{ 
												echo 'Usuario';
											}?>
										</div>
										<div class="widget-subheading">
											Cliente VIP
										</div>
									</div>
									<div class="widget-content-right header-user-info ml-3">
										<button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example">
											<i class="fa text-white fa-calendar pr-1 pl-1"></i>
										</button>
									</div>
								</div>
							</div>
						</div>       
					</div>
				</div>
			</div>        
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
				</div>        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
									</span>
								</button>
							</div>
						</div>
					</div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
								</span>
							</button>
						</div>
					</div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
								</span>
							</button>
						</span>
					</div>    
					<div class="scrollbar-sidebar">
                        <div class="app-sidebar__inner">
                            <ul class="vertical-nav-menu">
                                <li class="app-sidebar__heading">Dashboards</li>
                                <li>
                                    <a href="index.html" class="mm-active">
                                        <i class="metismenu-icon pe-7s-video"></i>
										Vídeos
									</a>
								</li>
                                <li class="app-sidebar__heading">UI Components</li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-diamond"></i>
                                        Elements
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
									</a>
                                    <ul>
                                        <li>
                                            <a href="elements-buttons-standard.html">
                                                <i class="metismenu-icon"></i>
                                                Buttons
											</a>
										</li>
                                        <li>
                                            <a href="elements-dropdowns.html">
                                                <i class="metismenu-icon">
												</i>Dropdowns
											</a>
										</li>
                                        <li>
                                            <a href="elements-icons.html">
                                                <i class="metismenu-icon">
												</i>Icons
											</a>
										</li>
                                        <li>
                                            <a href="elements-badges-labels.html">
                                                <i class="metismenu-icon">
												</i>Badges
											</a>
										</li>
                                        <li>
                                            <a href="elements-cards.html">
                                                <i class="metismenu-icon">
												</i>Cards
											</a>
										</li>
                                        <li>
                                            <a href="elements-list-group.html">
                                                <i class="metismenu-icon">
												</i>List Groups
											</a>
										</li>
                                        <li>
                                            <a href="elements-navigation.html">
                                                <i class="metismenu-icon">
												</i>Navigation Menus
											</a>
										</li>
                                        <li>
                                            <a href="elements-utilities.html">
                                                <i class="metismenu-icon">
												</i>Utilities
											</a>
										</li>
									</ul>
								</li>
                                <li>
                                    <a href="#">
                                        <i class="metismenu-icon pe-7s-car"></i>
                                        Components
                                        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
									</a>
                                    <ul>
                                        <li>
                                            <a href="components-tabs.html">
                                                <i class="metismenu-icon">
												</i>Tabs
											</a>
										</li>
                                        <li>
                                            <a href="components-accordions.html">
                                                <i class="metismenu-icon">
												</i>Accordions
											</a>
										</li>
                                        <li>
                                            <a href="components-notifications.html">
                                                <i class="metismenu-icon">
												</i>Notifications
											</a>
										</li>
                                        <li>
                                            <a href="components-modals.html">
                                                <i class="metismenu-icon">
												</i>Modals
											</a>
										</li>
                                        <li>
                                            <a href="components-progress-bar.html">
                                                <i class="metismenu-icon">
												</i>Progress Bar
											</a>
										</li>
                                        <li>
                                            <a href="components-tooltips-popovers.html">
                                                <i class="metismenu-icon">
												</i>Tooltips &amp; Popovers
											</a>
										</li>
                                        <li>
                                            <a href="components-carousel.html">
                                                <i class="metismenu-icon">
												</i>Carousel
											</a>
										</li>
                                        <li>
                                            <a href="components-calendar.html">
                                                <i class="metismenu-icon">
												</i>Calendar
											</a>
										</li>
                                        <li>
                                            <a href="components-pagination.html">
                                                <i class="metismenu-icon">
												</i>Pagination
											</a>
										</li>
                                        <li>
                                            <a href="components-scrollable-elements.html">
                                                <i class="metismenu-icon">
												</i>Scrollable
											</a>
										</li>
                                        <li>
                                            <a href="components-maps.html">
                                                <i class="metismenu-icon">
												</i>Maps
											</a>
										</li>
									</ul>
								</li>
                                <li  >
                                    <a href="tables-regular.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Tables
									</a>
								</li>
                                <li class="app-sidebar__heading">Widgets</li>
                                <li>
                                    <a href="dashboard-boxes.html">
                                        <i class="metismenu-icon pe-7s-display2"></i>
                                        Dashboard Boxes
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>    
				<div class="app-main__outer">
                    <div class="app-main__inner">
						
						
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
								
								<!-- Titulo do conteudo -->
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-video icon-gradient bg-mean-fruit">
										</i>
									</div>
                                    <div>Lista de Vídeos
                                        <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
										</div>
									</div>
								</div>
								
                               	</div>
						</div>    
						
						<!-- Main Content -->
						<div id="content">
							
							<!-- videos com paginacao -->
							<section class="cenas">
								<div class="container-fluid" style="padding:0">
									
									<!-- CENAS -->
									<div class="row">
										
										<!-- Consulta cenas -->
										<ul>
											<?php while($row_conteudo = mysql_fetch_array($consulta_cenas)){ ?>	
												<li class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-6 cenas">
													<a href="<?php echo utf8_encode(URL.'cena/'.$row_conteudo[id].'/'.URL_amigavel($row_conteudo[titulo])) ?>">										
														<div class="card mb-2 box-shadow my-xl-2">
															
															<!-- imagem da cena -->
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php echo $row_conteudo[cena_home] ?>" data-holder-rendered="true">
															</div>
															
															<div class="card-body">
																<h1 class="card-titulo"><?php echo utf8_encode($row_conteudo['titulo'])?></h1>
																<!--<p class="curtidas card-text">Elenco: Marcelo Mastro, Hugo Gobi</p>-->
																<div class="curtidas d-flex justify-content-between align-items-center">
																	<div class="btn-group">
																		<button type="button" class="btn btn-sm like">
																			<img src="<?php echo URL ?>novo-projeto/assets/img/icones/like.png"/> 22
																		</button>
																		<button type="button" class="btn btn-sm deslike">
																			<img src="<?php echo URL ?>novo-projeto/assets/img/icones/deslike.png"/> 0
																		</button>
																	</div>
																</div>
															</div>
															
														</div>
													</a>
												</li>
											<?php } ?>
										</ul>
										
										
									</div>
									
									<!-- paginacao -->
									<nav aria-label="Page navigation example" class="navigation">
										<ul class="pagination justify-content-center">
											<li class="page-item"><a class="page-link" href="#">Anterior</a></li>
											<li class="page-item"><a class="page-link" href="#">1</a></li>
											<li class="page-item"><a class="page-link" href="#">2</a></li>
											<li class="page-item"><a class="page-link" href="#">3</a></li>
											<li class="page-item"><a class="page-link" href="#">4</a></li>
											<li class="page-item"><a class="page-link" href="#">5</a></li>
											<li class="page-item"><a class="page-link" href="#">Próxima</a></li>
										</ul>
									</nav>
									
								</div>
								
							</section>
							
							<!-- videos mais populares -->
							<section class="populares">
								<div class="container-fluid" style="padding:0">
									
									<!-- Titulo - videos mais populares -->
									<div class="app-page-title">
										<div class="page-title-wrapper">
											
											<!-- Titulo do conteudo -->
											<div class="page-title-heading">
												<div class="page-title-icon">
													<i class="pe-7s-like icon-gradient bg-mean-fruit">
													</i>
												</div>
												<div>Mais Populares
													<div class="page-title-subheading">This is an example dashboard created using build-in elements and components.
													</div>
												</div>
											</div>
											
										</div>
									</div>
									
									<!-- Cenas - videos mais populares -->	
									<div class="row">
										<ul>
											<!-- Consulta cenas -->
											<?php // consulta das cenas
												$query_cenas="SELECT * FROM `cenas` WHERE status='Ativo' order by data DESC LIMIT 6";
												$consulta_cenas=mysql_query($query_cenas);
											?>
											<?php while ($row_cenas=mysql_fetch_array ($consulta_cenas)){ ?>
												<li class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cenas">
													<a href="#">
														<div class="card mb-1 box-shadow my-xl-2">
															
															<!-- titulo dos videos populares -->
															<h1 class="card-titulo"><?php echo utf8_encode($row_cenas['titulo']) ?></h1>
															
															<!-- botao curtidas dos videos populares -->
															<div class="votos">
																<div class="like"><i class="icon"></i> 75
																</div>
															</div>
															
															<div class="thumb">
																<img class="card-img-top" alt="Thumbnail"  src="https://server2.hotboys.com.br/arquivos/<?php if($row_cenas[cena_home] != ''){
																	echo $row_cenas['cena_home'];
																	}else{
																	echo '0_cena.jpg';
																}
																?>" data-holder-rendered="true">
																</div>
															</div>
														</a>
													</li>
												<?php } ?>
											</ul>
										</div>
										
										
									</div>
								</section>
								
								
								
							</div>
							<!-- End of Main Content -->
							
							
						</div>
						
						<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
					</div>
				</div>
			<script type="text/javascript" src="./assets/scripts/main.js"></script></body>
		</html>
		