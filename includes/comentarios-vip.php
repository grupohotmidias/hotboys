<?php
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]' ";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
	$id_usuario = $dados_user[id];
	$email_usuario = $dados_user[email];
	$nome_usuario = $dados_user[nome];
	$cidade_usuario = $dados_user[cidade];
	$estado_usuario = $dados_user[estado];
	echo $_SESSION[email_cliente_logado];
	//verifica se campos foram preenchidos
	if($_POST['acao'] == 'cadastrar' ){

		
		$nome = preg_replace('/[^[:alpha:]_]/',' ',$_POST['nome']);
		$email_cliente = $email_usuario;
		$estado = $estado_usuario;
		$cidade = $cidade_usuario;
		$mensagem = preg_replace('/[^[`~!:alpha:]_]/',' ',$_POST['mensagem']);
		
		// consulta se menssagem ja existe.
		$query_v = "SELECT * FROM `comentarios_conteudo` WHERE mensagem='$mensagem' AND nome='$nome'  AND estado='$estado' ";
		$consulta_v = mysql_query($query_v);
		$total_v = mysql_num_rows($consulta_v);
		
		// exbibe mensagem se comentario ja existir 
		if($total_v >= 1){
            
			echo "<script language='Javascript'>alert('comentario ja feito! OBRIGADO ')</script>";
            
			}else{
			
			//inseri no banco os dados
			$query = "INSERT INTO `comentarios_conteudo` (
			`id` ,
			`video` ,
			`tipo` ,
			`data` ,
			`nome` ,
			`email_cliente` ,
			`estado` ,
			`cidade` ,
			`mensagem` ,
			`status`
			) VALUES (
			NULL , '$id', '$pg', NOW(), '$nome', '$dados_user[email]', '$estado', '$cidade', '$mensagem', '0')";
			mysql_query($query);	
			$cadastrou = true;	
			
			//mensagem que houve cadastro
			if($cadastro != true){
				echo "<script language='Javascript'>alert('Comentário Registrado com sucesso')</script>";
               
				
			}//fim  mensagem 
		}
		
	}// Fim de verificação de cadastro de comentario
	
	//pega informaçoes das respostas
	if($_POST['acao'] == 'responder'  ){
		
		
		$nome = addslashes($_POST['nome']);
		$email_cliente = addslashes($_POST['email_cliente']);
		$mensagem = addslashes($_POST['mensagem']);
		$resp_msg = addslashes($_POST['resp_msg']);
		
		// consulta se menssagem ja existe.
		$query_v = "SELECT * FROM `comentarios_conteudo` WHERE mensagem='$mensagem' AND nome='$nome' AND email_cliente='$email_cliente'  ";
		$consulta_v = mysql_query($query_v);
		$total_v = mysql_num_rows($consulta_v);
		
		if($total_v >= 1){
			echo "<script language='Javascript'>alert('comentario ja feito! OBRIGADO ')</script>";			
			
			}else{
			
			$query = "INSERT INTO `comentarios_conteudo` (
			`id`,
			`video`,
			`resposta`,
			`id_resposta`,
			`tipo`,
			`data`,
			`nome`,
			`email_cliente`,
			`mensagem`,
			`status`
			) VALUES (
			NULL , '$id', '1', '$resp_msg', '$pg', NOW(), '$nome', '$email_cliente', '$mensagem', '0')";
			mysql_query($query);	
			$cadastrou = true;	
			
			//mensagem que houve cadastro
			if($cadastro != true){
				echo "<script language='Javascript'>alert('comentario ja feito! OBRIGADO ')</script>";
				
			}//fim  mensagem 
			
		}//fim  post cadastar 
		
	}//fim  if comentariuo ja existe 
	
	//lista  os comentários
	$query = "SELECT * FROM `comentarios_conteudo` WHERE video='$id'  AND resposta='0' AND tipo='$pg' AND status='1' order by id desc LIMIT 3";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	
	
?>

<script src="https://code.jquery.com/jquery-1.9.1.js"></script>
<script>
	var $scroll = jQuery.noConflict();
	$scroll(document).ready(function () {
		size_scroll = $scroll(".comentarios-tudo #scrollinfinito").size();
		x=3;
		$scroll('.comentarios-tudo #scrollinfinito:lt('+x+')').show();
		$scroll('#carregarmais').click(function () {
			x= (x+3 <= size_scroll) ? x+3 : size_scroll;
			$scroll('.comentarios-tudo #scrollinfinito:lt('+x+')').show();
		});
		$scroll('#mostrarmenos').click(function () {
			x=(x-3<0) ? 3 : x-3;
			$scroll('.comentarios-tudo #scrollinfinito').not(':lt('+x+')').hide();
		});
	});
