<!-- Icone do whatsapp 
<a href="https://wa.me/5521965133700" class="whatsappFixo" Style="" target="_blank">	-->	
<!-- Icone do whatsapp
	<i style="margin-top:16px" class="fab fa-whatsapp"></i>
	<p>Atendimento</p>
	</a>
-->	

<?php if($vip != true){ ?>
	
	
	<!-- <div style="float:left"> -->
		<?php if ($detect->isMobile()){?>
		<style>.rodape-banner-fixo a.link-rodape-fixo, .rodape-banner-fixo a.footerv3 {top: 25%;}</style>
		<a href="<?php echo URL ?>assine">
		<div class="rodape-banner-fixo" data-promo="default">
		<img src="https://hotboys.com.br/imagens/rodape/rodape-fixo/rodape_assine-blackfriday_mobile.png?v=15" alt="rodape fixo Hotboys">
		</div>
		</a>
		<?php }else{ ?>
		<style>.rodape-banner-fixo a.link-rodape-fixo, .rodape-banner-fixo a.footerv3 {top: 33%;}</style>
		<a href="<?php echo URL ?>assine">
		<div class="rodape-banner-fixo" data-promo="default">
		<img src="https://hotboys.com.br/imagens/rodape/rodape-fixo/rodape_assine-blackfriday.png?v=15" alt="rodape fixo Hotboys">
		</div>
		</a>
		<?php } ?>
	</div> 
	
	
	<!-- contador black friday 
		<div class="contador-black-friday" style="float:left">
		<a href="<?php echo URL ?>assine">
		<div class="col-12 col-sm-7 rodape-banner-fixo p-0" data-promo="default" style="margin: 0 auto">
		<div class="rodape-fixo-black-friday">
		<div class="col-sm-4 col-xs-4 col-md-4 col-lg-4 logo-black-friday">
		<img src="<?php echo URL ?>imagens/black-friday/logo-pre-black-friday.png?v=6" style=""/>
		</div>
		<div class="col-sm-7 col-xs-7 col-md-7 col-lg-7 relogio-blackfriday">
		<div class="flipper" data-reverse="true" data-datetime="2019-11-22 00:00:00" data-template="dd|HH|ii|ss" data-labels="Dias|Hs|Min|Seg" id="myFlipper"></div>
		</div>
		</div>
		</div>
		</a>
		</div>
	-->
	
<?php } ?>
</div>

<!-- FIM - DIV Fixa no rodape -->

<!-- RODAPE -->
<footer>
	
	<!-- Rodape Principal -->
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
								$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Footer' AND exibicao='aberto' AND status='Ativo' ORDER BY ordem ASC "; 
								$consulta = mysql_query($query);
								$total = mysql_num_rows($consulta);
								
								//verifica se o cliente esta logado ou nao para montar menu
								if($vip) {
									$url = URL_VIP;
									}else{
									$url = URL;
								}	  
								while($dados_menu = mysql_fetch_array($consulta)){ ?>
								
								<li>
									<?php if($vip) {?>
										<a href="<?php echo URL_VIP.$dados_menu[link].'"';?>"><span><?php echo utf8_encode(ucfirst($dados_menu['nome_exibicao'])); ?></span></a>	
										<?php } else { ?>
										<a href="<?php echo URL.$dados_menu[link].'"';?>"><span><?php echo utf8_encode(ucfirst($dados_menu['nome_exibicao'])); ?></span></a>
									<?php } ?>
								</li>
								
							<?php } ?> 
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
						<?php if($vip != true) { ?>
							<a href="<?php echo URL ?>">
								<?php } else { ?>
								<a href="<?php echo URL_VIP ?>">
								<?php } ?>
								hotboys.com.br
							</a>
						</a>
						Todos os direitos reservados
					</h2>
				</small>
			</div>
			
			<!-- Menu Central do rodapé -->
			<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 rede-social" align="center">
				
				<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2">
					
					
					<!-- Newsletter -->
					<div class="newsletter">
						<section class="subscribe-now">
							<div class="well">
								<h2>Inscreva-se para receber novidades por e-mail:</h2>
								<form class="form-inline" action="" onsubmit="cadastrarNewsletter(); return false;">
									<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
										<div class="input-group form-group" id="newsletter-rodape">
											<input type="email" name="newsletter_rodape_email" id="newsletter_rodape_email" placeholder="Informe seu e-mail" required class="form-control" style="z-index:0!important" />
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
				
				<div class="col-lg-8 col-md-12 col-sm-12 col-xs-12 col-lg-offset-2 col-lg-offset-right-2" id="redes-sociais">
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
							<a class="fa" href="https://www.instagram.com/hotboys.insta/">
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
		<div class="row rodape_secundario" style=" float: left; width: 100%;">
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