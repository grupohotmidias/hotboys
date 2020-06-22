<?php
	// variaveis dos arquivos de configuracao
	$config = '../novo-projeto/config/configuracoes.php';
	$funcoes = '../includes/funcoes.php';
	$vip_page = 'includes/vip.php';
	
	//Variavel dos css
	$head = 'includes/estrutura/topo/head.php';
	
	$naoVerificarPagamento = true;
	
	//variavel dos arquivos da estrutura da pagina
	$perfil_usuario = 'includes/estrutura/topo/perfil/perfil-usuario.php';
	
	//variavel da programacao perfil
	$programacao_perfil = 'includes/paginas/perfil-usuario.php';
	
	//variavel que puxa o modal de contato
	$contato = '../novo-projeto/includes/modal/rodape/contato.php';
	
	//variavel do nav topo
	$nav = 'includes/estrutura/topo/nav-topo.php';
	
	//variavel do menu lateral
	$menu_lateral = 'includes/estrutura/menu/menu-lateral.php';
	
	//
	$modal_onoff = '../novo-projeto/includes/modal/rodape/modal-botao-on-off.php';
	
	// requer arquivo de configuracoes
	require_once($config);
	
	// requer arquivo das funcoes
	require_once($funcoes);
	
	//Variavel dos arquivos de configuracao
	include_once($vip_page);
	
	//Variavel dos arquivos de configuracao
	include_once($perfil_usuario);
	
	//Variavel dos arquivos de configuracao
	include_once($programacao_perfil);
?>

<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>Hotboys - Área VIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		<!-- CSS da pagina -->
        <link rel="stylesheet" href="<?php echo URL ?>assets/css/perfil.css?v=<?php echo Version; ?>">
	</head>
	
	
	<!-- CSS do site -->
	<link href="https://www.hotboys.com.br/novo-projeto/assets/css/estilo.css?v=<?php echo Version; ?>" rel="stylesheet">
	
	<body onload="blocking('editar_perfil_conta'); blocking('background');">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
			
			<!-- Nav/menu fixa do topo-->
			<?php include_once ($nav); ?>
			
			<div class="ui-theme-settings">
				<button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
					<i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
				</button>
			</div>  
			<div class="app-main">
				
				<!-- Menu sidebar/lateral do topo -->
				<?php include_once ($menu_lateral); ?>
				
				<!-- ## Conteudo da pagina ## -->
				<div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
								
								<!-- Titulo do conteudo -->
                                <div class="page-title-heading">
                                    <h5>Minha conta do prazer</h5>
								</div>
								
							</div>
						</div>    
						
						<!-- Main Content -->
						<div id="content" class="perfil">
							
							<!-- Conteudo -->
							<div class="container-fluid pd-0">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 todo-conteudo pd-0">
									
									<div>
										<!-- Quadro 01 - Foto do usuario e botao on/off -->
										<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 infoConta">
											<div class="quadro1_minha_conta">	
												
												<h5>Foto de Perfil</h5>
												
												<div class="foto-perfil">
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
														
														<!-- Envio do Form foto de perfil -->
														<form action="minha-conta" name="minha-conta-form-foto" id="minha-conta-form-foto" method="POST" enctype="multipart/form-data">
															
															<!-- Div Mae da foto de perfil -->
															<div class="foto-editavel">
																<!-- foto perfil -->
																<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="width:140px;padding:0">
																	
																	<!--<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 botaoDeletar">
																		<div>
																		<label for="foto_perfil" class="btn">Alterar</label>
																		
																		<input name="foto_perfil" id="foto_perfil" style="visibility:hidden;" type="file">
																		<div" id="minha-conta-salvar-imagem" onclick="document.getElementById('minha-conta-form-foto').submit();">
																		<span class="btn" style="font-weight:bold">
																		<span class="glyphicon glyphicon-floppy-disk"></span> Salvar
																		</span>
																		</div>
																	</div>-->
