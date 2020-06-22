<div class="app-sidebar sidebar-shadow" style="">
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
				<li class="app-sidebar__heading">ÁREA VIP</li>
				
				<!-- Home -->
				<li class="home">
					<a class="nav-link" href="<?php echo URL_VIP ?>index.php">
						<i class="fa fa-home fa-1x"></i> 
						Home
					</a>
				</li>
				
				<!-- Atores -->
				<li class="cenas_hot">
					<a class="nav-link" href="<?php echo URL_VIP ?>videos/">
						<i class="fas fa-play-circle"></i>
						Cenas Hot
					</a>
				</li>

				<?php /*<!-- Amadores HoT -->
				<li class="amadores_hot">
					<a class="nav-link" href="<?php echo URL_VIP ?>amadores-hot/">
							<i class="fas fa-mobile-alt" style="color:gray;font-size: 25px;"><i class="fas fa-video" style="color:gray;font-size: 6px;position: relative;left: -11px;top: -9px;"></i></i>
						Amadores Hot
					</a>
				</li>*/
				?>

				<!-- Atores -->
				<li class="modelos">
					<a class="nav-link" href="<?php echo URL_VIP ?>atores/">
						<i class="fas fa-users"></i>
						Atores Hot
					</a>
				</li>	
				
				<!-- Séries -->
				<li class="series">
					<a class="nav-link" href="<?php echo URL_VIP ?>series/">
						<i class="fas fa-film"></i> 
						Séries Hot
					</a>
				</li>
				
				
				<!-- Contos Eroticos  -->
				<li class="contos">
					<a class="nav-link" href="<?php echo URL_VIP ?>contos/">
						<i class="fas fa-book"></i> 
						Contos Hot
					</a>
				</li>
				
				<!-- Audicoes Hot 3 -->
				<li class="audicoes">
					<a class="nav-link" href="<?php echo URL_VIP ?>audicoes/">
						<i class="fas fa-couch fa-1x"></i>
						Audições Hot 3
					</a>
				</li>

<?php 	
				$query_continuacao_categorias = "SELECT * FROM `categorias` ORDER BY categoria ASC";
				$consulta_continuacao_categorias = mysql_query($query_continuacao_categorias);
				$total_continuacao_categorias = mysql_num_rows($consulta_continuacao_categorias); 
?>
				<!-- Categorias -->
				<li class="nav-item has-treeview">
					<a class="nav-link" href="#">
						<i class="fas fa-object-group fa-1x"></i>
						Categorias
					</a>
					<ul class="nav nav-treeview" >
					<div style="overflow-y:scroll;height: 320px;">
<?php  while($dados_categoria = mysql_fetch_array($consulta_continuacao_categorias)){
		$associador_categorias = mysql_query("SELECT * FROM `cenas` WHERE `tag_principal`='$dados_categoria[categoria]'");
		$total_associador_categorias = mysql_num_rows($associador_categorias);
		if($total_associador_categorias > 0){
	?>
						<li class="nav-item">
							<a href="<?php echo URL_VIP.'busca.php?'.'search='.$dados_categoria['categoria'] ; ?>" class="nav-link">
							<i class="fas fa-object-group"></i>&nbsp;
							<p style="color:#fff;"><?php echo utf8_encode($dados_categoria['categoria']) ?></p>
							</a>
						</li>

<?php } }?>
					</div>
					</ul>
				</li>
				
				<li class="app-sidebar__heading mt-4">Meu Hot</li>
				
				<!-- Meus favoritos -->
				<li class="meusFavoritos">
					<a class="nav-link" href="<?php echo URL_VIP ?>meus-favoritos/">
						<i class="fa fa-star fa-1x"></i>
						Meus Favoritos
					</a>
				</li>
				
				<!-- Meus favoritos -->
				<li class="minhaConta">
					<a class="nav-link" href="<?php echo URL_VIP ?>minha-conta/">
						<i class="fas fa-address-book fa-1x"></i>
						Minha Conta
					</a>
				</li>


				<br>				
				<br>				
				<br>
				
				<li class="app-sidebar__heading mt-4"></li>
				
				<!-- Meus favoritos -->
				<li class="meusFavoritos">
					<a class="nav-link" href="#" data-toggle="modal" data-target="#enquetes">
						<i class="fas fa-chart-bar"></i>
						Enquete Hot
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

<?php
	$sql_votos = "SELECT * FROM `votos` WHERE `ip`='$_SERVER[REMOTE_ADDR]'";
	$consulta_votos = mysql_query($sql_votos);
	$dados_votos = mysql_fetch_array($consulta_votos);
?>

		<!-- Modal -->
<div class="modal fade" id="enquetes" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" style="width: 432px;<?php if($detect->isMobile()){echo '';}else{echo 'left:35%;';}?>">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalCentralizado">Enquete Hot</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <div class="modal-body" style="background-color: #3c3939;text-align:center;">
	 	 <div>
		<?php if(!$dados_votos['ip']){?>
			<small style="font-size:10px;">Clique na Foto para selecionar quem você deseja e depois clique em Votar</small>
			<iframe src="https://hotboys.com.br/enquete/index.html" width="400" height="350" scrolling="no" frameborder="0"></iframe>		
			<small style="font-size:10px;position:relative;">Se você já votou, clique em ver resultados para saber quem esta na frente</small>
		<?php }else{ ?>
			<h4 style="position:relative;top:100px;">Seu voto já foi computado.</h4>
		<?php } ?>
		</div>
      </div>
    </div>
  </div>
</div>
