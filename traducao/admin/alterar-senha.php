<?php

		session_start();
		require('../configuracoes/configuracoes.php');
		require('includes/class.formularios.php');
		require('includes/class.alertas.php');
		require('includes/funcoes.php');
		
		
		
		validar_usuario();
		
		
		$form = new form();
		$alertas = new alertas();
		
		
		/*
		 *  MENSAGENS:
		 * 	$msg_erro[]
			$msg_noticia[]
			$msg_informacao[]
			$msg_sucesso[]
		 * 
		 */
		
		
		
		
		
		
		//cadastrar novo item
		if($_POST[acao]=='cadastrar'){			
			
			
			$id_usuario = id_agenciador();
			
			
			$query = "UPDATE `administradores` SET  `senha` = '$_POST[senha]' WHERE login='admin' LIMIT 1 ";
			mysql_query($query);
			
			$msg_sucesso[] = 'Senha alterada com sucesso.';	
			
		}
		
		
		
		



?>

<?php include('header.php'); ?>
	
<script>
function verificar_senha(){
	
	if(document.form.senha.value == document.form.confirmar_senha.value){
		return true;	
	} else {
		alert('As duas senhas precisam ser iguais.');
		return false;	
	}
	
}
</script>	
	
	
	<div id="page-wrapper">
    
    
		<div id="main-wrapper">        
			<div id="main-content">            
            

                
                <div class="other-box gray-box ui-corner-all">
					<div class="cont ui-corner-all">
						<h3>Altere sua Senha</h3>                      
					</div>
				</div>
                
                
                <?php echo $alertas->exibir($msg_erro, $msg_noticia, $msg_informacao, $msg_sucesso); ?>
                
            
            
            	<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><span class="ui-icon ui-icon-circle-arrow-s"></span>Alterar Senha</div>
					<div class="portlet-content">
						<form action="alterar-senha.php" method="post" enctype="multipart/form-data" class="forms" name="form" id="form" onsubmit="return verificar_senha();">
							<ul>
								
                                
                                
                                
                                
                                
                                
                                
                                
                                <li>
									<div style="float:left">
                                    <label class="desc">
										Nova Senha <span class="PreenchimentoObrigatorio">(*)</span>
									</label>
                                    
									<div style="float:left">
										<input name="senha" type="password" class="medium required" id="senha" />
									</div>
                                                                        
                                    </div>
                                    
								</li>
                                
                                
                                
                                
                                
                                
                                <li>
									<div style="float:left">
                                    <label class="desc">
										Confirmar Senha <span class="PreenchimentoObrigatorio">(*)</span>
									</label>
                                    
									<div style="float:left">
										<input name="confirmar_senha" type="password" class="medium required" id="confirmar_senha" />
									</div>
                                                                        
                                    </div>
                                    
								</li>
                                
                                
                                
                                
                                
                                
                                
								
								<li class="buttons">
                                	<input type="hidden" name="acao" value="cadastrar" />
									<input name="Cadastrar Cliente" type="submit" class="submit" value="Alterar Senha">
								</li>
						  </ul>
						</form>
					</div>
				</div>
            
                      
            </div>
			<div class="clearfix"></div>
		</div>
		
		
		
		
		
		
		
		
		
		
		<?php require('includes/menu-atendimentos.php') ?>
		
		
		
		
		
		
		<div style="clear:both; height:100px;"></div>

	</div>
	
    
   
<?php include('footer.php'); ?>
</body>
</html>