<?php 
	$counter_vitrine = 1;
	$query_vitrine_audicoes = "SELECT * FROM `audicoes_vitrine` WHERE status='ativo' ORDER BY `id` DESC LIMIT 5";
	$consulta_vitrine_audicoes = mysql_query($query_vitrine_audicoes);
?>
<div class="col-lg-12 col-md-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;">
	<div class="col-lg-9 col-md-11 texto-pagina-contato_trabalhe">
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
			
			
			
			<!-- Indicadores -->
			<ol class="carousel-indicators">
				
				<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
				<li data-target="#myCarousel" data-slide-to="1"></li>
				<li data-target="#myCarousel" data-slide-to="2"></li>
				<li data-target="#myCarousel" data-slide-to="3"></li>
				<li data-target="#myCarousel" data-slide-to="4"></li>
			</ol>
			
			<!-- Wrapper for slides -->
			<div class="carousel-inner">
				<?php 
					while($vitrine_audicoes = mysql_fetch_array($consulta_vitrine_audicoes)){ 
					?>
					
					<?php if($detect->isMobile()){ ?>
						
						
						<!-- Vitrine - Mobile -->
						<div class="item <?= ($counter_vitrine <= 1) ? 'active' : '' ?>" style="float:left;width:100%">
							
							<!-- Titulo da vitrine -->
							<h1 class="vitrine-audicoes">
								<?php echo utf8_encode($vitrine_audicoes['titulo']) ?>
							</h1>
							
							<!-- Link  da vitrine - Mobile -->
							<a href="<?php echo $vitrine_audicoes['link'] ?>">
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $vitrine_audicoes['imagem_mobile'] ?>" style="width:100%" />
							</a>
						</div>
						
						
						
						<?php $counter_vitrine++; }else{ ?>
						
						
						<!-- vitrine -->
						<div class="item <?php if($counter_vitrine <= 1){echo " active"; } ?>" style="float:left;width:100%">
							
							<!-- Titulo da vitrine -->
							<h1 class="vitrine-audicoes">
								<?php echo utf8_encode($vitrine_audicoes['titulo']) ?>
							</h1>
							
							<!-- Link  da vitrine -->
							<?php if($vip == true){ ?>
							<a href="<?php echo utf8_encode($vitrine_audicoes['link_vip']) ?>">
							<?php }else { ?>
							<a href="<?php echo $vitrine_audicoes['link'] ?>">
							<?php } ?>
								<img src="https://server2.hotboys.com.br/arquivos/<?php echo $vitrine_audicoes['imagem'] ?>" style="width:100%" />
							</a>
							
						</div>
					<?php $counter_vitrine++; } ?>
					
				<?php } ?>
			</div>
			
			
			<!-- Left and right controls -->
			<a class="left carousel-control" href="#myCarousel" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left"></span>
				<span class="sr-only">Anterior</span>
			</a>
			<a class="right carousel-control" href="#myCarousel" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right"></span>
				<span class="sr-only">Próximo</span>
			</a>
		</div>
		
		
	</div>
</div>