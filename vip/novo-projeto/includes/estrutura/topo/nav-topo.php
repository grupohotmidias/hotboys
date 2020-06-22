<div class="app-header header-shadow">
	
	<!-- Logo topo -->
	<div class="app-header__logo">
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
		</div>    

		<div class="app-header__content">
		<div class="app-header-left">
		
		<!-- Busca -->
			<div class="search-wrapper active">
				<div class="input-holder">
				
				<form action="<?php echo URL_VIP ?>busca/" method="post">
					<input type="search" id="search" name="search" class="search-input" placeholder="Digite sua busca">
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
									<img width="42" class="rounded-circle" id="minha-conta-img-perfil" src="<?php echo $fotoPerfil ?>" alt="">
									<i class="fa fa-angle-down ml-2 opacity-8"></i>
								</a>
								<div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
								
								<!-- Conta de usuario -->
								<a href="<?php echo URL_VIP ?>minha-conta/">
									<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa fa-user"></i>  Conta de usuário</button>
									</a>
									
									<!-- Configuracoes 
									<a href="<?php echo URL_VIP ?>perfil-novo">
									<button type="button" tabindex="0" class="dropdown-item"><i class="nav-link-icon fa fa-cog"></i> Configurações</button>
									</a>
									-->
									<h6 tabindex="-1" class="dropdown-header">Header</h6>
									
									<!-- Botao sair -->
									<a href="<?php echo URL_VIP ?>login/index.php?acao=sair">
										<button type="button" tabindex="0" class="dropdown-item">Sair</button>
									</a>
									
								</div>
							</div>
						</div>
						
						<!-- Nome do cliente -->
						<div class="widget-content-left  ml-3 header-user-info">
							<div class="widget-heading">
								<?php if($dados_user[primeiro_nome]){
									echo($dados_user[primeiro_nome]. '&nbsp;' .$dados_user[sobrenome]); ;
									}else{ 
									echo 'Usuario';
								}?>
							</div>
							<div class="widget-subheading">
								Cliente VIP
							</div>
						</div>
						
						<!-- Botao de deslogar -->
						<div class="widget-content-right header-user-info ml-3">
							<a href="<?php echo URL_VIP ?>login/index.php?acao=sair">
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
