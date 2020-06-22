<div class="fixed-top">
	
	<!-- menu das marcas - topo -->
	<div class="menuMarcas desktop">
		<div class="container">
			<div class="row">
				<ul class="nav">
					
					<li class="dropdown bareback">
						<a href="https://www.bareback.com.br" target="_blank" class="barebackMenu"><img src="<?php echo URL ?>assets/img/icones/bareback-icone.png" /> Bareback
						</a>
					</li>
					<li class="dropdown solohot">
						<a href="https://www.solohot.com.br" target="_blank" class="solohotMenu"><img src="<?php echo URL ?>assets/img/icones/solohot-icone.png" /> Solohot
						</a>
					</li>
					
				</ul>
			</div>
		</div>
	</div>
	
	
	<!-- MENU PRINCIPAL - DESKTOP -->
	<nav class="navbar navbar-expand-lg desktop" id="mainNav">
		
		<div class="container p-1">
			
			<!-- Logo Topo -->
			<div class="logo">
				<a class="navbar-brand js-scroll-trigger" href="<?php echo URL ?>">
					<img src="<?php echo URL ?>assets/img/logos/logo-topo.png?v=<?php echo Version; ?>" alt="logo topo" title="Hotboys - O site mais quente da net">
				</a>
			</div>
			
			<div class="botoes-topo d-flex justify-content-end">
				<div class="collapse navbar-collapse" id="navbarResponsive">
					
					<!-- Menu em lista -->
					<ul class="navbar-nav mr-auto">
						<!-- menu home -->
						<li class="nav-item mx-0 mx-lg-1 hover home">
							<a class="nav-link js-scroll-trigger menu-underline" href="<?php echo URL ?>">Home
								<div class="underline-home"></div>
							</a>
						</li>
						<!-- menu audicoes -->
						<li class="nav-item mx-0 mx-lg-1 hover audicoes">
							<a class="nav-link js-scroll-trigger menu-underline" href="<?php echo URL ?>audicoes/">Audições
								<div class="underline-audicoes"></div>
							</a>
						</li>
						<!-- menu videos -->
						<li class="nav-item mx-0 mx-lg-1 hover cenas">
							<a class="nav-link js-scroll-trigger menu-underline" href="<?php echo URL ?>videos/">Cenas
								<div class="underline-videos"></div>
							</a>
						</li>
						<!-- menu modelos -->
						<li class="nav-item mx-0 mx-lg-1 hover modelos">
							<a class="nav-link js-scroll-trigger menu-underline" href="<?php echo URL ?>atores/">Atores
								<div class="underline-modelos"></div>
							</a>
						</li>
						<!-- menu contato -->
						<li class="nav-item mx-0 mx-lg-1 hover contato">
							<a class="nav-link js-scroll-trigger menu-underline" href="javascript:void();" data-toggle="modal" data-target="#contato">Contato</a>
						</li>
						
						
						<!-- busca do topo 
						<form class="busca-topo" action="https://www.hotboys.com.br/busca-novo/" method="post">
							<input type="search" id="search" name="search" class="search-input" placeholder="Digite sua busca">
							<button class="search-icon active" style="cursor: pointer;">
								<span></span>
							</button>
						</form>
						-->
						
						<li class="nav-item mx-0 mx-lg-1 hover">
					<span>Busca</span>
					<form class="busca-topo" action="<?php echo URL ?>busca/" method="post">
							<input type="search" id="search" name="search" class="search-input" placeholder="Digite sua busca">
							<button class="search-icon active" style="cursor: pointer;">
							<i class="fa fa-search"></i>
							</button>
						</form>
						</li>
					</ul>
						
					<!-- botoes login e assine -->
					<div class="botoes">
						<a href="https://www.hotboys.com.br/vip/" class="assinantes"><i class="fas fa-user"></i> Login</a>
						<a href="<?php echo URL ?>assine/" class="assine btn-success"><i class="fas fa-lock"></i> Assine</a>
					</div>
					
				</div>
			</div>
			
		</div>
	</nav>
</div>

