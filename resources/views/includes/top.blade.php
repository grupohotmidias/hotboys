
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
	<nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
		<div class="container">
			<!-- SLOGAN e os 4 outros sites do grupo -->
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
				<div class="navtopo-collapse">
					<ul class="navtopo-nav mr-auto sites-topo">
						<li class="nav-item slogan solo">
							<a href="" target="_blank">
								<!-- Icone solohot do topo -->
								<img src="{{ asset('imagens/icones/topo/icone-solo-topo.jpg') }}" alt="icone solohot"/> 
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Topo com links e Idiomas (Fundo Preto) -->
	<nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
		<div class="container">
			<!-- SLOGAN e os 4 outros sites do grupo -->
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
				<div class="navtopo-collapse">
					<ul class="navtopo-nav mr-auto sites-topo">
						<li class="nav-item slogan topo" style="float: left!important;">
							<a href="" target="_blank">
								<!-- Icone hotboys do topo -->
								<div class="icone-hot-topo"></div>
								<span></span>
							</a>
						</li> 
					</ul>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 topo-slogan" >
				<div class="navtopo-collapse">
					<ul class="navtopo-nav mr-auto" style="margin: 0 auto; float: none;">
						<li class="nav-item slogan topo" ></li> 
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<!-- Div da logo, botoes e busca (Fundo Branco) -->
	<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- LOOGOMARCAS DO TOPO -->
				<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 topo-menu-principal-mobile">
					<header class="cf"> 
						<a id="navicon" class="closed">&#9776;
							<span></span>
						</a>
					</header>
				</div>
			</div>
		</div>
	</nav>
	<header class="assineja-entrar">
		<ul>
			<div class="col-sm-6 col-xs-6">
				<li class="nav-item assineja">
					<a class="nav-link" href="">Assine Já</a> 
				</li>
			</div>
			<div class="col-sm-6 col-xs-6">
				<li class="nav-item entrar"> 
					<a class="nav-link" href="">Entrar</a>
				</li> 
			</div>
		</ul>
	</header>
	<!-- Div da logo, botoes e busca (Fundo Branco) -->
	<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
		<div class="container">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- LOOGOMARCAS DO TOPO -->
				<!-- Logo Preta p/ fundo claro -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top:0;margin-bottom:0"> 
					<a class="navlogo-brand" href="">
						<img src="{{ asset('imagens/logos/logo-topo.png') }}" alt="Logo topos" style="margin-left: 16px;"/> 
					</a>
				</div>
				<!-- botoes ASSINE e ENTRAR -->
				<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center">
					<form method="post" action=""> 
						<input type="search" id="search" name="search" placeholder="Busca..." list="preenchimento-automatico">
					</form>		
				</div>
				<!-- Formulario NÃO VIP - Botão Busca -->
				<div class="col-lg-3 col-md-3 col-sm-4 col-xs-3 busca-topo">
					<div class="botoes-topo-acesso" style="float: right;">
						<a href=""><button type="button" class="btn-login"><span>Entrar</span></button></a>
						<a href="">
							<button type="button" class="btn-assinar" style=" background: #20b038!important; color: #fff;"><span><i class="fa fa-lock"></i> Assinar</span></button></a>
					</div>	
				</div>
				<!-- FIM Formulario NÃO VIP - Botão Busca -->
	
				<!-- Formulario VIP - Botão Busca -->
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 recursos-topo-vip" style="float:right">
					<!--##	INICIO Area do Cliente VIP no TOPO  ##-->
					{{--  <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:7px;">
											<span class="minha-conta-sair" style="float:right"><a href="">
											<button type="button" class="btn btn-assinar" style="background:#5a5657!important;"><span>Sair</span></button></a></span>
										</div>  --}}
					<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<div class="usuario-topo">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" class="area-cliente-topo" style="background: #e2dcde;height:56px">
								<!--## INICIO Link - Area do Cliente VIP no TOPO  ##-->
								<a href="" style="color: #0d0d0d;">
									<div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12 info-cliente-topo-desktop" style="margin:0 auto;float:none!important;padding-left: 5px!important;padding-right: 5px!important;margin-top:5px;">
	
										{{--  Se usuario tiver logado  --}}
										{{--  <div class="espaco-imagem-topo-desktop" style="float: left; width: 40%;">
																	<img src="{{ asset('imagens/icones/perfil/avatar_sfoto.jpg') }}" alt="imagem cliente" style="width: 39px; border-radius:50%;margin-top: 4px; margin-right: 16px">
									</div>  --}}
									{{--  Fim se usuario tiver logado  --}}
	
									<!--## INICIO Saudacao - Area do Cliente VIP no TOPO  ##-->
									<div class="espaco-perfil-topo-desktop" style=" float: left; width: 60%; text-align: left">
										<div class="perfil-info espaco-saudacao" style="float: left; margin-top: 9px;text-align:leftc;color: #000;">
											<!-- Saudacao - Area do Cliente VIP no TOPO  -->
											<span class="saudacao" style="width: 100%; float: left">
											</span>
											<!-- Nome Exibicao - Area do Cliente VIP no TOPO -->
											<span class="nome" style="width: 100%; float: left">
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
		</div>
	</div>
	</nav>
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
										<div style="width:46px;height:46px;background-image: url(); background-repeat: no-repeat;background-size: 46px 46px;border-radius: 50%;">
	
										</div>
									</div>
									<div class="perfil-mobile-info">
										<!-- Saudacao ao cliente -->
										<span class="saudacao">
	
										</span>
										<span class="nome-area-cliente">
	
										</span>
									</div>
								</div>
								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
									<!-- Botao de engrenagem que carrega o menu vertical -->
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1" href="#bs-sidebar-navbar-collapse-1">
										<span class="sr-only">Toggle navigation</span>
										<span class="glyphicon glyphicon-cog"></span>
									</button>   <!-- FIM Botao de engrenagem que carrega o menu vertical --> 
								</div>
								<!-- Informacoes do  cliente -->
							</div>
						</div>
						<!-- Menu vertical do cliente -->
						<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
							<ul class="nav navbar-nav">
								<li class="#"><a href=""><span style="font-size:16px;margin-right:5px;" class="pull-left showopacity glyphicon glyphicon-home"></span></a></li>
								<li ><a href=""><span style="font-size:16px;margin-right:5px;" class="pull-left showopacity glyphicon glyphicon-heart"></span> Cenas Favoritas</a></li>        
								<li ><a href=""><span style="font-size:16px;margin-right:5px;" class="pull-left showopacity glyphicon glyphicon-log-out"></span> Sair</a></li>
							</ul>
						</div>
						<!-- FIM Menu vertical do cliente -->
					</nav>
				</div>
				<!-- FIM Menu do Cliente -->
			</div>
		</div>
	</div>
	<!-- Menu principal DESKTOP(Fundo Vermelho) -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
		<div class="container">
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav mx-auto">
					<li class="nav-item">
						<a class="nav-link" href="">
							HOME
						</a> 
					</li> 
					<li class="nav-item">
						<a class="nav-link audicoes" href="">
							<i class="fas fa-star fa-xs"></i> AUDIÇÕES <i class="fas fa-star fa-xs"></i>
						</a> 
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- Alerta de AVISO -->
	<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="container bootstrap snippet aviso-audicoes">
						<a href="">
							<div class="alert alerta-manutencao alert-white rounded">
								<button type="button" data-dismiss="alert" aria-hidden="true" class="close">
									<i class="fa fa-window-close" aria-hidden="true"></i></button>
								<div class="icon">
									<i class="fas fa-couch"></i>
								</div>
								<strong style="display:none"></strong> 
							</div> 
						</a>
					</div>
				</div>
			</div>
		</div>
	</div><!-- Alerta de Aviso-->
	
	<!-- Menu principal (MOBILE) -->
	
	<div id="main-nav">
		<nav> 
			<!-- Bandeiras do menu MOBILE -->
			<div class="col-sm-12 col-xs-12">
				<div id="topo-bandeiras">
					<div class="topo-bandeira">
						<a href="#"><img src="" border="0" alt="bandeira brasil"></a></div>
					<div class="topo-bandeira">
						<a href="#"><img src="" border="0" alt="bandeira eua"></a></div>
				</div>
			</div>
			<div class="col-sm-12 col-xs-12 logo-branca-menu"> 
				<a href="">
					<img src=""/>
				</a> 
			</div>
			<div class="col-sm-12 busca-mobile float-left" align="center">
				<form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/busca" style="float:left">
					<input type="search" id="search" name="search" placeholder="Busca...">
				</form>
			</div>
			<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
				<div class="col-sm-12 col-xs-12 float-left">
					<a href="">
						<button type="button" class="btn btn-assinar" style="margin-left:0%">
							<span>Assinar</span>
						</button>
					</a>
				</div>
				<div class="col-sm-12 col-xs-12 float-left">
					<a href="">
						<button type="button" class="btn btn-login" style="margin-right:0%">
							<span>Entrar</span>
						</button>
					</a>
				</div>
			</div>
			<div class="col-sm-12 busca-mobile float-left" align="center">
				<form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/vip/busca" style="float:left">
					<input type="search" id="search" name="search" placeholder="Busca...">
				</form>
			</div>
			<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
				<div class="col-sm-12 col-xs-12 float-left">
					<a href="">
						<button type="button" class="btn btn-minhaconta"></button></a>
					<a href="">
						<button type="button" class="btn btn-sair">
							Sair
						</button>
					</a>
				</div>
			</div>
			<!--Menu AUDIÇAO -->
			<div class="col-sm-12 menu-mobile" > 
				<!-- menu mobile HOME -->
				<a class="nav-link" href="">
					<a class="nav-link" href="">
						<div>HOME</div>
					</a> 
					<a class="nav-link" href=""><div style=" color: #fff7f7!important; background-color:#bf001a!important;">AUDIÇÕES</div></a>
					<a class="nav-link" href=""><div style=" color: #fff7f7!important; background-color:#bf001a!important;">AUDIÇÕES</div></a>
					<a href="" align="center">
						<div>
	
						</div>
					</a>
					<!-- Solohot no menu mobile -->
					<div class="col-lg-12 solohot-menu" style="margin-top: 13px;">
						<a href="">
							<img src="{{ asset('imagens/logos/solohot_whitefull.png') }}" alt="logo solohot menu mobile"/>
						</a>
					</div>
					<!-- Logo Cinehot no menu mobile -->
					<div class="col-lg-12 cinehot-menu">
						<a href="#"><img src="{{ asset('imagens/logos/cinehot_whitefull.png') }}" alt="logo cinehot menu mobile"/></a>
					</div>
					<!-- Logo HoTV no menu mobile -->
					<div class="col-lg-12 hotv-menu">
						<a href="#"><img src="{{ asset('imagens/logos/hotv_whitefull.png') }}" alt="logo hotv menu mobile"/></a>
					</div>
			</div>
			<style>
				.botao-whatsapp a{position: fixed;z-index: 9999;right: 0;float: right;top: 40%;margin-top: -25px;cursor: pointer;min-width: 50px;max-width: 150px;color: #fff;text-align: center;padding: 10px;margin: 0 auto 0 auto;background: #20B038;-webkit-transition: All 0.5s ease;-moz-transition: All 0.5s ease;-o-transition: All 0.5s ease;-ms-transition: All 0.5s ease;transition: All 0.5s ease;box-shadow: 8px 2px 5px #131313b8;}
				.botao-whatsapp a:hover{color:#fff!important;background:#e31330;}
			</style>
			<div class="botao-whatsapp">
				<a href="https://wa.me/5521965035394" target="_blank">
					<span>
						<i class="fab fa-whatsapp" style="font-size: 23px;margin-top: 0px;float: left;margin-right: 5px;">
						</i>
					</span> 
					<span style="font-size: 12px;font-family: &quot;Open Sans&quot;;float: none;line-height: 2em;">Atendimento</span>
				</a>
			</div>	
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
							</h2>
						</div>
					</div>
				</div><!-- Alerta de Manutencao -->
			</div>
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
							</div>
						</div>
					</div>
				</div>
				<!-- Alerta de mensagem -->
			</div>
			<!-- fim do script de mensagem tipo = mensagem-->
		</nav>
	</div>																																																													