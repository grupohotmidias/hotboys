<?php
	
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once ('../mobili/Mobile_Detect.php');
	$detect = new Mobile_Detect;
	$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
	$scriptVersion = $detect->getScriptVersion();
	
	
	$primeiro_nome = addslashes($_POST['primeiro_nome']);
	$sobrenome = addslashes($_POST['sobrenome']);
	$email = addslashes($_POST['email']);
	$nome_exibicao = addslashes($_POST['nome_exibicao']);
	$cidade = addslashes($_POST['cidade']);
	$estado = addslashes($_POST['estado']);
	$foto_perfil = addslashes($_FILES['foto_perfil']);
	
	// busca o id do usuarios logado
    $query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
    $consulta_user = mysql_query($query_user);
    $total_user = mysql_num_rows($consulta_user);
    $dados_user = mysql_fetch_array($consulta_user);
    
    $id_usuario = $dados_user[id];
	if(@$_COOKIE[verificacao_idade] != 'sim'){
		
	?>
	
	<!-- Popup - Aviso ao Entrar no Site -->
	<?php if ($detect->isMobile()) { ?>
		
		<div id="agreementPopupContainer" class="modal" data-backdrop="static">
			<div class="welcomePopupContainer clear">
				<div class="welcomeLogo"> </div>
				<div class="welcomeLogo-mobile"> 
					<img class="width-100" src="<?php echo URL ?>imagens/modal-aviso-entrar/logo/logo-popup.png" alt="logo popup"/> 
				</div>
				<div class="relative zindex1">
					<div class="welcomePopupModelContainer"> 
						<!-- Popup - Imagens dos modelos DESKTOP que troca aleatoriamente  -->
						<img class="welcomePopupModel" alt="" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_pop_up['imagem_pop_up']?>" alt="modelo popup"/> 
					</div>
					<div class="mrgRight5 termo-acordo-usuario">
						<div class="man-mobile-popup"> 
							<!-- Popup - Imagens dos modelos MOBILE que troca aleatoriamente  -->
							<img class="width-100" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_pop_up['imagem_pop_up']?>" style="margin-top:-49px" alt="modelo popup"/> 
						</div>
						<div class="welcomeUserAgreementContainer">
							<p class="txtBold txtWhite mrgTop">
								<?php echo LEIA_TERMOS ?>
							</p>
							
							
							<!-- Botao Eu Concordo -->
							<div class="clear">
								<div class="floatLeft split0">
									<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
									<a class="welcomeEnterButton txt16 mrgLeft block" href="#agreementPopupContainer" onclick="document.cookie='verificacao_idade=sim; expires=<?php echo $dataExpiracaoCookie ?>; path=/;'"  data-dismiss="modal">
										<?php echo EU_CONCORDO ?>
									</a>					
								</div>
							</div>	
							
							<!-- Botao Eu Nao Concordo -->
							
							
							<div class="clear">
								<div class="floatLeft split0" style="margin-top:10px;margin-bottom:10px">
									<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
									<a class="welcomeSairButton txt16 mrgLeft block" href="//google.com/" onclick="ga('send', 'event', 'agree', 'click', 'disagree');">
										<?php echo NCONCORDO ?>
									</a> 					
								</div>
							</div>	
							
							<!-- Termos de Uso -->
							<div class="welcomeUserAgreement txt14">
								<div class="txtCenter txtBold txtRed txt18"><?php echo TERMO_USOH ?></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_1 ?></a></p>
								<div class="txtGray invisibleFix">
									<p> <?php echo TERMO_TXT1 ?> </p>
									<p><?php echo TERMO_TXT2 ?></p>
								</div>
								<div class="separator"></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_2 ?></a></p>
								<div class="txtGray invisibleFix">
									<p><?php echo TERMO_TXT3 ?></p>
								</div>
								<div class="separator"></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_3 ?></a></p>
								<div class="txtGray invisibleFix">
									<p><?php echo TERMO_TXT4 ?></p>
									<p><?php echo TERMO_TXT5 ?></p>
								</div>
								<div class="separator"></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_4 ?></a></p>
								<div class="txtGray invisibleFix">
									<p><?php echo TERMO_TXT6 ?></p>
								</div>
								<div class="separator"></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_5 ?></a></p>
								<div class="txtGray invisibleFix">
									<p><?php echo TERMO_TXT7 ?></p>
								</div>
								<div class="separator"></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_6 ?></a></p>
								<div class="txtGray invisibleFix">
									<p><?php echo TERMO_TXT8 ?></p>
								</div>
								<div class="separator"></div>
								<p onclick="$(this).next().slideToggle();" class="txtBold">
								<a class="block"><?php echo TERMO_7 ?></a></p>
								<div class="txtGray invisibleFix">
									<p><?php echo TERMO_TXT9 ?></p>
								</div>
							</div>
							
							<?php }else{ ?>
							
							<div id="agreementPopupContainer" class="modal" data-backdrop="static">
								<div class="welcomePopupContainer clear">
									<div class="welcomeLogo"> </div>
									<div class="welcomeLogo-mobile"> 
										<img class="width-100" src="<?php echo URL ?>imagens/modal-aviso-entrar/logo/logo-popup.png" alt="logo popup"/> 
									</div>
									<div class="relative zindex1">
										<div class="welcomePopupModelContainer"> 
											<!-- Popup - Imagens dos modelos DESKTOP que troca aleatoriamente  -->
											<img class="welcomePopupModel" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_pop_up['imagem_pop_up']?>" alt="modelo popup"/> 
										</div>
										<div class="mrgRight5 termo-acordo-usuario">
											<div class="man-mobile-popup"> 
												<!-- Popup - Imagens dos modelos MOBILE que troca aleatoriamente  -->
												<img class="width-100" src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_modelo_pop_up['imagem_pop_up']?>" alt="modelo popup"/> 
											</div>
											<div class="welcomeUserAgreementContainer">
												<p class="txtBold txtWhite mrgTop"><?php echo LEIA_TERMOS ?></p>
												
												
												
												
												<!-- Termos de Uso -->
												<div class="welcomeUserAgreement txt14">
													<div class="txtCenter txtBold txtRed txt18"><?php echo TERMO_USOH ?></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_1 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT1 ?></p>
														<p><?php echo TERMO_TXT2 ?></p>
													</div>
													<div class="separator"></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_2 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT3 ?></p>
													</div>
													<div class="separator"></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_3 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT4 ?></p>
														<p><?php echo TERMO_TXT5 ?></p>
													</div>
													<div class="separator"></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_4 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT6 ?></p>
													</div>
													<div class="separator"></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_5 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT7 ?></p>
													</div>
													<div class="separator"></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_6 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT8 ?></p>
													</div>
													<div class="separator"></div>
													<p onclick="$(this).next().slideToggle();" class="txtBold">
													<a class="block"><?php echo TERMO_8 ?></a></p>
													<div class="txtGray invisibleFix">
														<p><?php echo TERMO_TXT9 ?></p>
													</div>
												</div>
												
												<!-- Botao Eu Concordo -->
												<div class="clear">
													<div class="floatLeft split0">
														<?php $dataExpiracaoCookie = date('Y-m-d', strtotime('+1 year')); ?>
														<a class="welcomeEnterButton txt16 mrgLeft block" href="#agreementPopupContainer" onclick="document.cookie='verificacao_idade=sim; expires=<?php echo $dataExpiracaoCookie ?>; path=/;'"  data-dismiss="modal"><?php echo EU_CONCORDO ?></a>					
													</div>
												</div>	
												
												<!-- Botao Eu Nao Concordo -->
												<div class="clear txtCenter mrgTop2 txtGray"> <a href="//google.com/" onclick="ga('send', 'event', 'agree', 'click', 'disagree');"><?php echo NCONCORDO ?></a> 
												</div>
												
											<?php } ?>
											
											
											
											
											
										</div>
									</div>
								</div>
								<div class="welcomeMask"></div>
							</div>
						</div> 
					<?php } ?>
					
					<?php 
						//Se Mobile, esconde o topo com botao de trocar cor
						if ($detect->isMobile()) { ?>
						<?php 
							//Caso nao seja mobile, carrega o topo
						} else { ?>
						
						<!-- Div Flutuante - AntiFlagra -->
						<div id="antiflagra2" class="antiflagra">
							<div class="fechar">
								<a href="#" onClick="mysticky2.showhidenote('hide');return false">
									<img src="<?php echo URL ?>imagens/antiflagra/fechar-antiflagra.png" alt="botao fechar site">
								</a>
							</div>
							<a href="https://www.globo.com/">
								<img class="imagem-antiflagra" src="<?php echo URL ?>imagens/antiflagra/antiflagra.png" alt="imagem fundo antiflagra">
							</a>
						</div>
					<?php } ?> 
					
					<?php 
						//Se Mobile, esconde o topo com botao de trocar cor
						if ($detect->isMobile()) { ?>
						<nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
							<div class="container">
								
								<!-- SLOGAN e os 4 outros sites do grupo -->
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
									<div class="navtopo-collapse">
										<ul class="navtopo-nav mr-auto sites-topo">
											
											<li class="nav-item slogan">
												<?php if($vip != true){ ?>
													<a href="<?php echo URL ?>" target="_blank">
														<?php }else{ ?>
														<a href="<?php echo URL_VIP ?>" target="_blank">
														<?php } ?>
														
														<!-- Icone hotboys do topo -->
														<img src="<?php echo URL ?>imagens/icones/topo/icone-solo-topo.jpg" alt="icone solohot"/> 
														<?php echo S_HOT ?>
													</a>
												</li> 
												
												<li class="nav-item slogan solo">
													<a href="<?php echo URL_SOLO ?>" target="_blank">
														
														<!-- Icone solohot do topo -->
														<img src="<?php echo URL ?>imagens/icones/topo/icone-hot-topo.jpg" alt="icone solohot"/> 
														<?php echo HOT_B ?>
													</a>
												</li> 
												
											</ul>
										</div>
									</div>
									
								</div>
							</nav>
							
							
							<?php 
								//Caso nao seja mobile, carrega o topo
							} else { ?> 
							
							<!-- Topo com links e Idiomas (Fundo Preto) -->
							<nav class="navtopo navtopo-expand-lg navtopo-dark bg-dark-topo">
								<div class="container">
									<!-- SLOGAN e os 4 outros sites do grupo -->
									<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12" >
										<div class="navtopo-collapse">
											<ul class="navtopo-nav mr-auto sites-topo">
												
												<li class="nav-item slogan solo">
													<a href="<?php echo URL_SOLO ?>" target="_blank">
														
														<!-- Icone solohot do topo -->
														<img src="<?php echo URL ?>imagens/icones/topo/icone-solo-topo.jpg" alt="icone solohot"/> 
														<?php echo S_HOT ?>
													</a>
												</li> 
												<li class="nav-item slogan topo">
													
													<?php if($vip != true){ ?>
														<a href="<?php echo URL ?>" target="_blank">
															<?php }else{ ?>
															<a href="<?php echo URL_VIP ?>" target="_blank">
															<?php } ?>
															
															<!-- Icone hotboys do topo -->
															<img src="<?php echo URL ?>imagens/icones/topo/icone-hot-topo.jpg" alt="icone solohot"/> 
															<?php echo HOT_B ?>
															
														</a>
													</li> 
													
													
													
												</ul>
											</div>
										</div>
										
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 topo-slogan" >
											<div class="navtopo-collapse">
												<ul class="navtopo-nav mr-auto" style="margin: 0 auto; float: none;">
													<li class="nav-item slogan topo" ><?php echo SLOGAN ?></li> 
												</ul>
											</div>
										</div>
										
										
										<!-- Botão troca a cor do site - Sol e Lua -->
										<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4" id="mudarcor-sol-lua">
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9 float-right">
												<div class="container">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
															
															<!-- Botão Sol - Site Claro -->
															<div class="botao-sol">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																	<div class="float-right">
																		<button type="button" class="bt-sol-lua float-right" name="sol_lua" onclick="togglePageContentLightDark()" title="Clique para trocar a cor do site">
																			<div class="col-img-sol-lua">
																			<img src='<?php echo URL ?>imagens/icones/muda-cor-icone-sol.png'  onclick='changeImage("<?php echo URL ?>imagens/icones/muda-cor-icone-sol.png");' alt="icone sol troca cor"></div>
																			<div class="mudarcor-texto-sol">
																			<span class="cor-site-claro"><?php echo S_CLARO ?></span> / <?php echo CLIQUE_MUDAR ?></div>
																			
																		</button>
																	</div>
																</div>
															</div>
															
															<!-- Botão Lua - Site Escuro -->
															<div class="botao-lua">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																	<div class="float-right">
																		<button type="button" class="bt-sol-lua float-right" name="sol_lua" onclick="togglePageContentLightDark()" title="Clique para trocar a cor do site">
																			<div class="col-img-sol-lua"><img src='<?php echo URL ?>imagens/icones/muda-cor-icone-lua.png'  onclick='changeImage("<?php echo URL ?>imagens/icones/muda-cor-icone-sol.png");' alt="icone lua troca cor"></div>
																			<div class="mudarcor-texto-sol">
																			<span class="cor-site-escuro"><?php echo S_ESCURO ?></span> / <?php echo CLIQUE_MUDAR ?></div>
																		</button>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</nav>
							<?php } ?> 
							
							
							
							<!-- Div da logo, botoes e busca (Fundo Branco) -->
							<?php 
								//Se Mobile, carrega o perfil administrativo do cliente
								if ($detect->isMobile()) { ?>
								
								<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
									<div class="container">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<!-- LOOGOMARCAS DO TOPO -->
											<!-- Logo Preta p/ fundo claro -->
											<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 logo-fundo-branco"> 
												<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?>"><img src="<?php echo URL ?>imagens/logos/logo-topo.png" alt="Logo da HotBoysno topo"/></a> 
											</div>
											
											<!-- Logo Branca p/ fundo escuro -->
											<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 logo-fundo-preto"> 
												<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?> "><img src="<?php echo URL ?>imagens/logos/logo-topo-escuro.png" alt="Logo da HotBoysno topo"/></a> 
											</div>
											
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 topo-menu-principal-mobile">
												<header class="cf"> 
													<a href="#" id="navicon" class="closed">&#9776;
														<span><?php echo MENU ?></span>
													</a>
												</header>
											</div>
											
										</div>
									</div>
								</nav>
								
								<?php
									if($vip != true) { ?>
									<header class="assineja-entrar">
										<ul>
											<div class="col-sm-6 col-xs-6">
												<li class="nav-item assineja">
													<a class="nav-link" href="<?php echo URL ?>assine">Assine Já</a> 
												</li>
											</div>
											<div class="col-sm-6 col-xs-6">
												<li class="nav-item entrar"> 
													<a class="nav-link" href="<?php echo URL ?>vip/login">Entrar</a>
												</li> 
											</div>
										</ul>
									</header>
									
								<?php } ?>
								<?php 
									//Caso contrario, carrega o menu principal
								} else{ ?>
								
								<!-- Div da logo, botoes e busca (Fundo Branco) -->
								<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
									<div class="container">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											
											<!-- LOOGOMARCAS DO TOPO -->
											<!-- Logo Preta p/ fundo claro -->
											<?php 
												if($vip != true) { ?>
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-branco" style="margin-top: 20px;">
													<?php }else { ?>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-branco"> 
													<?php } ?>
													<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?>"><img src="<?php echo URL ?>imagens/logos/logo-topo.png" alt="Logo topo"/></a> 
												</div>
												
												<!-- Logo Branca p/ fundo escuro -->
												<?php 
													if($vip != true) { ?>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top: 20px;"> 
														<?php }else { ?>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto"> 
														<?php } ?>
														<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?> "><img src="<?php echo URL ?>imagens/logos/logo-topo-escuro.png" alt="Logo topo"/></a> 
													</div>
													
													
													<!-- botoes ASSINE e ENTRAR -->
													<?php //Se logado botoes somem
														if($vip != true) { ?>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center" style="margin-top: 20px;">
															<?php } else { ?> 
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center">
															<?php }?>
															<?php //Se logado botoes somem
																if($vip != true) { ?>
																<a href="<?php echo URL ?>assine"><img src="<?php echo URL ?>imagens/botoes/botao-assinar-topo.png" style="margin-top: 8px; margin-right:10px;" alt="botao assinar"/></a>
																<a href="<?php echo URL ?>vip/login"><button type="button" class="btn btn-login">Entrar</button></a>
																<?php } else { ?> 
																<span class="minha-conta"><a href="<?php echo URL_VIP ?>minha-conta"><button type="button" class="btn btn-assinar" style="margin-right:10px"><?php echo M_CONTA ?></button></a></span>
																<span class="minha-conta-sair"><a href="<?php echo URL_VIP ?>login/index.php?acao=sair"><button type="button" class="btn btn-assinar">Sair</button></a></span>
															<?php } ?> 
														</div>
														
														
														<?php //Se logado botoes somem
															if($vip != true) { ?>
															<!-- Formulario NÃO VIP - Botão Busca -->
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 busca-topo" style="margin-top:10px;margin-bottom:10px">
																<a href="<?php echo URL_SOLO ?> " target="_blank">
																	<img src="<?php echo URL ?>imagens/banners/Banner-SoloHot(2).jpg"/>
																</a>
															</div><!-- FIM Formulario NÃO VIP - Botão Busca -->
															
															<?php } else { ?> 
															<!-- Formulario VIP - Botão Busca -->
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 busca-topo">
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																	<form method="post" action="<?php echo URL_VIP ?>busca" class="busca-topo-vip" style="float:left!important" > 
																		<input type="search" id="search" name="search" placeholder="Busca...">
																		
																	</form>
																</div>
																
																
																
																<!--##	INICIO Area do Cliente VIP no TOPO  ##-->
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																	<div class="usuario-topo">
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" class="area-cliente-topo" style="background: #e2dcde;height: 64px">
																			
																			<!--## INICIO Link - Area do Cliente VIP no TOPO  ##-->
																			<a href="<?php echo URL_VIP ?>minha-conta" style="color: #0d0d0d;">
																				
																				<div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12 info-cliente-topo-desktop" style="margin:0 auto;float:none!important;padding-left: 5px!important;padding-right: 5px!important;margin-top: 5px;height: 42px;">
																					
																					<!-- Imagem - Area do Cliente VIP no TOPO -->
																					<div class="espaco-imagem-topo-desktop" style="float: left; width: 40%;">
																						<img src="<?php echo $fotoPerfil ?>" alt="imagem cliente" style="width: 39px; border-radius:50%;margin-top: 4px; margin-right: 16px">
																					</div>
																					
																					
																					<!--## INICIO Saudacao - Area do Cliente VIP no TOPO  ##-->
																					<div class="espaco-perfil-topo-desktop" style=" float: left; width: 60%; text-align: left">
																						<div class="perfil-info espaco-saudacao" style="float: left; margin-top: 9px;text-align:left">
																							
																							
																							<!-- Saudacao - Area do Cliente VIP no TOPO  -->
																							<span class="saudacao" style="width: 100%; float: left">
																								<?php 
																									$hr = date(" H ");
																									if($hr >= 12 && $hr<18) {
																									$resp = "Boa tarde";}
																									else if ($hr >= 0 && $hr <12 ){
																									$resp = "Bom dia";}
																									else {
																									$resp = "Boa noite";}
																									echo "$resp";
																								?>
																							</span>
																							
																							<!-- Nome Exibicao - Area do Cliente VIP no TOPO -->
																							<span class="nome" style="width: 100%; float: left">
																								<?php if($dados_user[nome_exibicao]){
																									echo($dados_user[nome_exibicao]);
																									}else{ 
																									echo 'Usuario';
																								}?>       											
																							</span>
																							
																						</div>
																					</div>
																					<!--## FIM Saudacao - Area do Cliente VIP no TOPO  ##-->
																					
																					
																				</div>
																				<i class="fa fa-caret-up fa-2x seta-cliente-topo-desktop" style="font-size: 2em; color: #e31330; width: 100%"></i>
																			</a>
																			<!--## FIM Link - Area do Cliente VIP no TOPO  ##-->
																			
																		</div>
																	</div>
																</div>
																<!--##	FIM Area do Cliente VIP no TOPO  ##-->
																
																
																
																
															</div>
															<!-- FIM Formulario VIP - Botão Busca -->
														<?php } ?> 
													</div>
												</div>
											</nav>
											
											
										<?php } ?>
										
										
										<?php 
											//Se Mobile, carrega o perfil administrativo do cliente
											if ($detect->isMobile()) { ?>
											<?php if($vip == true) { ?>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 perfil-mobile">
													<div class="container">
														<div class="row centralizada">
															
															<!-- Menu do Cliente -->
															<div class="menu-area-cliente">
																<nav class="navbar navbar-default sidebar" role="navigation">
																	<div class="navbar-header">
																		
																		
																		<!-- Informacoes do  cliente -->
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																			<div class="col-lg-9 col-md-9 col-sm-9 col-xs-9">
																				
																				
																				<!-- Imagem do Cliente -->
																				<div class="perfil-mobile-foto">
																					<img src="<?php echo URL ?>imagens/icones/perfil/avatar_sfoto_mobile.jpg" alt="imagem cliente" class="img-circle profile_img">
																				</div>
																				
																				
																				<div class="perfil-mobile-info">
																					
																					
																					<!-- Saudacao ao cliente -->
																					<span class="saudacao">
																						<?php 
																							$hr = date(" H ");
																							if($hr >= 12 && $hr<18) {
																							$resp = "Boa tarde";}
																							else if ($hr >= 0 && $hr <12 ){
																							$resp = "Bom dia";}
																							else {
																							$resp = "Boa noite";}
																							echo "$resp";
																						?>, 
																					</span>
																					<span class="nome-area-cliente">
																						<?php if($dados_user[nome_exibicao]){
																							echo($dados_user[nome_exibicao]);
																							}else{ 
																							echo 'Usuario';
																						}?>
																					</span>
																				</div>
																			</div>
																			
																			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
																				<!-- Botao de engrenagem que carrega o menu vertical -->
																				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
																					<span class="sr-only">Toggle navigation</span>
																					<span class="glyphicon glyphicon-cog"></span>
																				</button>   <!-- FIM Botao de engrenagem que carrega o menu vertical --> 
																			</div><!-- Informacoes do  cliente -->
																		</div>
																		
																		
																	</div>
																	
																	<!-- Menu vertical do cliente -->
																	<div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
																		<ul class="nav navbar-nav">
																			<li class="#"><a href="<?php echo URL_VIP ?>minha-conta"> <?php echo M_CONTA ?><span style="font-size:16px;" class="pull-left showopacity glyphicon glyphicon-home"></span></a></li>
																			<li ><a href="<?php echo URL_VIP ?>cenas-favoritas">Cenas Favoritas<span style="font-size:16px;" class="pull-left showopacity glyphicon glyphicon-heart"></span></a></li>        
																			<li ><a href="https://www.hotboys.com.br/vip/login/index.php?acao=sair">Sair<span style="font-size:16px;" class="pull-left showopacity glyphicon glyphicon-log-out"></span></a></li>
																		</ul>
																	</div><!-- FIM Menu vertical do cliente -->
																	
																	
																</nav>
															</div><!-- FIM Menu do Cliente -->
															
															
														</div>
													</div>
												</div>
											<?php }  ?>
											
											<?php 
												//Caso contrario, carrega o menu principal
											} else{ ?>
											
											
											<!-- Menu principal DESKTOP(Fundo Vermelho) -->
											<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
												<div class="container">
													<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
													<div class="collapse navbar-collapse" id="navbarResponsive">
														<ul class="navbar-nav mx-auto">
															
															<?php 
																//tras o banco mediante a localização
																if($vip) {
																	$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Vip' AND status='Ativo' ORDER BY ordem ASC "; 
																	}else{
																	$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Aberto' AND status='Ativo' ORDER BY ordem ASC "; 
																}	
																//tras menu
																$consulta = mysql_query($query);
																$total = mysql_num_rows($consulta);
																
																//verifica se o cliente esta logado ou nao para montar menu
																if($vip) {
																	$url = URL_VIP;
																	}else{
																	$url = URL;
																}	  
																while($dados_menu = mysql_fetch_array($consulta)){ ?>
																<li class="nav-item">
																	<a class="nav-link" 
																	<?php 	// verifica se o link é externo
																		if($dados_menu[link_externo] != 'Sim'){ ?>	 href="<?php echo $url.$dados_menu[link]; ?> ">
																			<?php }else{ ?>
																			href="https://<?php echo $dados_menu[link] ?>" target="<?php echo $dados_menu[janela] ?>">	
																		<?php } ?>
																		<?php echo utf8_encode(strtoupper($dados_menu['nome_exibicao'])); ?>
																	</a> 
																</li> 
																
																
																
																
															<?php } ?>
															
															<!-- campo de busca no menu desktop -->
															<?php //Se logado botoes somem
																if($vip != true) { ?>
																<li class="nav-item">
																	
																	<form method="post" action="https://www.hotboys.com.br/busca"> 
																		<input type="search" id="search" name="search" placeholder="Busca..." list="preenchimento-automatico" style="width: 94%; padding-left: 45px; font-size: 17px; color: #676767; border: 1px solid #cecece; border-radius: 3px; background: url(https://hotboys.com.br/imagens/icones/lupa-pesquisa-40px.png) no-repeat #e0e0e0; height: 38px; margin-top: 2px; -webkit-appearance: none;">
																	</form>	</li>
															<?php } ?>
														</ul>
													</div>
												</div>
												
											</nav>
											
											
										<?php } ?>
										<!-- Menu principal (MOBILE) -->
										
										<div id="main-nav">
											<nav> 
												<!-- Bandeiras do menu MOBILE -->
												<div class="col-sm-12 col-xs-12">
													<div id="topo-bandeiras">
														<div class="topo-bandeira">
														<a href="#"><img src="<?php echo URL ?>imagem/bandeira-br.png" border="0" alt="bandeira brasil"></a></div>
														<div class="topo-bandeira">
														<a href="#"><img src="<?php echo URL ?>imagem/bandeira-us.png" border="0" alt="bandeira eua"></a></div>
													</div>
												</div>
												<div class="col-sm-12 col-xs-12 logo-branca-menu"> 
													<a href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?>">
													<img src="<?php echo URL ?>imagens/logos/hotBoys_whitefull.png" alt="logo menu mobile"/></a> 
												</div>
												
												<?php
													if($vip != true) { ?>
													<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
														<div class="col-sm-6 col-xs-6 float-left">
															<a href="<?php echo URL ?>assine">
																<button type="button" class="btn btn-assinar">
																	Assinar
																</button>
															</a>
														</div>
														<div class="col-sm-6 col-xs-6 float-left">
															<a href="<?php echo URL ?>vip/login">
																<button type="button" class="btn btn-login">
																	Entrar
																</button>
															</a>
														</div>
													</div>
													<?php } else { ?>
													<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
														<div class="col-sm-12 col-xs-12 float-left">
															<a href="<?php echo URL ?>vip/minha-conta">
															<button type="button" class="btn btn-assinar"><?php echo M_CONTA ?></button></a>
															<button type="button" class="btn btn-assinar">
																<a href="<?php echo URL ?>vip/login/index.php?acao=sair">Sair</a>
															</button>
														</div>
													</div>
												<?php } ?>
												
												<!--Menu Mobile -->
												<div class="col-sm-12 menu-mobile" >  
													<?php // tras Menu para mobile
														//tras o banco mediante a localização
														if($vip) {
															$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Vip' AND status='Ativo' ORDER BY ordem ASC "; 
															}else{
															$query = "SELECT * FROM `menu_principal` WHERE menu_tipo='Principal' AND exibicao='Aberto' AND status='Ativo' ORDER BY ordem ASC "; 
														}	
														$consulta = mysql_query($query);
														$total = mysql_num_rows($consulta);
														while($dados_menu = mysql_fetch_array($consulta)){ 
														?>
														<a href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;}; echo $dados_menu['link']; ?>" align="center">
															<div><?php echo utf8_encode(strtoupper($dados_menu['nome_exibicao'])); ?></div>
														</a>
													<?php } ?>
													
													
													<!-- Busca no menu Mobile -->
													<div class="col-sm-12 busca-mobile float-left" align="center">
														
														<?php //Se logado botoes somem
															if($vip != true) { ?>
															<form class="form-inline my-2 my-lg-0" method="post" action="<?php echo URL ?>busca">
																<?php }else{ ?>
																<form class="form-inline my-2 my-lg-0" method="post" action="<?php echo URL_VIP ?>busca">
																<?php } ?>
																<input type="search" id="search" name="search" placeholder="Busca...">
																
															</form>
														</div>
														<!-- Solohot no menu mobile -->
														<div class="col-lg-12 solohot-menu">
															<a href="<?php echo URL_SOLO ?>">
																<img src="<?php echo URL ?>imagens/logos/solohot_whitefull.png" alt="logo solohot menu mobile"/>
															</a>
														</div>
														<!-- Logo Cinehot no menu mobile -->
														<div class="col-lg-12 cinehot-menu">
															<a href="#"><img src="<?php echo URL ?>imagens/logos/cinehot_whitefull.png" alt="logo cinehot menu mobile"/></a>
														</div>
														<!-- Logo HoTV no menu mobile -->
														<div class="col-lg-12 hotv-menu">
															<a href="#"><img src="<?php echo URL ?>imagens/logos/hotv_whitefull.png" alt="logo hotv menu mobile"/></a>
														</div>
													</nav>
												</div>
												
												<?php/* echo $_SESSION[email_cliente_logado]; */ ?>
												
												
												
												<style>
												.botao-whatsapp a{position: fixed;z-index: 9999;right: 0;float: right;top: 40%;margin-top: -25px;cursor: pointer;min-width: 50px;max-width: 150px;color: #fff;text-align: center;padding: 10px;margin: 0 auto 0 auto;background: #20B038;-webkit-transition: All 0.5s ease;-moz-transition: All 0.5s ease;-o-transition: All 0.5s ease;-ms-transition: All 0.5s ease;transition: All 0.5s ease;}
												.botao-whatsapp a:hover{color:#fff!important;background:#e31330}
												</style>
												
												<?php if ($detect->isMobile()) { ?>
													<?php }else{ ?>
													<div class="botao-whatsapp">
														<a href="https://wa.me/5521980892091" target="_blank">
															<span>
																<i class="fab fa-whatsapp" style="font-size: 23px;margin-top: 0px;float: left;margin-right: 5px;">
																	</i>
																	</span> 
																	
																	<span style="font-size: 12px;font-family: &quot;Open Sans&quot;;float: none;line-height: 2em;">Atendimento</span>
														</a>
														
													</div>	
												<?php } ?>																											