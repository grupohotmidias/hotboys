<footer>
	
	
	<!-- Rodape Principal -->
	<div class="container">
		
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<!-- Logomarcas do rodapé -->
				<!-- Logo Branca p/ fundo escuro -->
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 logo-rodape" align="center">
					<a href="<?php echo URL ?>"><img src="<?php echo URL ?>imagens/logos/logo-rodape-escuro.png" align="center" alt="logo da HotBoys no rodapé"/></a>
				</div>
				
				
				
				<!-- Menu Central do rodapé -->
				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 textos-rodape">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<div class="footer_menu">
							<ul>

								
								<?php // busca menu footer
								if($vip) {
									$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Footer' AND exibicao='vip' AND status='Ativo' ORDER BY ordem ASC "; 
								}else{
									$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Footer' AND exibicao='aberto' AND status='Ativo' ORDER BY ordem ASC "; 
								}

									$consulta = mysql_query($query);
									$total = mysql_num_rows($consulta);

									while($dados_menu = mysql_fetch_array($consulta)){ ?>
									
									
									
									<li>
										<a href="<?php echo URL.$dados_menu[link].'"';
											if ($vip == true and $dados_menu[janela] == _blank){
												echo 'target="'.$dados_menu[janela].'"';
												
											}?>
											<span><?php echo utf8_encode(ucfirst($dados_menu['nome_exibicao'])); ?></span>
											</a>
											</li>
											
									<?php } ?> 
									</ul>
									</div> 
									<div class="clear"></div>
								</div>
								
								
								
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<h2>Todos os atores desse site são maiores de 18 anos</h2>
									<h2>Copyright &copy; 2006 - <?php echo date("Y") ?>  <b><a href="<?php echo URL ?>">hotboys.com.br</a></b> Todos os direitos reservados</h2>
								</div>
							</div>
							
							
							
							<!-- Menu Central do rodapé -->
							<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rede-social" align="center">
								
								<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2">
									
									<div class="newsletter">
										
										<section class="subscribe-now">
											
											<div class="well">
												
												<h2>Inscreva-se para receber novidades por e-mail:</h2>
												
												
												
												<form class="form-inline" action="" onsubmit="cadastrarNewsletter(); return false;">
													
													<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
														
														<div class="input-group form-group" id="newsletter-rodape">
															
															
															
															<input type="email" name="newsletter_rodape_email" id="newsletter_rodape_email" placeholder="Informe seu e-mail" required class="form-control" />
															
															
															
														</div>
														
													</div>
													
													
													
													<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 btn-warning"  id="btn-rodape-newsletter">
														<input type="submit" value="Assinar" class="btn btn-warning" style="width:100%;" />
													</div>
													
												</form>
												
											</div>
											
										</section>
										
									</div>
									
								</div>
								
								
								
								
								<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2">
									
									
									
									<div class="footer-rede-social-tudo">
										
										
										
										<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3 " align="center"><a href="https://www.facebook.com/sitehotboys" target="_blank" class="fa fa-facebook"></a></span>
										
										
										
										<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center"><a href="https://twitter.com/hotboys" target="_blank" class="fa fa-twitter"></a></span>
										
										
										
										<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center"><a href="https://www.instagram.com/site.hotboys" target="_blank" class="fa fa-instagram"></a></span>
										
										
										
										<span class="col-lg-3 col-md-3 col-sm-3 col-xs-3" align="center"><a href="https://www.youtube.com/channel/UCmVPoMWgRj0cVa0oYRem-tw/videos" target="_blank" class="fa fa-youtube"></a></span>
										
										
										
									</div>
									
									
									
								</div>
								
								
								

								
							</div>
						</div>
					</div>
				</div><!-- FIM Rodape Principal -->
				
				
				
			</footer>
			<!-- Rodape secundario = Icones -->
				<div class="container rodape_secundario">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<!-- Logomarcas do rodapé -->
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 site-responsivo" align="center">
								<img src="https://www.hotboys.com.br/imagens/rodape/site-responsivo.png">
							</div>
							
							
							
							<!-- Menu Central do rodapé -->
							<div class="col-lg-4 col-md-4 col-sm-8 col-xs-12 formas-pagamento" align="center">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img src="https://www.hotboys.com.br/imagens/rodape/formas-pagamento.png">
								</div>
								
							</div>
							
							
							<!-- Menu Central do rodapé -->
							<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 site-seguro" align="center">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<img src="https://www.hotboys.com.br/imagens/rodape/site-seguro.png">
								</div>
							</div>
							<!-- FIM Rodape secundario = Icones -->
						</div>
						
						
					</div>	
				</div>
		<div class="fade"></div>																