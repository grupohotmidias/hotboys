<?php
	
	//lista  os comentários
	$query = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND resposta='0' AND tipo='$pg' AND status='1' order by id desc";
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
<div class="container-tudo">
	
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
                       
	if($dados_user['foto_perfil'] == ''){
	//não tem foto de perfil
		$fotoPerfil = 'https://hotboys.com.br/imagens/comentarios/avatar_sfoto.jpg';		
	} else {
	//tem foto de perfil
		$fotoPerfil = 'https://hotboys.com.br/imagens/comentarios/avatar_sfoto.jpg';			
	}
                            
                            if($dados_user[email] == $linha[email_cliente] and $dados_user[exibir_imagem_comentario] == 'on'){?>
                            
                           <img src="<?php echo $fotoPerfil ?>" id="minha-conta-img-perfil" class="img-circle profile_img" >
                            <?php }else{?>
								<img src="https://hotboys.com.br/imagens/comentarios/avatar_sfoto.jpg"/>
								<?php } ?>
								</div>
                                </div>
								<div class="col-lg-11 col-md-11 col-sm-11 col-xs-11">
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" >
										
										<!-- Nome de quem comentou -->
										
										<span class="col-lg-9 col-md-9 col-sm-9 col-xs-6 nome-comentarios"><?php if($nome !=''){ echo $nome; }else{ echo 'Anônimo';} ?></span>
										
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
											
											
											<div class="comentarios-responder-nao-vip">
												<span style="cursor:pointer"  data-toggle="modal" data-target="#gridSystemModal">Responder</span>
											</div>
											
										</div>
										
									</div>
								</div>
								<?php
									//faz consulta para ver se tem resposta para comentario
									$query_resposta = "SELECT * FROM `comentarios_conteudo` WHERE video='$id' AND id_resposta='$id_comentario' AND resposta='1' AND tipo='$pg' And status='1'  order by id asc";
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
				
				
				<?php //Se comentario for igual a 0, esconde carregar mais
					if($total >= 4){	?>
				<div id="carregarmais">Mostrar mais</div>
				<!-- <div id="mostrarmenos">Mostrar menos</div>-->
				<?php } ?>
				<div class="container" >
					<div class="row float-none">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 comentarios-comentar-nao-vip">
							<!-- Botão Comentar fica aqui oculto/aparecendo através do Javascript -->
							<span class="comentar-nao-vip" data-toggle="modal" data-target="#gridSystemModal">Torne-se um membro e comente</span>
						</div>
						
						
					</div>
				</div>
						
			</div>	
		</div>	
		

	</div>	


	</div><!-- Fim do container-tudo --> 
	

<!-- Janela Modal -->
<div class="modal comentarios" id="gridSystemModal" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="z-index: 9999">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="gridSystemModalLabel" style="text-align: center;text-transform: uppercase;color:#2b2a2a"><i class="fa fa-key"></i> Comentários exclusivos para Membros</h4>
			</div>
			<div class="modal-footer">
				
				<button type="button" class="btn btn-default" data-dismiss="modal" style="background-color: #dadada!important">FECHAR</button>
				<a href="<?php echo URL ?>assine">
					<button type="button" class="btn btn-primary" style="background-color: #e21531!important">ASSINAR</button>
				</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- FIM Janela Modal -->

