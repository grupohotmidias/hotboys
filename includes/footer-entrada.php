<!-- RODAPE -->
<footer>
	
	<!-- Rodape Principal -->
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<!-- Logomarcas do rodapé -->
			<!-- Logo Branca p/ fundo escuro -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 logo-rodape" align="center">
				<a href="<?php echo URL ?>home/"><img src="<?php echo URL ?>imagens/logos/logo-rodape-escuro.png" align="center" alt="logo da Hotboys no rodapé"/></a>
			</div>
			
			
			
			<!-- Menu Central do rodapé -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 textos-rodape">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="footer_menu" style="margin-bottom:10px">
						<ul>
							
							<!-- Link rodape - Termos de uso e condicoes -->
							<li>
								<a href="/termos_de_uso_entrada" target="_blank">
									<span>Termos de uso e condições</span>
								</a>	
							</li>
							
							<!-- Link rodape - Politica de Privacidade -->
							<li>
								<a href="/politica_de_privacidade_entrada" target="_blank">
									<span>Política de Privacidade</span>
								</a>	
							</li>
							
							<!-- Link rodape - Contatos -->
							<li>
								<a href="/duvidas-frequentes-entrada" target="_blank">
									<span>Dúvidas Frequentes</span>
								</a>	
							</li>
							
							
						</ul>
					</div> 
					<div class="clear"></div>
				</div>
				
				<!-- Logo da Hotmidias no rodape -->
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-bottom:15px">
					<a class="logo-hotmiidas-rodape" href="https://hotmidias.com.br" target="_blank" 
					style="background-image: url(https://www.hotboys.com.br/imagens/assine/icones/sprites-01.png); width: 200px; height: 40px; background-position: 0 -122px; display: block; margin: 0 auto;">
					</a>
				</div>
				
				<small class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<h2>Todos os atores desse site são maiores de 18 anos</h2>
					<h2>Copyright &copy; 2006 - <?php echo date("Y") ?>  
					<a href="#">hotboys.com.br</a>
						</a>
						Todos os direitos reservados
					</h2>
				</small>
			</div>
			
			<!-- Menu Central do rodapé -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rede-social" align="center">
				
				<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2">
					
					
					
				</div>
				
				<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2" id="redes-sociais" style="margin-top: 30px!important;">
					<div class="footer-rede-social-tudo">
						<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " align="center">
							<a href="https://www.facebook.com/sitehotboys" target="_blank" class="fa">
								<i class="fab fa-facebook-f"></i>
							</a>
						</span>
						
						<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
							<a href="https://twitter.com/hotboys" target="_blank" class="fa">
								<i class="fab fa-twitter"></i>
							</a>
						</span>
						
						<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
							<a class="fa" href="https://www.instagram.com/hotboys.oficial/" target="_blank" class="fa">
								<i class="fab fa-instagram"></i>
							</a>
						</span>
						
						<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center">
							<a href="https://www.youtube.com/channel/UCnxEBOG6_ttrx7FH6luQqpw" target="_blank" class="fa">
								<i class="fab fa-youtube"></i>
							</a>
						</span>
						
					</div>
				</div>
			</div>
		</div>
	</div><!-- FIM Rodape Principal -->
	
	
	
	<?php if($vip != true) { ?>
		<div class="row rodape_secundario" style=" float: left; width: 100%; padding-bottom: 9px!important;">
			<?php }else{ ?>
			<div class="row rodape_secundario_vip" style=" float: left; width: 100%;">
			<?php } ?>
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- Logomarcas do rodapé -->
				<div class="col-lg-4 col-md-4 col-sm-3 col-xs-12 site-responsivo" align="center">
					<img src="<?php echo URL ?>imagens/rodape/site-responsivo.png">
				</div>
				
				
				
				<!-- Menu Central do rodapé -->
				<div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 formas-pagamento" align="center">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<img src="<?php echo URL ?>imagens/rodape/formas-pagamento.png">
					</div>
					
				</div>
				
				
				<!-- Menu Central do rodapé -->
				<div class="col-lg-4 col-md-4 col-sm-3 col-xs-4 site-seguro" align="center">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<img src="<?php echo URL ?>imagens/rodape/site-seguro.png">
					</div>
				</div>
				<!-- FIM Rodape secundario = Icones -->
			</div>
			
			
		</div>	
		<div class="fade_menu_mobile"></div>
		
	</footer>
	<!-- Rodape secundario = Icones -->