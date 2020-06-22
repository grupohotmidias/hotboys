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
				<li class="app-sidebar__heading">Painel VIP</li>
				
				<!-- Home -->
				<li class="home">
					<a href="<?php echo URL_VIP ?>index.php">
						<i class="fa fa-home fa-1x"></i> 
						Página Inicial
					</a>
				</li>
				
				<!-- Audicoes Hot 3 -->
				<li class="audicoes">
					<a href="<?php echo URL_VIP ?>audicoes/">
						<i class="fas fa-couch fa-1x"></i>
						Audições Hot 3
					</a>
				</li>
				
				<!-- Meus favoritos -->
				<li class="meusFavoritos">
					<a href="<?php echo URL_VIP ?>meus-favoritos/">
						<i class="fa fa-star fa-1x"></i>
						Meus Favoritos
					</a>
				</li>
				
				<!-- Atores -->
				<li class="modelos">
					<a href="<?php echo URL_VIP ?>atores/">
						<i class="fas fa-user-friends"></i>
						Atores
					</a>
				</li>
				
				<!-- Séries -->
				<li class="series">
					<a href="<?php echo URL_VIP ?>series/">
						<i class="fas fa-gem"></i>
						Séries
					</a>
				</li>
				
				<!-- Sair -->
				<li>
					<a href="<?php echo URL_VIP ?>login/index.php?acao=sair">
						<i class="fa fa-power-off fa-1x">
						</i>Sair
					</a>
				</li>
				
				<li class="app-sidebar__heading mt-4">Suporte</li>
				
				<!-- Dúvidas -->
				<li class="duvidas">
					<a class="nav-link js-scroll-trigger menu-underline" href="javascript:void();" data-toggle="modal" data-target="#contato">
						<i class="fa fa-headphones fa-1x"></i>
						Fale Conosco
					</a>
				</li>
				
			</ul>
		</div>
	</div>
</div>    

