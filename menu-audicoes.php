

<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe menu-audicoes">


						
						
	<nav class="navbar navbar-inverse" style="float:left;width:100%;">
		<div class="container-fluid">
			<div class="navbar-header" style="margin-left:0!important;margin-right:0!important">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span> 
				</button>
				<a class="navbar-brand" href="#">Menu Audições Hot 3</a>
			</div>
			<div class="collapse navbar-collapse" id="myNavbar">
				<ul class="nav navbar-nav menuAudicoes">
					
					<!-- Menu Audições -->
					<li class="audicoes">
						<?php if($vip != true){ ?>
							<a href="<?php echo URL ?>audicoes">Audições</a>
							<?php }else{ ?>
							<a href="<?php echo URL_VIP ?>audicoes">Audições</a>
						<?php } ?>
						
						
					</li>
					
					<!-- Menu Participantes -->
					<li class="participantes">
						<?php if($vip != true){ ?>
							<a href="<?php echo URL ?>audicoes/participantes">Participantes</a>
							<?php }else{ ?>
							<a href="<?php echo URL_VIP ?>audicoes/participantes">Participantes</a>
						<?php } ?>
					</li>
					
					
					<!-- Menu Cenas -->
					<li class="cenas">
						<?php if($vip != true){ ?>
						<a href="<?php echo URL ?>audicoes/cenas">Cenas</a></li> 
						<?php }else{ ?>
					<a href="<?php echo URL_VIP ?>audicoes/cenas">Cenas</a></li> 
				<?php } ?>
				
				<!-- Menu Noticias -->
				<li class="noticias">
					<?php if($vip != true){ ?>
						<a href="<?php echo URL ?>audicoes/noticias">Notícias</a>
						<?php }else{ ?>
						<a href="<?php echo URL_VIP ?>audicoes/noticias">Notícias</a>
					<?php } ?>
				</li> 
				
				
				<!-- Menu Enquetes -->
				<li class="enquetes">
					<a>Enquetes <i class="fas fa-lock fa-xs"></i></a>
				</li> 
			</ul>
		</div>
	</div>
</nav>
</div>