<div class="perfil-foto" style="background-image: url(<?php echo $fotoPerfil ?>);border-radius: 50%!important;">
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
																
																
															</div>
														</div>
														<!-- FIM div mae da foto de perfil -->
														
														<input type="hidden" name="acao" value="alterar_imagem" />
														<div style="clear:both"></div>
													</form>
													<!-- FIM  Envio do Form foto de perfil -->
												</div>
												
												<!-- Botao de remover foto de perfil 
													
													<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" style="width: 140px;margin:0 auto;padding:0">
													<form action="perfil-novo.php" name="minha-conta" id="minha-conta" method="POST" enctype="multipart/form-data" style="margin: 0 auto;float: none;text-align: center;">
													<div class="col-lg-12 fotoPerfil">
													<input type="submit" name="foto_perfil" id="foto_perfil" class="excluir_imagem" value="Deletar"/>
													</div>
													<input type="hidden" name="acao" class="excluir_imagem" value="deleta_imagem" />
													</form>
													</div>
												-->
												<?php
													if ($dados_user[exibir_imagem_comentario] == 'on') {
														$checked = 'checked="checked"';
														}else {
														unset($checked);
													}
												?>
												<!--## Botao ON / OFF ##-->
												<form  method="POST" enctype="multipart/form-data">
													<div cstyle="width:140px;margin: 0 auto;padding: 0;">
														<!-- Botao -->
														<input type="hidden" name="acao" value="on" />
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 fundo-botao-on-off">
															<input type="hidden" name="acao" value="on" />
															
															<div class="info_usuario"> 
																<p>Opção de exibição:</p> 
															</div>
															
															<label class="on-off">
																<input type="checkbox" id="forname" name="exibir_imagem_comentario" onChange='submit();' <?php if($dados_user[exibir_imagem_comentario] == 'on'){?> onclick="return confirma(); return true" value="on" <?php }else{?> onclick="return confirma2(); return true"<?php } ?> <?php echo $dados_user[exibir_imagem_comentario] ?> <?php echo $checked ?>/>
																<span class="fundo arredondado"></span>
															</label>
															
															<!-- Texto ao lado do botao -->
															<div class="textoOnOff">
																<div class="texto-on-off"> Ativar/Desativar foto dos comentários</div>
															</div>
															
														</div>
														
														
														
													</form>
												</div>
											</div>
										</div>
										<form  method="POST" enctype="multipart/form-data"> 
											
											<!-- Quadro 02 - Informacoes do Usuario -->
											<div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 infoUsuario">
												<div class="quadro2_minha_conta">
													<h5>Informações do usuário</h5>
													
													<div class="info_usuario"> 
														<p>Nome:</p> 
														<span class="nome"><?php echo trim($dados_user[primeiro_nome])?> <?php echo trim($dados_user[sobrenome])?></span> 
													</div>
													
													<div class="info_usuario"> 
														<p>Número do Cliente:</p> 
														<span><?php echo $id_cliente; ?></span> 
													</div>
													
													<div class="info_usuario"> 
														<p>Login de Acesso:</p> 
														<span class="email"><?php echo($dados_user[email])?></span> 
													</div>
													
													
													<?php
														if($data_limite_acesso != ''){
														?>
														<div class="info_usuario"> 
														</div>
													<?php } ?>
													
												</div>
											</div>
											
											
											<!-- Quadro 03 - Informacoes financeiras -->
											<div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12 infoFinanceiro" style="float:left;padding-right: 0;">
												<div class="quadro3_minha_conta">
													<h5>Informações financeiras</h5>
													
													<div class="info_usuario"> 
														<p>Formas de Pagamento:</p> 
														<span><?php echo $nome_forma_pagamento; ?></span> 
													</div>
													
													<?php if(texto_vencimento !='') { ?>
														<div class="clear"></div>
														<div class="info_usuario"> 
															<p>Assinatura:</p>
															<?php if($renovacao_automatica == 0){ ?>
																<span><?php echo $texto_vencimento; ?> <?php echo  $dias." dias" ?></span> 
																<?php }else{ ?>
																<span><?php echo  $dias." dias" ?> <?php echo $texto_vencimento; ?> </span> 
															<?php } ?>
														</div>
													<?php } ?>
													
													
													<?php // so exibe renovaçao automatica se a mesma for cancelada 
														if($renovacao_automatica == 0){?> 
														<div class="clear"></div>
														<div class="info_usuario"> 
															<p>Renovação Automática:</p>
															<span style="font-size:0.8em;">Cancelada</span>
														</div>
													<?php } ?>
													
												</div>
											</div>
											
											<!-- Quadro 04 - Editar Perfil -->
											<div class="quadro4_minha_conta">
												<a data-toggle="collapse" href="#mostrarCampos" role="button" aria-expanded="false" aria-controls="collapseExample">
													<h5 id="editar-perfil">Perfil <span class="align-middle">(Clique para mostrar)</span></h5>
												</a>
												<div class="collapse" id="mostrarCampos">
													<div class="editar_perfil_minha_conta " id="editar_perfil_conta">
														
														<div class="minha_conta_nome">
															<p>Nome:</p>
															<input class="form-control" type="text" id="primeiro_nome" name="primeiro_nome" value="<?php echo trim($dados_user[primeiro_nome])?>" maxlength="18" disabled>
														</div>
														
														
														<div class="minha_conta_sobrenome">
															<p>Sobrenome:</p>
															<input class="form-control" type="text" id="sobrenome" name="sobrenome" value="<?php echo trim($dados_user[sobrenome])?>" maxlength="18" disabled>
														</div>
														
														
														<div class="minha_conta_apelido">
															<p>Apelido - Nome de Exibição:</p>
															
															<input class="form-control" type="text" id="nome_exibicao" name="nome_exibicao" value="<?php echo trim($dados_user[nome_exibicao])?>" maxlength="13" disabled>
														</div>
														
														
														<div class="minha_conta_nascimento">
															<p>Data de Nascimento:</p>
															
															<input class="form-control" type="date" id="data_de_nascimento" name="data_de_nascimento" value="<?php echo trim($dados_user[data_de_nascimento])?>" maxlength="8" disabled>
														</div>
														
														
														<div class="minha_conta_estado">
															<p>Estado:</p>												
															<select class="form-control" name="estado" id="estado" value="<?php echo($dados_user[estado])?>" required disabled>
																<option selected="true" disabled="disabled">Estado*:</option>
																<option value="AC" <?php if ($dados_user[estado]=='AC' ) echo 'selected="selected"' ?>>Acre</option>
																<option value="AL" <?php if ($dados_user[estado]=='AL' ) echo 'selected="selected"' ?>>Alagoas</option>
																<option value="AP" <?php if ($dados_user[estado]=='AP' ) echo 'selected="selected"' ?>>Amapá</option>
																<option value="AM" <?php if ($dados_user[estado]=='AM' ) echo 'selected="selected"' ?>>Amazonas</option>
																<option value="BA" <?php if ($dados_user[estado]=='BA' ) echo 'selected="selected"' ?>>Bahia</option>
																<option value="CE" <?php if ($dados_user[estado]=='CE' ) echo 'selected="selected"' ?>>Ceará</option>
																<option value="DF" <?php if ($dados_user[estado]=='DF' ) echo 'selected="selected"' ?>>Distrito Federal</option>
																<option value="ES" <?php if ($dados_user[estado]=='ES' ) echo 'selected="selected"' ?>>Espírito Santo</option>
																<option value="GO" <?php if ($dados_user[estado]=='GO' ) echo 'selected="selected"' ?>>Goiás</option>
																<option value="MA" <?php if ($dados_user[estado]=='MA' ) echo 'selected="selected"' ?>>Maranhão</option>
																<option value="MT" <?php if ($dados_user[estado]=='MT' ) echo 'selected="selected"' ?>>Mato Grosso</option>
																<option value="MS" <?php if ($dados_user[estado]=='MS' ) echo 'selected="selected"' ?>>Mato Grosso do Sul</option>
																<option value="MG" <?php if ($dados_user[estado]=='MG' ) echo 'selected="selected"' ?>>Minas Gerais</option>
																<option value="PA" <?php if ($dados_user[estado]=='PA' ) echo 'selected="selected"' ?>>Pará</option>
																<option value="PB" <?php if ($dados_user[estado]=='PB' ) echo 'selected="selected"' ?>>Paraíba</option>
																<option value="PR" <?php if ($dados_user[estado]=='PR' ) echo 'selected="selected"' ?>>Paraná</option>
																<option value="PE" <?php if ($dados_user[estado]=='PE' ) echo 'selected="selected"' ?>>Pernambuco</option>
																<option value="PI" <?php if ($dados_user[estado]=='PI' ) echo 'selected="selected"' ?>>Piauí</option>
																<option value="RJ" <?php if ($dados_user[estado]=='RJ' ) echo 'selected="selected"' ?>>Rio de Janeiro</option>
																<option value="RN" <?php if ($dados_user[estado]=='RN' ) echo 'selected="selected"' ?>>Rio Grande do Norte</option>
																<option value="RS" <?php if ($dados_user[estado]=='RS' ) echo 'selected="selected"' ?>>Rio ,Grande do Sul</option>
																<option value="RO" <?php if ($dados_user[estado]=='RO' ) echo 'selected="selected"' ?>>Rondônia</option>
																<option value="RR" <?php if ($dados_user[estado]=='RR' ) echo 'selected="selected"' ?>>Roraima</option>
																<option value="SC" <?php if ($dados_user[estado]=='SC' ) echo 'selected="selected"' ?>>Santa Catarina</option>
																<option value="SP" <?php if ($dados_user[estado]=='SP' ) echo 'selected="selected"' ?>>São Paulo</option>
																<option value="SE" <?php if ($dados_user[estado]=='SE' ) echo 'selected="selected"' ?>>Sergipe</option>
																<option value="TO" <?php if ($dados_user[estado]=='TO' ) echo 'selected="selected"' ?>>Tocantins</option>
															</select>
															<script language="javascript">
																populateCountries("country", "state");
																populateCountries("country2");
															</script>
														</div>
														
														<div class="minha_conta_cidade">
															<p>Cidade:</p>
															<input class="form-control" type="text" id="cidade" name="cidade" value="<?php echo trim($dados_user[cidade])?>" required disabled>
														</div>
														
														<!-- Botao atualizar informacoes 
															<label for="bt-enviar-form">
															<input type="hidden" name="acao" value="enviar" />
															<button type="button" class="btn btn-primary btn-lg btn-block atualizar" id="bt-enviar-form" >Vai ser um prazer Atualizar</button>
															</label>
														-->
														
													</div>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							
						</div>
						<!-- End of Main Content -->
						
						
					</div>
					
				</div>
				<!-- ## FIM Conteudo da pagina ## -->
			</div>
			
			<!-- jQuery v3.2.1 ---------------->
			<script src="<?php echo URL ?>js/jquery.min.js"></script>
			<script>
				var jQuery3211 = jQuery.noConflict();
				window.jQuery = jQuery3211;
			</script>
			
			<!-- Javscript principal/geral -->
			<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/main.js"></script>
			
			<!-- Javscript Botao On/Off -->
			<script type="text/javascript" src="<?php echo URL_VIP ?>assets/js/on-off.js"></script>
			
			<!--  Chama Modal - Politica de Privacidade -->
			<?php include_once ($modal_onoff); ?>
			
			<!-- ##Botão Whatsapp no Rodape## -->
			<!-- Icone do whatsappx
			<a href="https://wa.me/5521965035394" class="whatsappFixo" Style="" target="_blank">
				<!-- Icone do whatsapp
				<i style="margin-top:16px" class="fab fa-whatsapp"></i>
				<p>Atendimento</p>
			</a>
			-->
			
			<!--  Chama Modal - Modal Contato -->
			<?php include_once ($contato); ?>
			
		</body>
	</html>																																	