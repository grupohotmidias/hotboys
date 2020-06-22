<div class="app-header header-shadow">
	
	<div class="app-header__logo">
	
	<!-- Menu Hamburguer -->
		<div class="header__pane">
			<div>
				<button type="button" class="hamburger close-sidebar-btn " data-class="closed-sidebar">
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
		
		<!-- Logo topo -->
		<div class="logoTopo mx-auto">
			<a href="<?php echo URL_VIP ?>">
				<img src="<?php echo URL ?>/novo-projeto/assets/img/logos/logo-topo.png?v=30050" alt="logo topo" title="Hotboys - O site mais quente da net" class="mx-auto d-block" style="width: 75%;">
			</a>
		</div>
	</div>
	
	<div class="app-header__menu">
		<span>
			<button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
				<span class="btn-icon-wrapper">
					<i class="fa fa-search fa-w-6"></i>
				</span>
			</button>
		</span>
	</div>    
	
	<!-- conteudo do nav topo -->
	<div class="app-header__content">
		<div class="app-header-left">
			
			<!-- Logo topo -->
		<div class="logoTopo">
			<a href="<?php echo URL_VIP ?>">
				<img src="<?php echo URL ?>/novo-projeto/assets/img/logos/logo-topo.png?v=30050" alt="logo topo" title="Hotboys - O site mais quente da net" style="width: 70%;padding-left: 10px">
			</a>
		</div>
		
			<!-- Busca -->
			<div class="search-wrapper active">
				<div class="input-holder">
					
					<form action="<?php echo URL_VIP ?>busca/" method="get">
						<input type="search" id="search" name="search" class="search-input" placeholder="Digite sua busca...">
						<button class="search-icon active"><span></span></button>
					</form>
					
				</div>
			</div>
			
			<!--
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
			-->
		</div>
		
		<div class="app-header-right">
			<div class="header-btn-lg pr-0">
				<div class="widget-content p-0">
					<div class="widget-content-wrapper">
						<div class="widget-content-left">
							<div class="btn-group">
								<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
								<div style="position: relative;float: left;">
								<img width="42" class="rounded-circle" id="minha-conta-img-perfil" src="<?php echo $fotoPerfil ?>" alt="">
								<div class="online"></div>
								</div>
									<i class="fa fa-angle-down ml-2 opacity-8"></i>
								</a>
								<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
									
									<!-- Conta de usuario -->
									<a href="<?php echo URL_VIP ?>minha-conta/" target="_blank">
										<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa fa-user"></i>  Conta de usuário</button>
									</a>
									
									<!-- Configuracoes 
										<a href="<?php echo URL_VIP ?>perfil-novo">
										<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa-cog"></i> Configurações</button>
										</a>
									-->
								</div>
							</div>
						</div>
						
						
						
						
						<div class="widget-content-left ml-3 mr-3 header-user-info">
							<a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="p-0 btn">
								<div class="widget-heading">
								
								
								<div class="online"></div>
								
									<?php 
									$primeiroNome = $dados_user[primeiro_nome];
									$sobrenome = $dados_user[sobrenome];
									$nomeSobrenome = $dados_user[primeiro_nome] + $dados_user[sobrenome];
									$nomeExibicao = $dados_user[nome_exibicao];
									$nomeCliente = $dados_user[primeiro_nome] . ' ' . $dados_user[sobrenome];
									
									if($primeiroNome != ''){
										echo $nomeCliente;
										}elseif($nomeExibicao != '') {
										echo $nomeExibicao;
										}else{
										echo 'Usuario';
										}
										
										
										?>
								</div>
							</a>
							<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right" style="width:90%">
									
									
									<a href="<?php echo URL_VIP ?>minha-conta/">
										<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa fa-user"></i>  Conta de usuário</button>
									</a>
																		
								</div>
							<div class="widget-subheading">
								Cliente VIP
							</div>
						</div>
						
						
						
						<!-- Botao de deslogar -->
						<div class="widget-content-right header-user-info ml-3">
							<a href="<?php echo URL_VIP ?>logoff/">
								<button type="button" class="btn-shadow p-1 btn btn-primary btn-sm show-toastr-example sair">
									<i class="fa fa-power-off"></i>
								</button>
							</a>
						</div>
						
					</div>
				</div>
			</div>       
		</div>
	</div>
</div>        
																																																																																