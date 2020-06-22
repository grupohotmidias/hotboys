<?php
	// busca o id do usuarios logado
	$query_user = "SELECT * FROM `usuarios_perfil` WHERE `email`='$_SESSION[email_cliente_logado]'";
	$consulta_user = mysql_query($query_user);
	$total_user = mysql_num_rows($consulta_user);
	$dados_user = mysql_fetch_array($consulta_user);
	
	$id_usuario = $dados_user[id];
	$nome_usuario = $dados_user[primeiro_nome];
	$email_usuario = $dados_user[email];
	$estado_usuario = $dados_user[estado];
	$cidade_usuario = $dados_user[cidade];
	$foto_usuario = $dados_user[foto_perfil];
	$exibir_foto_usuario = $dados_user[exibir_imagem_comentario];
	
	//echo $_SESSION[email_cliente_logado];
	
	//verifica se campos foram preenchidos
	if($_POST['acao'] == 'cadastrar' ){
		
		$nome = preg_replace('/[^[:alpha:]_]/',' ',$_POST['nome']);
		$email_cliente = $email_usuario;
		$estado = $estado_usuario;
		$cidade = $cidade_usuario;
		$mensagem = preg_replace('/[^[`~!:alpha:]_]/',' ',$_POST['mensagem']);
		
		// consulta se menssagem ja existe.
		$query_v = "SELECT * FROM `comentarios_conteudo` WHERE mensagem='$mensagem' AND nome='$nome_usuario'  AND estado='$estado_usuario' ";
		$consulta_v = mysql_query($query_v);
		$dados_v = mysql_fetch_array($consulta_v);
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
			NULL , '$id', '$pg', NOW(), '$nome_usuario', '$email_usuario', '$estado_usuario', '$cidade_usuario', '$mensagem', '0')";
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
		
		
		$query_v = "SELECT * FROM `comentarios_conteudo` WHERE mensagem='$mensagem' AND nome='$nome' AND email_cliente='$email_cliente'";
		$consulta_v = mysql_query($query_v);
		$dados_v = mysql_fetch_array($consulta_v);
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
			NULL , '$id', '1', '$resp_msg', '$pg', NOW(), '$nome', '$email_usuario', '$mensagem', '0')";
			mysql_query($query);	
			$cadastrou = true;	
			
			//mensagem que houve cadastro
			if($cadastro != true){
				echo "<script language='Javascript'>alert('comentario ja feito! OBRIGADO ')</script>";
				
			}//fim  mensagem 
			
		}//fim  post cadastar 
		
	}//fim  if comentariuo ja existe 
	
	//lista  os comentários
	$query = "SELECT * FROM `comentarios_conteudo` WHERE video='$id'  AND resposta='0' AND tipo='$pg' AND status='1' order by id desc";
	$consulta = mysql_query($query);
	$total = mysql_num_rows($consulta);
	
	$foto_comentario = $dados_user[foto_perfil];
	
	//não tem foto de perfil no comentario
	$SemfotoComentario = URL.'../imagens/icones/perfil/avatar_sfoto.jpg';		
	
	//tem foto de perfil no comentario
	$fotoComentario = MiniaturaPerfil($dados_user['foto_perfil'], 140, 140, 'ffffff', 'crop', 'perfil');
	
	
?>
<form id="form1" name="form1" method="post" >
	<div class="container-fluid comente">
		<div class="row">	
			<div class="col-12 p-0">
				<ul>
					<li class="comment user-comment">
						<a class="avatar">
						
								<?php if($dados_user['foto_perfil'] == '' || $dados_user['exibir_imagem_comentario'] == 'on'){ ?>
									
									<img src="<?php echo $fotoComentario ?>" width="50" alt="Avatar cliente" title="<?php echo $nome ?>" />
									
									<?php }else{ ?>
									
									<img src="<?php echo $SemfotoComentario ?>" width="50" alt="Avatar cliente" title="<?php echo $nome ?>" />
									
								<?php } ?>
						
							
						</a>
						
						<div class="espaco-comentario"> 
							
							<input type="hidden" class="form-control sel1" id="nome" name="nome" value="<?php echo trim($dados_user[primeiro_nome])?>"  required/>
							
							<textarea class="form-control sel1" name="mensagem" id="mensagem" rows="2" placeholder="Deixe seu comentário..." required></textarea>
							
							<div class="enviar-comentario"> 
								<input name="acao" type="hidden" id="acao" value="cadastrar" />
								
								<!-- Botão Enviar formulário -->
								<input type="submit" name="button" id="button" class="btn btn-primary" value="Enviar" />
							</div>
						</li>
					</div>
					
				</ul>
			</div>
		</div>
	</div>
</form>


<!-- Comentarios -->
<div class="container-fluid comentarios float-left">
	
	<div class="row">
		<?php if($vip){  ?>
			<div class="col-12 p-0">
				<ul class="comment-section">
					
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
						
						<!-- comentario -->
						<li class="comment user-comment">
							<div class="info">
								
								<!-- nome de quem fez o comentario -->
								<div class="name"><?php echo $nome ?> <span class="bullet time-ago-bullet" aria-hidden="true">•</span><!-- periodo da publicacao-->
									<span><?php echo $tempo ?></span>
								</div>
								
							</div>
							<a class="avatar">
								
								<?php if($linha['email_cliente'] == $dados_user['email']){ ?>
								<?php if($dados_user['foto_perfil'] == '' || $dados_user['exibir_imagem_comentario'] == 'on'){ ?>
									
									<img src="<?php echo $fotoComentario ?>" width="50" alt="Avatar cliente" title="<?php echo $nome ?>" />
									
									<?php }else{ ?>
									
									<img src="<?php echo $SemfotoComentario ?>" width="50" alt="Avatar cliente" title="<?php echo $nome ?>" />
									
								<?php } ?>
								
								<?php }else{ ?>
									
									<img src="<?php echo $SemfotoComentario ?>" width="50" alt="Avatar cliente" title="<?php echo $nome ?>" />
									
								<?php } ?>
								
							</a>
							<p>
								
							<?php echo $comentario ?></p>
						</li>
					<?php } ?>
					
				</ul>
			</div>
			<?php }else{ ?>
			<div class="col-12">
				<ul class="comment-section">
					
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
						
						<!-- comentario -->
						<li class="comment user-comment">
							<div class="info">
								
								<!-- nome de quem fez o comentario -->
								<div class="name"><?php echo $nome ?> <span class="bullet time-ago-bullet" aria-hidden="true">•</span><!-- periodo da publicacao-->
									<span><?php echo $tempo ?></span>
								</div>
								
							</div>
							<a class="avatar">
								<img src="<?php echo $fotoPerfil ?>" width="50" alt="Avatar cliente" title="<?php echo $nome ?>" />
							</a>
							<p><?php echo $comentario ?></p>
						</li>
					<?php } ?>
					
				</ul>
			</div>
		<?php } ?>
		
	</div>
</div>
</div>