</script>
<!-- Container Tudo - Engloba todo o conteudo -->
<div class="container-tudo" style="float:none!important">
	
	<?php //Se comentario for igual a 0, esconde o titulo comentario
		if($total >= 1){	?>
		<!-- Título 'Comentários' -->
		<h1 class="comentarios-titulo" style="border-left:0!important;padding-left:0!important"><img src="https://www.hotboys.com.br/imagens/icones/pimenta-titulo.png" style="margin-top: -5px;margin-right:5px">
			
			<?php  
			if($total == 1){ ?>1 COMENTÁRIO
			<?php }else{
			echo $total ?> COMENTÁRIOS
			<?php } ?>
				</h1>				
	<?php } ?>
	
	<div class="container">	
		
		<div class="row centralizada">
			
			<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 comentarios-tudo">
				
				<div class="container">
					
					<?php
						//$i é o numero de cometarios
						$i = 1;
						
						while ($linha = mysql_fetch_array($consulta)){
							
							//$i faz loop
							$i  <= $total ;  $i++; 
							$id_comentario = addslashes($linha['id']);
							$nome = addslashes(ucfirst($linha['nome']));
							$email_cliente = addslashes(ucfirst($linha['email_cliente']));
							$data = $linha['data'];
							$estado = $linha['estado'];
							$cidade =  $linha['cidade'];
							$comentario = addslashes($linha['mensagem']);
							
							$tempo = formatar_tempo(strtotime($linha[data]));
							
							$dia = substr($data, 8, 2).'/'.substr($data, 5, 2).'/'.substr($data, 0, 4);
							$hora = substr($data, 10, 6);
						?>
						<div class="container container-table" id="scrollinfinito">
							<div class="text-justify col-lg-12 col-md-12 col-sm-12 col-xs-12 espaco-comentarios">
								<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 comentarios-avatar">
                                    <div class="perfil-foto">
										<?php
											
											if($dados_user['foto_perfil'] == 'off'){
												//não tem foto de perfil
												$fotoPerfil = '../imagens/comentarios/avatar_sfoto.jpg';		
												} else {
												//tem foto de perfil
												$fotoPerfil = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');			
											}
											
											if($dados_user[email] == $linha[email_cliente] and $dados_user[exibir_imagem_comentario] == 'on'){?>
											<img src="<?php echo $fotoPerfil ?>" id="minha-conta-img-perfil" class="img-circle profile_img" >
											<?php }else{?>
											<img src="<?php echo URL ?>../imagens/comentarios/avatar_sfoto.jpg"/>
										<?php } ?>
									</div>
								</div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
										
										<!-- Nome de quem comentou -->
										
										<span class="col-lg-9 col-md-9 col-sm-9 col-xs-6 nome-comentarios"><?php echo $nome ?></span>
										
										<!-- Localidade de quem comentou -->
										
										<span class="col-lg-3 col-md-3 col-sm-3 col-xs-6 comentarios-lugar"><?php echo $estado ?> - <?php echo $cidade ?></span>
										
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
										
										<span class="comentarios">
											<?php echo $comentario ?>
											
										</span>
										
										<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10" >
											
											<!-- Período que o comentário está no site -->
											
											<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 comentarios-periodo-da-postagem">
												
												<span><?php echo $tempo ?></span>
												
											</div>
											
											<div class="col-lg-9 col-md-9 col-sm-9 col-xs-7 comentarios_formulario-responder">
												<!-- Botão Responder fica aqui oculto/aparecendo através do Javascript -->		
												
												<!-- Caixa para Responder Comentario esconde/aparece -->
												<div class="comentarios_responder">
													<form id="form2" name="form2" method="post">
														<input type="hidden" name="resp_msg" value="<?php echo $id_comentario ?>">
														<div class="container">
															<div class="row float-none">
																<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																	<!--## INICIO Campo Usuario ##-->
																		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box form-group">
																			<input class="form-control sel1" name="nome" id="sel1" value="<?= ($dados_user[primeiro_nome]) ? trim($dados_user[primeiro_nome]) : '' ?>" <?= ($dados_user[primeiro_nome]) ? 'disabled' : '' ?>>
																			<span class="unit">Nome:</span>
																		</div>
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 input-box  form-group">
																		<textarea class="form-control sel1" id="sel1" name="mensagem" rows="3" required=""></textarea>
																		<span class="unit">Comentário:</span>
																	</div>
																	
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																		<!-- ReCaptcha do Google para preenchimento dos formulários -->
																		<div class="container recaptcha-comentarios">
																			<div class="row">
																				<div class="g-recaptcha" data-sitekey="6Ld1yzYUAAAAABxjm37Y8S36R8TpwoIXKkjq_Ers"></div>
																			</div>
																		</div> 
																	</div>
																	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
																		<!-- Botão Enviar formulário -->
																		<div class="container margin-top-10">
																			<div class="row">
																				
																				<input name="acao" type="hidden" id="acao" value="responder" />
																				
																				<input type="submit" name="button" id="button" class="btn btn-primary" value="Enviar" />
																			</div>      
																		</div>
																	</div>
																</form>
															</div>
														</div>
													</div>
												</div><!-- FIM Caixa para Responder Comentario esconde/aparece -->
											</div>
										</div>
									</div>
								</div>
								<?php
									//faz consulta para ver se tem resposta para comentario
									$query_resposta = "SELECT * FROM `comentarios_conteudo` WHERE video='$id'  AND id_resposta='$id_comentario' AND resposta='1' AND tipo='$pg' And status='1'  order by id asc";
									$consulta_resposta = mysql_query($query_resposta);
									$total_resposta = mysql_num_rows($consulta_resposta);
									
									// se tiver resposta do comentario exibe
									if ($total_resposta >=1){
										
										while ($l_consulta = mysql_fetch_array($consulta_resposta)){ 
											
											$tempo = formatar_tempo(strtotime($l_consulta[data]));
											
											$dia = substr($data, 8, 2).'/'.substr($data, 5, 2).'/'.substr($data, 0, 4);
										$hora = substr($data, 10, 6);	?>
										<!-- Quem Responde os comentários -->
										<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 comentario_resposta_box">
											<div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 comentarios-avatar"><img src="<?php echo URL ?>imagens/comentarios/avatar_sfoto.jpg"/></div>
											<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<!-- Nome de quem comentou -->
													<span class="col-lg-12 col-md-12 col-sm-12 col-xs-12 nome-comentarios"><?php echo $l_consulta[nome] ?></span>
													<!-- Localidade de quem comentou -->
												</div>
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
													<span class="comentarios">
														<?php echo $l_consulta[mensagem] ?>
													</span>
													<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 margin-top-10" >
														
														<!-- Período que o comentário está no site -->
														<div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 comentarios-periodo-da-postagem">
															<span><?php echo $tempo ?></span>
														</div>
													</div>
												</div>
											</div>
											
										</div> <!-- FIM Quem Responde os comentários -->
									<?php }  //fim de wile resposta s?>
									
								<?php } // total resposta ?>	
								
							</div>
						</div>
					<?php } ?>
					
				</div>
				<?php //Se tiver ate 3 comentarios, esconde mostrar mais
					if($total >= 4){	?>
					<div id="carregarmais">Mostrar mais</div>
					<!-- <div id="mostrarmenos">Mostrar menos</div>-->
				<?php }?>
				
				<div class="container" >
					<div class="row float-none">
						
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comentarios_formulario-comentar">
						
							<!-- BOTAO COMENTAR fica aqui oculto/aparecendo através do Javascript -->
							
							
							<!-- Caixa para COMENTAR esconde/aparece -->
							<div class="comentarios_formulario">
								<p class="titulo-comentar-formulario">
									<?php echo utf8_decode('Qual e Sua Opiniao ? Comente Tambem.') ?>
									</p>
								
								<form id="form1" name="form1" method="post" >
									<div class="container">
										<div class="row float-none">
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<!--## INICIO Campo Usuario ##-->
													<div class="col-lg-12 col-md-6 col-sm-12 col-xs-12 input-box form-group">
														<input class="form-control sel1" id="nome" name="nome" value="<?php echo trim($dados_user[primeiro_nome])?>"  required/><span class="unit">Nome:</span>
													</div>
												</div>
												<div class="container margin-top-10">
													<div class="row">
														<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 select-box form-group">
															<textarea class="form-control sel1" name="mensagem" id="mensagem" rows="3"></textarea><span class="unit"><?php echo utf8_decode('Comentário:') ?></span>
														</div>
													</div>
												</div>
												<!-- ReCaptcha do Google para preenchimento dos formulários -->
												<div class="container recaptcha">
													<div class="row">
														<div class="g-recaptcha" data-sitekey="6Ld1yzYUAAAAABxjm37Y8S36R8TpwoIXKkjq_Ers"></div>
													</div>
												</div>     
												
												<input name="acao" type="hidden" id="acao" value="cadastrar" />
												
												<!-- Botão Enviar formulário -->
												<div class="container margin-top-10">
													<div class="row">
														
														<input type="submit" name="button" id="button" class="btn btn-primary" value="Enviar" />
														
													</div>      
												</div>
											
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						
					</div>
					
				</div>
				
			</div>	
		</div>	
	</div>	
</div><!-- Fim do container-tudo --> 	