		<div class="container-fluid menuAudicoes">
			<div class="row">
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark pd-0">
					<button class="navbar-toggler mx-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
						Menu Audições
					</button>
					
					<div class="collapse navbar-collapse bg-black-dark" id="navbarSupportedContent">
						<ul class="navbar-nav mx-auto">
							<li class="nav-item home-menu">
							
							<!-- menu home audicoes -->
							<?php if($vip) { ?>
								<a class="nav-link" href="<?php echo URL_VIP ?>audicoes/">Home </a>
							<?php }else{ ?>
							<a class="nav-link" href="<?php echo URL ?>audicoes/">Home </a>
							<?php } ?>
							</li>
							
							<!-- menu participantes audicoes -->
							<li class="nav-item participantes-menu">
							<?php if($vip) { ?>
								<a class="nav-link" href="<?php echo URL_VIP ?>audicoes/participantes/">Participantes</a>
							<?php }else{ ?>
							    <a class="nav-link" href="<?php echo URL ?>audicoes/participantes/">Participantes</a>
							<?php } ?>
							</li>
							
							<!-- menu cenas audicoes -->
							<li class="nav-item cenas-menu">
							<?php if($vip) { ?>
								<a class="nav-link" href="<?php echo URL_VIP ?>audicoes/videos/">Cenas</a>
								<?php }else{ ?>
								<a class="nav-link" href="<?php echo URL ?>audicoes/videos/">Cenas</a>
								<?php } ?>
							</li>
							
							<!-- menu noticias audicoes -->
							<li class="nav-item noticias-menu">
							<?php if($vip) { ?>
								<a class="nav-link" href="<?php echo URL_VIP ?>audicoes/noticias/">Notícias</a>
								<?php }else{ ?>
								<a class="nav-link" href="<?php echo URL ?>audicoes/noticias/">Notícias</a>
								<?php } ?>
							</li>
							
							<!-- menu enquete audicoes -->
							<li class="nav-item enquete-menu">
								<a class="nav-link disabled" href="#">Enquete</a>
							</li>
						</ul>
					</div>
				</nav>
			</div>
		</div>