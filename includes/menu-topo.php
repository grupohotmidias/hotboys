<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
	
	<!-- Logo do topo --> 
	
	<a href="<?php if($vip == true) { ?><?php echo URL_VIP ?><?php }else{ ?><?php echo URL ?><?php } ?>" class="logo-topo">
		<img src="<?php echo URL ?>assets/img/logos/logo_topo_0.png"/>
	</a>
	
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarCollapse">
		
		<!-- Menu -->
		<ul class="navbar-nav mr-auto">
			<li class="nav-item">
				
				<!-- Home -->
				<a class="nav-link" href="<?php if($vip == true) { ?><?php echo URL_VIP ?><?php }else{ ?><?php echo URL ?><?php } ?>index.php">HOME<span class="sr-only">(current)</span></a>
				
				
			</li>
			
			<!-- Videos -->
			<li class="nav-item">
				<a class="nav-link" href="<?php if($vip == true) { ?><?php echo URL_VIP ?><?php }else{ ?><?php echo URL ?><?php } ?>videos">CENAS</a>
			</li>
			
			
			<!-- Modelos -->
			<li class="nav-item">
				<a class="nav-link" href="<?php if($vip == true) { ?><?php echo URL_VIP ?><?php }else{ ?><?php echo URL ?><?php } ?>atores">ATORES</a>
			</li>
			
			
			<!-- Contato -->
			<li class="nav-item">
				<a class="nav-link" href="!#" data-toggle="modal" data-target="#contato">CONTATO</a>
			</li>
			
			
			<!-- Busca do topo --> 
			<div class="wrapper busca">
				<div class="btn">
					<i class="fa fa-search" aria-hidden="true"></i>
				</div>
				<div class="form">
					<label id="search">Digite a sua busca...</label><br>
					<?php if($vip == true) { ?>
						<form method="post" action="<?php echo URL_VIP ?>busca"> 
							<input type="search" id="search" name="search" class="input">
						</form>
						<?php   // senão, leva pro link fora da vip
						}else{ ?>
						<form method="post" action="<?php echo URL ?>busca">
							<input type="search" id="search" name="search" class="input">
						</form>
					<?php  	} ?>
				</div>
			</div>
		</ul>
		
		
		<!-- Busca Mobile -->
		<div class="busca-mobile">
			<?php if($vip == true) { ?>
				<form method="post" action="<?php echo URL_VIP ?>busca"> 
					<input class="search_input" type="search" id="search" name="search" placeholder="Busca...">
				</form>
				<?php   // senão, leva pro link fora da vip
				}else{ ?>
				<form method="post" action="<?php echo URL ?>busca"> 
					<input class="search_input"type="search" id="search" name="search" placeholder="Busca...">
				</form>
			<?php } ?>
		</div>
		
		
		<?php if($vip == true) { ?>
			<!-- Cliente topo  -->
			<li class="nav-item saudacao">
				<div class="cliente-topo">
					<i class="fas fa-user-circle fa-2x"></i>
					<p>
						<?php $hr = date(" H "); if($hr >= 12 && $hr<18) { $resp = "Boa tarde";} else if ($hr >= 0 && $hr <12 ){ $resp = "Bom dia";} else { $resp = "Boa noite";} echo "$resp"; ?>,<br> <span>Cliente VIP
					</p>

					</div>
				</li>
				<form action="<?php echo URL ?>vip/login/index.php" method="GET">
					<input type="hidden" name="acao" value="sair">
					<button type="submit" style="background-color: #fdcf00;border: 0px;border-radius: 5px;"><i class="fa fa-power-off"></i></button>
				</form>
				<?php }else{ ?>
				<!-- Botoes -->
				<a class="form-inline mt-2 mt-md-0" href="<?php echo URL ?>vip">
					<button class="btn btn-outline-success my-2 my-sm-0 entrar" type="submit">Entrar</button>
				</a>
				<a class="nav-link assine" href="<?php echo URL ?>assine"><i class="fas fa-user-plus"></i> Assinar</a>
			<?php } ?>
			
		</div>
		<div class="bordaRiscadaTopo"></div>
		
	</nav>							

					
				