<?php

		require('../configuracoes/configuracoes.php');
		require('../includes/classes/classes.php');

		
		
		if(!AdminLogin::verificar()){
		//não está logado	
			header("Location: index.php?acao=desconectado");
			exit();
		}


		
		
		
		//editar item
		if($_POST[acao]=='editar'){
				
			$smtp_servidor 	= Dados::input($_POST[smtp_servidor]);
			$smtp_usuario 	= Dados::input($_POST[smtp_usuario]);
			$smtp_senha 	= Dados::input($_POST[smtp_senha]);
			$smtp_porta 	= Dados::input($_POST[smtp_porta]);
			$smtp_conexao 	= Dados::input($_POST[smtp_conexao]);
			$nome 			= Dados::input($_POST[nome]);
			$responder_para = Dados::input($_POST[responder_para]);
			$emails_hora 	= Dados::input($_POST[emails_hora]);
			
			
			
			$queryUpdate = "UPDATE configuracoes SET
			smtp_servidor = '$smtp_servidor',
			smtp_usuario = '$smtp_usuario',
			smtp_senha = '$smtp_senha',
			smtp_porta = '$smtp_porta',
			smtp_conexao = '$smtp_conexao',
			nome = '$nome',
			responder_para = '$responder_para',
			emails_hora = '$emails_hora' ";
			mysql_query($queryUpdate);
			
			
			$msgSucesso[] = 'Configurações alteradas com sucesso!';			
		}
		
		
		
		
		
		
		$queryConfiguracoes = "SELECT * FROM configuracoes";
		$consultaConfiguracoes = mysql_query($queryConfiguracoes);
		$dados = mysql_fetch_array($consultaConfiguracoes);
		
		
		
		
		
		//menu aberto
		$configuracoes = true;
		$configuracoesConfig = true;
		

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<meta charset="iso-8859-1" />
<title>Gerenciador<?php if(NOME_EMPRESA != '') echo ' - '.NOME_EMPRESA ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- BEGIN PLUGIN CSS -->
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-timepicker/css/bootstrap-timepicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
<link rel="stylesheet" href="assets/plugins/ios-switch/ios7-switch.css" type="text/css" media="screen">

<!-- END PLUGIN CSS -->
<!-- BEGIN CORE CSS FRAMEWORK -->
<link href="assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css"/>
<!-- END CORE CSS FRAMEWORK -->
<!-- BEGIN CSS TEMPLATE -->
<link href="assets/css/style.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/responsive.css" rel="stylesheet" type="text/css"/>
<link href="assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
<!-- END CSS TEMPLATE -->


</head>
<!-- BEGIN BODY -->
<body class="">

<!-- BEGIN CONTAINER -->
<div class="page-container row"> 
 


	<?php require('includes/menu.php') ?>




  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">   
    <div class="content">
      
      <div class="page-title"> 
        <h3>Configurações - <span class="semi-bold">Newsletter</span></h3>
      </div>  
       
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            
            <div class="grid-body">
			<form class="form-no-horizontal-spacing" id="form" name="form" method="POST" enctype="multipart/form-data">	
              	<div class="row column-seperation">
                	<div class="col-md-12">
                                           
	                    <div class="row form-row">
	                      <div class="col-md-6">
	                      	<label class="form-label">Servidor SMTP: <strong>*</strong></label>
	                        <input name="smtp_servidor" value="<?php echo $dados[smtp_servidor] ?>" type="text" class="form-control" required>
	                      </div>
	                      
	                      <div class="col-md-3">
	                      	<label class="form-label">Porta SMTP: <strong>*</strong></label>
	                        <input name="smtp_porta" value="<?php echo $dados[smtp_porta] ?>" type="text" class="form-control" required>
	                      </div>
	                      
	                      
	                      <div class="col-md-3">
	                      	<label class="form-label">Tipo de Conexão:</label>
	                       	<select class="form-control" name="smtp_conexao">	                       		
	                       		<option value=""> </option>
	                       		<option value="TLS" <?php if($dados[smtp_conexao]=='TLS') echo 'selected="selected"' ?> >TLS</option>
	                       		<option value="SSL" <?php if($dados[smtp_conexao]=='SSL') echo 'selected="selected"' ?> >SSL</option>
	                       		
	                       	</select>
	                      </div>
	                    </div>
	                    
	                    
	                    
	                    <div class="row form-row">
	                      <div class="col-md-5">
	                      	<label class="form-label">Usuário Conta SMTP: <strong>*</strong></label>
	                        <input name="smtp_usuario" value="<?php echo $dados[smtp_usuario] ?>" type="text" class="form-control" required>
	                      </div>
	                      
	                      <div class="col-md-5">
	                      	<label class="form-label">Senha Conta SMTP: <strong>*</strong></label>
	                        <input name="smtp_senha" value="<?php echo $dados[smtp_senha] ?>" type="password" class="form-control" required>
	                      </div>	                      
	                      
	                      <div class="col-md-2">
	                      	<label class="form-label">E-mails por hora: <strong>*</strong></label>
	                        <input name="emails_hora" value="<?php echo $dados[emails_hora] ?>" type="text" class="form-control" required>
	                      </div>
	                    </div>
	                    
	                    
	                    
	                    <div class="row form-row">
	                      <div class="col-md-5">
	                      	<label class="form-label">Nome do Remetente: <strong>*</strong></label>
	                        <input name="nome" value="<?php echo $dados[nome] ?>" type="text" class="form-control" required>
	                      </div>
	                      
	                      <div class="col-md-5">
	                      	<label class="form-label">E-mail para respostas: <strong>*</strong></label>
	                        <input name="responder_para" value="<?php echo $dados[responder_para] ?>" type="text" class="form-control" required>
	                      </div>
	                    </div>
	                    
	                    
	                    
	                    
	                    
                	</div>                
              	</div>


  
     
             
              
				<div class="form-actions">					
					<div class="pull-right">
						<input type="hidden" name="acao" value="editar" />
					  	<button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i>Salvar</button>
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
<!-- END PAGE -->
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script> 
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/geral.js"></script>
<script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/boostrap-form-wizard/js/jquery.bootstrap.wizard.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-inputmask/jquery.inputmask.min.js" type="text/javascript"></script>

<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/js/form_validations.js" type="text/javascript"></script>
<script src="assets/js/form_elements.js" type="text/javascript"></script>

<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->



<?php
	echo Dados::adminExibirMsg($msgSucesso, $msgErro);
?>


</body>
</html>