<div class="col-lg-12 col-md-12 col-xs-12" style="margin-top:10px;margin-bottom:10px;">
								<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe">
									<!-- Titulo das Ultimas Noticias -->
									<h1 style="margin-top:10px!important;color:white;">Últimas Notícias</h1>
								</div>	
							</div>	
							
							
							<div class="col-lg-12 col-md-12 col-xs-12 galerias">
								<div class="col-lg-9 col-md-11 col-sm-11 col-xs-11 noticia-slider-left texto-pagina-contato_trabalhe">
									
									<?php 
										//consulta no banco de dados
										$query_destaque = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 1";
										$consulta_destaque = mysql_query($query_destaque);
										$dados_destaque = mysql_fetch_array($consulta_destaque);
									?>
									
									<!-- Destaque -->
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									<?php if($vip != true){  ?>
										<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$dados_destaque[id].'/'.URL_amigavel($dados_destaque['titulo'])) ?>">
										<?php }else{ ?>
										<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$dados_destaque[id].'/'.URL_amigavel($dados_destaque['titulo'])) ?>">
										<?php } ?>
										
											<div style="position:relative;z-index:1">
												<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_destaque['imagem_destaque'] ?>" style="width:100%">
											</div>
											
											<!-- Tag destaque -->
											<div class="tags">DESTAQUE</div>
											
											<div class="titulo" style="position:absolute;bottom:0;z-index:50;background-image: linear-gradient(to bottom, rgba(113, 67, 67, 0), rgba(25, 23, 24, 0.75));padding-bottom:12px">
												
												
												<h1><?php  
													if($dados_destaque['titulo_curto'] != ''){
														echo utf8_encode($dados_destaque['titulo_curto']);
														} else {
														echo utf8_encode($dados_destaque['titulo']);
													}
													
												?></h1>
												
												<span style="float:left;padding-left:20px;width:95%;text-shadow: 0px 2px 3px rgba(0,0,0,.8);font-weight: bold;display:block!important">
													<?php echo utf8_encode($dados_destaque['subtitulo']) ?>
												</span>
												
											</div>
										</a>
									</div>
									
									<?php 
										$query_slider = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY `id` DESC LIMIT 1,2";
										$dados_slider = mysql_query($query_slider);
										while($exibe_slider = mysql_fetch_array($dados_slider)){ 
										?>
										
										<!-- Slider 2 e 3 -->
										<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 slider<?php echo $counter++; ?>">
											<?php if($vip != true){  ?>
											<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_slider[id].'/'.URL_amigavel($exibe_slider['titulo'])) ?>">
											
											<?php }else{ ?>
											<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_slider[id].'/'.URL_amigavel($exibe_slider['titulo'])) ?>">
											<?php } ?>
											
												
												<div style="position:relative;z-index:1;">
													
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_slider['imagem_slider'] ?>" style="width:100%">
													
													
													<div class="titulo" style="position:absolute;bottom: 0;z-index:50;background-image: linear-gradient(to bottom, rgba(109, 97, 97, 0.12), rgba(25, 23, 24, 0.86));padding-bottom:12px">
														<h1>
															<?php  
																if($exibe_slider['titulo_curto'] != ''){
																	echo utf8_encode($exibe_slider['titulo_curto']);
																	} else {
																	echo utf8_encode($exibe_slider['titulo']);
																}
																
															?>
														</h1>
														<span style="float:left;padding-left:20px;width:100%;text-shadow: 0px 2px 3px rgba(0,0,0,.8);font-weight: bold;"><?php echo utf8_encode($exibe_slider['subtitulo']) ?></span>
													</div>
												</div>
											</a>
										</div>
									<?php } ?>
									
									
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top:5px">
										
										<?php 
											$counter = 1;
											
											$query_lista = "SELECT * FROM `audicoes_noticias` WHERE status='Ativo' ORDER BY id DESC LIMIT 3";
											$dados_lista = mysql_query($query_lista);
											while($exibe_lista = mysql_fetch_array($dados_lista)){ 
											?>
											<!-- conteudo das noticias -->
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 desktop">
												<div class="noticia-slider-lista texto-pagina-contato_trabalhe">
													
													
													<!-- Noticia 1 -->
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-top: 5px;margin-bottom:15px;">
														<!-- imagem -->
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
															
															<!-- link da imagem -->
															<?php if($vip != true){  ?>
															<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
															<?php }else{  ?>
															<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
																<?php }  ?>
																<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista[imagem_lista] ?>" style="width:100%">
															</a>
														</div>
														
														<!-- conteudo -->
														<div class="col-lg-8 col-md-8 col-sm-8 col-xs-8 noticia-conteudo">
															<p style="float:left;width:100%;margin-top:-2px;"><?php echo utf8_encode($exibe_lista[categoria_noticia]) ?></p>
															
															
															
															<!-- Link do titulo -->
															<?php if($vip != true){  ?>
															<a href="<?php echo utf8_encode(URL.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
															<?php }else{ ?>
															<a href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">
																<?php } ?>
															<h1><?php echo utf8_encode($exibe_lista[titulo]) ?></h1></a>
															<p><?php echo utf8_encode($exibe_lista[subtitulo]) ?> - <?php echo strip_tags(utf8_encode(substr($exibe_lista[texto], 0, 200))); ?>... 
																
																<!-- Link do botão leia mais -->
															<a class="leia-mais" href="<?php echo utf8_encode(URL_VIP.'audicoes/noticia/'.$exibe_lista[id].'/'.URL_amigavel($exibe_lista[titulo])) ?>">leia Mais</a> </p>
															
															<!--<span>Postado em: <?php echo $dados_data[data] ?></span>-->
														</div>
													</div>
												</div>
											</div>
											
											
											<div class="col-sm-12 col-xs-12 mobile">
												<div class="noticia-slider-lista texto-pagina-contato_trabalhe">
													
													<p style="float:left;width:100%;margin-top:-2px;">Audições Hot 3</p>
													<?php if($vip != true){  ?>
													<a href="<?php echo URL.'audicoes/'.$exibe_lista[titulo] ?>">
													<?php }else{ ?>
													<a href="<?php echo URL_VIP.'audicoes/'.$exibe_lista[titulo] ?>">
													<?php } ?>
													
													
													<h1><?php echo utf8_encode($exibe_lista[titulo]) ?></h1></a>
													
													<!-- Noticia 1 -->
													<div class="col-sm-12 col-xs-12">
														<!-- imagem -->
														<div class="col-sm-12 col-xs-12">
														<?php if($vip != true){  ?>
															<a href="<?php echo URL.'audicoes/'.$exibe_lista[titulo] ?>">
																	<?php }else{ ?>
																<a href="<?php echo URL_VIP.'audicoes/'.$exibe_lista[titulo] ?>">
																<?php } ?>
																<img src="https://server2.hotboys.com.br/arquivos/<?php echo $exibe_lista[imagem_lista] ?>" style="width:100%">
															</a>
														</div>
														
														<!-- conteudo -->
														<div class="col-sm-12 col-xs-12 noticias-conteudos">
															
															<p><?php echo utf8_encode(substr($exibe_lista[subtitulo],0,12)) ?>  - <?php echo strip_tags(utf8_encode(substr($exibe_lista[texto], 0, 250))); ?>... <a class="leia-mais" href="#">leia Mais</a> </p>
															
															<span>Postado em: <?php echo $dados_data[data] ?></span>
														</div>
													</div>
													
													
												</div>
											</div>
										<?php } ?>
									</div>
									
									<!-- Botão Veja Mais - Ultimas Cenas -->
									<div class="row" style="float:left;width:100%;margin-bottom:50px">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 bt-vejamais-desktop">
											<h1 class="bt-vejamais">
											<?php if($vip == true){ ?>
												<a href="<?php echo URL_VIP ?>audicoes/noticias"><?php echo V_MAIS ?> 
											<?php }else{ ?>
											<a href="<?php echo URL ?>audicoes/noticias"><?php echo V_MAIS ?> 
											<?php } ?>
												<i class="fas fa-caret-right fa-1x" aria-hidden="true"></i>
													</a>
												</h1>
										</div>
									</div>
								</div>
								
								
								
							</div>
							