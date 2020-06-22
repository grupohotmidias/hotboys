<style>
	button.btn-assinar {
    margin-top: 6px!important;
	}
	.busca-topo{
	float: right;
    text-align: right;
    margin-right: 18px;
	}
	.btn-assinar .fa-lock{float: left; color: white!important;background-color: transparent!important;}
	.btn-assinar .fa-lock:before{background-color: transparent;
	}
	.inicial_box_conteudo a{
	width:100%;
	}
</style>

<?php
	
	// Detecta a resolucao do cliente - Mobile ou Computador //
	require_once ('mobili/Mobile_Detect.php');
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
	
	$data_logo = date("Y-m-d H:i:s");
    //consulta da tabela de logos 
    $query_logo = "SELECT * FROM `logos` WHERE status='ativo' ";
    $consulta_logo = mysql_query($query_logo);
    $dados_logo = mysql_fetch_array ($consulta_logo);
	
	
    //CONSULTA DA TABELA MODELO_POP_UP
    $query_modelo_pop_up = "SELECT * FROM `modelo_pop_up` WHERE status='Ativo' order by RAND()";
    $consulta_modelo_pop_up = mysql_query($query_modelo_pop_up);
    $dados_modelo_pop_up = mysql_fetch_array($consulta_modelo_pop_up);
	
	
	// busca o id do usuarios logado
    $query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
    $consulta_user = mysql_query($query_user);
    $total_user = mysql_num_rows($consulta_user);
    $dados_user = mysql_fetch_array($consulta_user);
    
	//imagem do perfil
	if($vip == true){ 
		if($dados_user['foto_perfil'] == ''){
			//não tem foto de perfil
			$fotoPerfil = URL.'imagens/icones/perfil/avatar_sfoto.jpg';		
			} else {
			//tem foto de perfil
			$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');			
		}
	}
	
    $id_usuario = $dados_user[id];
	if(@$_COOKIE[verificacao_idade] != 'sim'){
		
	?>
	<!-- Popup - Aviso ao Entrar no Site -->
	
	<?php if ($detect->isMobile()) { ?>
		<style>
			/* Botões topo*/
			button.btn-assinar {
			margin-top: 14px;
			text-transform: uppercase;
			width:30%;
			height: 31px;
			font-size: 15px;
			line-height: 1;
			color: #fff;
			letter-spacing: 0.025em;
			background: #e31330!important;
			cursor: pointer;
			border: 0;
			border-radius: 2px;
			min-width: 120px;
			overflow: hidden;
			top: 50%;
			left: 50%;
			transform: translate(0%, 0%);
			}
			button.btn-login {
			text-transform: uppercase;
			width:30%;
			height: 31px;
			font-size: 15px;
			line-height: 1;
			color: #0d0d0d;
			letter-spacing: 0.025em;
			background: #dddddd;
			cursor: pointer;
			border: 0;
			border-radius: 2px;
			min-width: 120px;
			overflow: hidden;
			top: 50%;
			left: 50%;
			transform: translate(0%, 0%);
			}
			
			button.btn-assinar span,button.btn-login span {
			display: block;
			position: relative;
			z-index: 10;
			}
			
			button.btn-assinar:after,
			button.btn-assinar:before,
			button.btn-login:after,
			button.btn-login:before{
			content: '';
			position: absolute;
			top: 0;
			left: calc(-100% - 30px);
			height: calc(100% - 29px);
			width: calc(100% + 20px);
			color: #fff;
			border-radius: 2px;
			transform: skew(-25deg);
			height:31px;
			}
			
			button.btn-assinar:after,button.btn-login:after {
			background: #fff;
			transition: left 0.8s cubic-bezier(0.86, 0, 0.07, 1) 0.2s;
			z-index: 0;
			opacity: 0.8;
			}
			
			button.btn-assinar:before {
			background: #ffbe01;
			z-index: 5;
			transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
			}
			button.btn-login:before {
			background: #e31330;
			z-index: 5;
			transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
			}
			button.btn-login:before span{
			color:#fff!important
			}
			
			button.btn-assinar:hover:after,button.btn-login:hover:after {
			left: calc(0% - 10px);
			transition: left 0.8s cubic-bezier(0.86, 0, 0.07, 1);
			}
			
			button.btn-assinar:hover:before,button.btn-login:hover:before {
			left: calc(0% - 10px);
			transition: left 1s cubic-bezier(0.86, 0, 0.07, 1);
			}
			button.btn-assinar span:hover{
			color:black;
			}
			
			button.btn-login span:hover{
			color:#fff;
			}
		</style>
		
		
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
													<a class="block"><?php echo TERMO_7 ?></a></p>
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
					
					
					
							
							
							
							
							<!-- Div da logo, botoes e busca (Fundo Branco) -->
							<?php 
								//Se Mobile, carrega o perfil administrativo do cliente
								if ($detect->isMobile()) { ?>
								
								<nav class="navlogo navlogo-expand-lg navlogo-dark bg-white">
									<div class="container">
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
											<!-- LOOGOMARCAS DO TOPO -->
											<!-- Logo Preta p/ fundo claro -->
											<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 logo-fundo-branco" style="margin-top:25px;"> 
												<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?>"><img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo_branca']?>" alt="Logo da HotBoys no topo"/></a> 
											</div>
											
											<!-- Logo Branca p/ fundo escuro -->
											<div class="col-lg-11 col-md-11 col-sm-11 col-xs-10 logo-fundo-preto" style="margin-top:25px;"> 
												<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?> "><?php if($dados_logo[data_termino] > $data_logo){?> 
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;"/>
													<?php }else{ ?>
													<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;"/> 
												<?php } ?>
												</a>
											</div>
											
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-2 topo-menu-principal-mobile">
												<header class="cf"> 
													<a id="navicon" class="closed">&#9776;
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
												<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-branco" style="margin-top:0px;margin-bottom:0px;">
													<?php }else { ?>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-branco" style="margin-top:8px;margin-bottom:5px;"> 
													<?php } ?>
													<a class="navlogo-brand" href="<?php if($vip != true){ echo URL; }else{echo URL_VIP;} ?>"><img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo_branca']?>" alt="Logo topo" style="margin-left: 16px;"/></a> 
												</div>
												
												<!-- Logo Branca p/ fundo escuro -->
												<?php 
													if($vip != true) { ?>
													<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top:0px;margin-bottom:0px"> 
														<?php }else { ?>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 logo-fundo-preto" style="margin-top:8px;margin-bottom:5px"> 
														<?php } ?>
														<a class="navlogo-brand" href="<?php echo URL ?>home/">
															<?php if($dados_logo[data_termino] > $data_logo){?> 
																<img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;width: 50%;"/> 
																<?php }else{ ?>
															    <img src="https://server2.hotboys.com.br/arquivos/<?php echo $dados_logo['logo']; ?>" alt="Logo topo" style="margin-left: 16px;width: 50%;"/> 
															<?php } ?>
														</a>
													</div>
													
													
													<!-- botoes ASSINE e ENTRAR -->
													<?php //Se logado botoes somem
														if($vip != true) { ?>
														<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center" style="margin-top: 8px;">
															<?php } else { ?> 
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 botoes-pretos-topo" align="center" style="margin-top:8px;">
															<?php }?>
															
														</div>
														
														
														<?php //Se logado botoes somem
															if($vip != true) { ?>
															<!-- Formulario NÃO VIP - Botão Busca -->
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 busca-topo">
																<?php //Se logado botoes somem
																if($vip != true) { ?>
																<a href="<?php echo URL ?>vip/login"><button type="button" class="btn-login"><span>Login</span></button></a>
																<a href="<?php echo URL ?>assine">
																<button type="button" class="btn-assinar" style=" background: #20b038!important; color: #fff;"><span><i class="fa fa-lock"></i> Assinar</span></button></a>
															
																<?php } else { ?> 
																<span class="minha-conta"><a href="<?php echo URL_VIP ?>minha-conta"><button type="button" class="btn-assinar">
																<span><?php echo M_CONTA ?></span></button></a></span>
																<span class="minha-conta-sair"><a href="<?php echo URL_VIP ?>login/index.php?acao=sair"><button type="button" class="btn-login"><span>Sair</span></button></a></span>
															<?php } ?> 
																
															</div><!-- FIM Formulario NÃO VIP - Botão Busca -->
															
															<?php } else { ?> 
															<!-- Formulario VIP - Botão Busca -->
															<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 busca-topo">
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6" style="margin-top:8px">
																	<form method="post" action="<?php echo URL_VIP ?>busca" class="busca-topo-vip" style="float:left!important" > 
																		<input type="search" id="search" name="search" placeholder="Busca...">
																		
																	</form>
																</div>
																
																
																
																<!--##	INICIO Area do Cliente VIP no TOPO  ##-->
																<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
																	<div class="usuario-topo">
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" class="area-cliente-topo" style="background: #e2dcde;height:70px">
																			
																			<!--## INICIO Link - Area do Cliente VIP no TOPO  ##-->
																			<a href="<?php echo URL_VIP ?>minha-conta" style="color: #0d0d0d;">
																				
																				<div class=" col-lg-9 col-md-9 col-sm-12 col-xs-12 info-cliente-topo-desktop" style="margin:0 auto;float:none!important;padding-left: 5px!important;padding-right: 5px!important;margin-top:13px;">
																					
																					<!-- Imagem - Area do Cliente VIP no TOPO -->
																					<div class="espaco-imagem-topo-desktop" style="float: left; width: 40%;">
																						<img src="<?php echo $fotoPerfil ?>" alt="imagem cliente" style="width: 39px; border-radius:50%;margin-top: 4px; margin-right: 16px">
																					</div>
																					
																					
																					<!--## INICIO Saudacao - Area do Cliente VIP no TOPO  ##-->
																					<div class="espaco-perfil-topo-desktop" style=" float: left; width: 60%; text-align: left">
																						<div class="perfil-info espaco-saudacao" style="float: left; margin-top: 9px;text-align:leftc;color: #000;">
																							
																							
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
																					
																					<div style="width:46px;height:46px;background-image: url(<?php echo $fotoPerfil ?>); background-repeat: no-repeat;background-size: 46px 46px;border-radius: 50%;">
																						
																						<?php
																							if($dados_user['foto_perfil'] == ''){
																								//não tem foto de perfil
																								$fotoPerfil = '../imagens/comentarios/avatar_sfoto.jpg';		
																								} else {
																								//tem foto de perfil
																								$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
																							}
																						?>
																					</div>
																					
																					
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
																				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1" href="#bs-sidebar-navbar-collapse-1">
																					<span class="sr-only">Toggle navigation</span>
																					<span class="glyphicon glyphicon-cog"></span>
																				</button>   <!-- FIM Botao de engrenagem que carrega o menu vertical --> 
																			</div><!-- Informacoes do  cliente -->
																		</div>
																		
																		
																	</div>
																	
																																	
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
											<nav class="navbar navbar-expand-lg navbar-dark bg-danger" style=" height: 12px; margin-top: 3px; ">
											
													
												</nav>
												
												
											<?php } ?>
											
											<?php 
												$query = "SELECT * FROM informs_indicativos WHERE pagina_exibicao = 'geral' AND status='Ativo'";
												$consulta = mysql_query($query);
												$dados = mysql_fetch_array($consulta);
												
												if($dados['status']=="ativo" && $dados['tipo_informacao']=="aviso"){ ?>
												
												<!-- Alerta de AVISO -->
												<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
													<div class="container">
														<div class="row">
															<div class="col-md-12">
																
																<!-- CSS do alerta de AVISO -->
																<style>
																	.alert {
																	border-radius: 0;
																	-webkit-border-radius: 0;
																	box-shadow: 0 1px 2px rgba(0,0,0,0.11);
																	display: table;
																	width: 100%;
																	}
																	
																	.alert-white {
																	border-top-color: #d8d8d8;
																	border-bottom-color: #bdbdbd;
																	border-left-color: #cacaca;
																	border-right-color: #cacaca;
																	color: #404040;
																	padding-left: 61px;
																	position: relative;
																	}
																	
																	.alert-white.rounded {
																	border-radius: 3px;
																	-webkit-border-radius: 3px;
																	}
																	
																	.alert-white.rounded .icon {
																	border-radius: 3px 0 0 3px;
																	-webkit-border-radius: 3px 0 0 3px;
																	}
																	
																	.alert-white .icon {
																	text-align: center;
																	width: 45px;
																	height: 100%;
																	position: absolute;
																	top: 0;
																	left: 0;
																	border: 1px solid #bdbdbd;
																	padding-top: 15px;
																	}
																	
																	
																	.alert-white .icon:after {
																	-webkit-transform: rotate(45deg);
																	-moz-transform: rotate(45deg);
																	-ms-transform: rotate(45deg);
																	-o-transform: rotate(45deg);
																	transform: rotate(45deg);
																	display: block;
																	content: '';
																	width: 10px;
																	height: 10px;
																	border: 1px solid #bdbdbd;
																	position: absolute;
																	border-left: 0;
																	border-bottom: 0;
																	top: 50%;
																	right: -6px;
																	margin-top: -3px;
																	background: #fff;
																	}
																	
																	.alert-white .icon i {
																	font-size: 20px;
																	color: #fff;
																	left: 12px;
																	margin-top: -10px;
																	position: absolute;
																	top: 50%;
																	}
																	/*============ colors ========*/
																	.alerta-manutencao {
																	color: #3c763d!important;
																	background-color: #d8ffd8;
																	border-color: #60c060;
																	width: 98%;
																	}
																	@media (max-width:480px){
																	.alerta-manutencao {width: 96%;}
																	}
																	.alerta-manutencao p{
																	color: #3c763d;
																	font-family: "Open Sans";
																	font-weight: bold;
																	text-align: left;
																	margin-top: 3px;
																	}
																	
																	.alert-white.alerta-manutencao .icon, 
																	.alert-white.alerta-manutencao .icon:after {
																	border-color: #54a754;
																	background: #60c060;
																	}
																	
																	.alert-info {
																	background-color: #d9edf7;
																	border-color: #98cce6;
																	color: #3a87ad;
																	}
																	
																	.alert-white.alert-info .icon, 
																	.alert-white.alert-info .icon:after {
																	border-color: #3a8ace;
																	background: #4d90fd;
																	}
																	
																	
																	.alert-white.alert-warning .icon, 
																	.alert-white.alert-warning .icon:after {
																	border-color: #d68000;
																	background: #fc9700;
																	}
																	
																	.alert-warning {
																	background-color: #fcf8e3;
																	border-color: #f1daab;
																	color: #c09853;
																	}
																	
																	.alert-danger {
																	background-color: #f2dede;
																	border-color: #e0b1b8;
																	color: #b94a48;
																	}
																	
																	.alert-white.alert-danger .icon, 
																	.alert-white.alert-danger .icon:after {
																	border-color: #ca452e;
																	background: #da4932;
																	}
																</style>
																
															</div>
														</div>
													</div>
												</div><!-- Alerta de Aviso-->
												
												
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
															<img src="<?php echo URL ?>imagens/logos/hotBoys_whitefull.png" alt="logo menu mobile"/>
														</a> 
													</div>
													
													
													<?php
														if($vip != true) { ?>
														<div class="col-sm-12 busca-mobile float-left" align="center">
															
															<form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/busca" style="float:left">
																<input type="search" id="search" name="search" placeholder="Busca...">
																
															</form>
														</div>
														
														<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
															<div class="col-sm-12 col-xs-12 float-left">
																<a href="<?php echo URL ?>assine">
																	<button type="button" class="btn btn-assinar" style="margin-left:0%">
																			<span>Assinar</span>
																	</button>
																</a>
															</div>
															<div class="col-sm-12 col-xs-12 float-left">
																<a href="<?php echo URL ?>vip/login">
																	<button type="button" class="btn btn-login" style="margin-right:0%">
																		<span>Entrar</span>
																	</button>
																</a>
															</div>
														</div>
														<?php } else { ?>
														
														<div class="col-sm-12 busca-mobile float-left" align="center">
															
															<form class="form-inline my-2 my-lg-0" method="post" action="https://www.hotboys.com.br/vip/busca" style="float:left">
																<input type="search" id="search" name="search" placeholder="Busca...">
																
															</form>
														</div>
														<div class="col-sm-12 col-xs-12 menu-mobile-btns-topo">
															<div class="col-sm-12 col-xs-12 float-left">
																<a href="<?php echo URL ?>vip/minha-conta">
																<button type="button" class="btn btn-minhaconta"><?php echo M_CONTA ?></button></a>
																<a href="<?php echo URL ?>vip/login/index.php?acao=sair">
																	<button type="button" class="btn btn-sair">
																		Sair
																	</button>
																</a>
															</div>
														</div>
													<?php } ?>
													
													<!--Menu Mobile -->
													<div class="col-sm-12 menu-mobile" > 
														
														
														<!-- menu mobile HOME -->
														<?php //Se for VIP, carrega url da VIP
															if($vip) { ?>
															<a class="nav-link" href="<?php echo URL_VIP ?>">
																<?php 
																	//caso nao, carrega url normal
																}else{ ?>
																<a class="nav-link" href="<?php echo URL ?>">
																<?php } ?>
																<div>HOME</div>
															</a> 
															
															
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
															
															
															
															
															
															<!-- Solohot no menu mobile -->
															<div class="col-lg-12 solohot-menu" style="margin-top: 13px;">
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
														</div>
														
														<?php/* echo $_SESSION[email_cliente_logado]; */ ?>
														
														
														
														<style>
															.botao-whatsapp a{position: fixed;z-index: 9999;right: 0;float: right;top: 40%;margin-top: -25px;cursor: pointer;min-width: 50px;max-width: 150px;color: #fff;text-align: center;padding: 10px;margin: 0 auto 0 auto;background: #20B038;-webkit-transition: All 0.5s ease;-moz-transition: All 0.5s ease;-o-transition: All 0.5s ease;-ms-transition: All 0.5s ease;transition: All 0.5s ease;box-shadow: 8px 2px 5px #131313b8;}
															.botao-whatsapp a:hover{color:#fff!important;background:#e31330;}
														</style>
												
														
														
														
														<?php 
															$query = "SELECT * FROM informs_indicativos WHERE pagina_exibicao = 'geral' AND status='Ativo'";
															$consulta = mysql_query($query);
															$dados = mysql_fetch_array($consulta);
															
															if($dados['status']=="ativo" && $dados['tipo_informacao']=="aviso"){ ?>
															
															
															
														<?php } ?>
														
														<?php
															if($dados['status']=="ativo" && $dados['tipo_informacao']=="manutencao"){ ?>
															
															<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
																<div class="container">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="alert alerta-manutencao alert-dismissable">
																				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
																				×</button>
																				<div style="font-weight:bold;margin-bottom:7px">
																					<span class="glyphicon glyphicon-wrench"></span> 
																					MANUTENÇÃO
																				</div>
																				<?php echo $dados['informacao'];?>
																			</div>
																		</div>
																	</div>
																</div><!-- Alerta de Manutencao -->
															</div>
														<?php }?>
														<?php
															if($dados['status']=="ativo" && $dados['tipo_informacao']=="mensagem"){ ?>
															<div class="col-sm-12 col-xs-12 col-md-12 col-lg-12">
																<div class="container">
																	<div class="row">
																		<div class="col-md-12">
																			<div class="alert alerta-manutencao alert-dismissable">
																				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">
																				×</button>
																				<div style="font-weight:bold;margin-bottom:7px">
																					<span class="glyphicon glyphicon-envelope"></span> 
																					Mensagem INFORMATIVA
																				</div>
																				
																				<?php echo $dados['informacao'];?>
																			</div>
																		</div>
																	</div>
																</div><!-- Alerta de mensagem -->
															</div><!-- fim do script de mensagem tipo = mensagem-->
														<?php } ?> 	
													</nav>
												</div>												