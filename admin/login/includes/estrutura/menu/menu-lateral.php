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
	
	<!-- Comeco do menu -->
	<div class="scrollbar-sidebar">
		<div class="app-sidebar__inner">
			<ul class="vertical-nav-menu metismenu">
				<li class="app-sidebar__heading">ÁREA DO ATOR</li>
				
				<!-- Home -->
				<li class="home">
					<a class="nav-link" href="<?= URL ?>admin/login/painel/">
						<i class="fa fa-home fa-1x"></i> 
						Home
					</a>
				</li>
				
				
				
				<li class="app-sidebar__heading mt-4">Meu Hot</li>
				
				<!-- menu Minha Pagina -->
				<?php if($consulta_ator["nome"] != ''){ ?>
				<li class="meusFavoritos">
					<a class="nav-link" href="https://<?= $consulta_ator["nome"] ?>.hotboys.com.br/" target="_blank">
						<i class="fa fa-star fa-1x"></i>
						Minha Página
					</a>
				</li>
				<?php } ?>
				
				<!-- Meus favoritos -->
				<li class="minhaConta">
					<a class="nav-link" href="<?php echo URL_VIP ?>minha-conta/">
						<i class="fas fa-address-book fa-1x"></i>
						Minha Conta
					</a>
				</li>
				
			</ul>
			
			<!-- Sair 
			<div class="scrollbar-sidebar">
				<div class="app-sidebar__inner">
					<ul class="vertical-nav-menu metismenu">
						<li>
							<a class="nav-link" href="<?php echo URL_VIP ?>login/index.php?acao=sair">
								<i class="fa fa-power-off fa-1x"> 
								</i>Sair
							</a>
						</li>
					</ul>
				</div>
			</div>
			-->
			 
		</div>

	</div>
	
	
	
</div>    

		