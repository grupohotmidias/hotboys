<?php
	// variaveis dos arquivos de configuracao
	require_once('../novo-projeto/config/configuracoes.php');
	require_once('../includes/funcoes.php');
	include_once('includes/includes_gerais.php');
	
	//modal do botao on/off
	$modal_onoff = '../novo-projeto/includes/modal/rodape/modal-botao-on-off.php';	
	
	// consulta foto de perfil
	$sql_perfil = "SELECT * FROM `usuarios_perfil` WHERE `id_user` = '$id_cliente'";
	$consulta_perfil = mysql_query($sql_perfil);
	$row_perfil = mysql_fetch_array($consulta_perfil);
	
	// formulario de foto
	if(isset($_POST['enviar_arquivo'])){
		$formatosPermitidos = array("png","jpeg","jpg","gif");
		$extensao = pathinfo($_FILES['perfil_foto']['name'], PATHINFO_EXTENSION);
		if(in_array($extensao, $formatosPermitidos)){
			$pasta = "imagens/area-do-cliente/fotos-clientes/";
			$temporario = $_FILES['perfil_foto']['tmp_name'];
			$novo_nome = uniqid().".$extensao";
			
			move_uploaded_file($temporario, $pasta.$novo_nome);
			if( $row_perfil['foto_perfil'] == ''){
				$sql_inserir = "INSERT into `usuarios_perfil`(
				`id`, 
				`id_user`,
				`primeiro_nome`, 
				`email`, 
				`nome_exibicao`,
				`foto_perfil`
				) VALUES (
				NULL , '', '', '','','$novo_nome')";
				
				if(mysql_query($sql_inserir)){
					$mensagem_foto = "foto enviada com sucesso";
					header('location:https://www.hotboys.com.br/vip/minha-conta/');
					exit();
				}
				}else{
				$sql_atualizado = "UPDATE `usuarios_perfil` SET `foto_perfil` = '$novo_nome' WHERE `id_user`='$id_cliente'";
				
				if(mysql_query($sql_atualizado)){
					$mensagem_foto = "foto atualizada com sucesso";
					header('location:https://www.hotboys.com.br/vip/minha-conta/');
					exit();
				}
			}
			
			}else{
			$mensagem = 'Formato invÃ¡lido';
		}
		echo $mensagem_foto;
	}
?>
	
<!doctype html>
<html lang="pt-BR">
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta http-equiv="Content-Language" content="en">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<title>🌶 Hotboys - Área VIP</title>
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
		<meta name="description" content="This is an example dashboard created using build-in elements and components.">
		<meta name="msapplication-tap-highlight" content="no">
		
		<!-- Favicons e CSS -->
		<?php include_once ($head); ?>
		
		<!-- CSS da pagina -->
        <link rel="stylesheet" href="<?php echo URL ?>novo-projeto/assets/css/perfil.css?v=<?php echo Version; ?>">
	</head>
	
	
	<!-- CSS do site -->
	<link href="<?php echo URL ?>novo-projeto/assets/css/estilo.css?v=<?php echo Version; ?>" rel="stylesheet">
	
	<body onload="blocking('editar_perfil_conta'); blocking('background');">
		<div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header closed-sidebar">
			
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
				<div class="conteudoTudo">
					<div class="app-main__outer">
						<div class="app-main__inner">
							<div class="app-page-title">
								<div class="page-title-wrapper">
									
									<!-- Titulo do conteudo -->
									<div class="page-title-heading">
										<h5>Minha Conta do Prazer</h5>
									</div>
									
								</div>
							</div>    
							
							<!-- Main Content -->
							<div class="quadro1_minha_conta">	
													
													<h5>Foto de Perfil</h5>
													
														<form action="" name="minha-conta-form-foto" id="minha-conta-form-foto" method="POST" enctype="multipart/form-data">
														
														<?php if($dados_user[foto_perfil] !=""){ ?>
														<div>
														<?php }else{ ?>
														<div style="margin-bottom:30px">
														<?php } ?>
															
															<input type="file" accept="image/*" name="perfil_foto" id="perfil_foto" required onchange="readURL(this); ">
															<label for="perfil_foto" class="d-flex justify-content-center">
																<div class="perfil-foto">
																	<img id="foto_envio" src="<?php echo $fotoPerfil ?>"/>
																</div>
															</label>
															
															<!-- botao para editar foto -->
															<div id="atualizar_foto">
																<i class="fas fa-camera"></i> Atualizar
															</div>
															<!-- botao para salvar foto -->
															
															<div id="salvar_foto"> 
																<input type="submit" name="enviar_arquivo" id="enviar_arquivo" value="SALVAR">
															</div>
															
															
														</div>
													</form>
													
</div>
												</div>
											</div>
						
					</div>
				</div>
				<!-- ## FIM Conteudo da pagina ## -->
			</div>
			
			<!-- Mostra foto de perfil atualizada assim que envia -->
			<script class="jsbin" src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> 
			<script>
				function readURL(input) { 
					if (input.files && input.files[0]) { 
						var reader = new FileReader(); reader.onload = function (e) { 
							$('#foto_envio') .attr('src', e.target.result); 
						};
					reader.readAsDataURL(input.files[0]); } }
			</script>
			
			<!--  Chama Modal - Modal Contato -->
			<?php include_once ($editar_perfil); ?>
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
			
			<script>
				var objDiv = document.getElementById("editarEmail");
				objDiv.scrollTop = objDiv.scrollHeight;
				
			</script>
			
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
			
			<!--  Chama Modal - Modal Duvidas Frequentes -->
			<?php include_once ($duvidas_frequentes); ?>
			
			<!--  Chama Modal - Modal Termos de Uso -->
			<?php include_once ($termos); ?>
			
			<!-- Footer -->
			<?php include_once ($footer); ?>
			
			<?php
			require('includes/hotmidias/js.php');
		?>
		</body>
	</html>																																									