<!-- MENU PRINCIPAL - MOBILE -->
<nav class=" navbar menu-mobile">
	<div class="container">
		
		<!-- Logo Topo -->
		<div class="logo">
			<a class="navbar-brand js-scroll-trigger" href="<?php echo URL ?>">
				<img src="<?php echo URL ?>assets/img/logos/logo-topo.png?v=<?php echo Version; ?>" alt="logo topo" title="Hotboys - O site mais quente da net">
			</a>
		</div>
		<!-- botao assine -->
		<div class="botoes d-flex justify-content-end">
			<a href="<?php echo URL ?>assine/" class="assine-mobile btn-success"><i class="fas fa-lock"></i> Assine</a>
		</div>
		
		<!-- menu -->
		<div class="menu">
			<ul>
				<!-- menu videos -->
				<li>
					<a href="<?php echo URL ?>videos/">VÍDEOS</a>
				</li>
				
				<!-- menu modelos -->
				<li>
					<a href="<?php echo URL ?>atores/">Atores</a>
				</li>
				
				<!-- menu login -->
				<li>
					<a href="https://www.hotboys.com.br/vip/">LOGIN</a>
				</li>
			</ul>
			
		</div>
	</div>
</nav>

<!-- MENU MOBILE - FIXO -->
<nav class="navbar navbar-expand-lg fixed-top scroll-to-top mobile" id="mainNav">
	
	<!-- menu das marcas - topo -->
	<div class="container-fluid">
		<div class="menuMarcas mobile">
			<div class="container">
				<div class="row">
					<ul class="nav">
						
						<li class="dropdown bareback">
							<a href="https://www.bareback.com.br" target="_blank" class="barebackMenu">
							<img src="<?php echo URL ?>assets/img/icones/bareback-icone.png" /> Bareback
							</a>
						</li>
						<li class="dropdown solohot">
							<a href="https://www.solohot.com.br" target="_blank" class="solohotMenu">
							<img src="<?php echo URL ?>assets/img/icones/solohot-icone.png" /> Solohot
							</a>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
	</div>
	
	<div class="container">
		<!-- Logo Topo -->
		<div class="logo">
			<a class="navbar-brand js-scroll-trigger" href="<?php echo URL ?>">
				<img src="<?php echo URL ?>assets/img/logos/logo-topo.png?v=<?php echo Version; ?>" alt="logo topo" title="Hotboys - O site mais quente da net">
			</a>
		</div>
		
		<!-- Menu -->
		<div class="botoes d-flex justify-content-end">
			
			<button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold text-white" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				<i class="fas fa-bars fa-3x"></i>
			</button>
			
			<a href="<?php echo URL ?>assine/" class="assine-mobile btn-success"><i class="fas fa-lock"></i> Assine</a>
			
		</div>
		<div class="collapse navbar-collapse" id="navbarResponsive">
			<ul class="navbar-nav mx-auto">
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link js-scroll-trigger" href="/">Home</a>
				</li>
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link js-scroll-trigger" href="<?php echo URL ?>audicoes/">Audições</a>
				</li>
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link js-scroll-trigger" href="<?php echo URL ?>videos/">Cenas</a>
				</li>
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link js-scroll-trigger" href="<?php echo URL ?>atores/">Atores</a>
				</li>
				<li class="nav-item mx-0 mx-lg-1">
					<a class="nav-link js-scroll-trigger" href="javascript:void();" data-toggle="modal" data-target="#contato">Contato</a>
				</li>
			</ul>
			
			<div class="botoes">
				<a href="https://www.hotboys.com.br/vip/" class="assinantes"><i class="fas fa-user"></i> Login</a>
				<a href="<?php echo URL ?>assine/" class="assine btn-success"><i class="fas fa-lock"></i> Assine</a>
			</div>
		</div>
		
	</div>
</nav>		
					<?php if ($detect->isMobile()) { ?>
		<?php }else{ ?>
		<div class="botao-whatsapp">
			<a href="https://wa.me/5521965133700" target="_blank">
				<span>
					<i class="fab fa-whatsapp" style="font-size: 23px;margin-top: 0px;float: left;margin-right: 5px;">
					</i>
				</span> 
				
				<span style="font-size: 12px;font-family: &quot;Open Sans&quot;;float: none;line-height: 2em;">Atendimento</span>
			</a>
			
		</div>	
	<?php } ?>																																																																																		