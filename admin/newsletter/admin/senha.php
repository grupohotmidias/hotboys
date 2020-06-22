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
				
			if($_POST[senha] != $_POST[confirmar_senha]){
				$msgErro[] = 'Erro<br>As duas senhas precisam ser iguais!';	
				
			} else {
				$status = AdminLogin::alterarSenha($_SESSION[idAdmin], $_POST[senha]);
				
				if($status){
				//sucesso
					$msgSucesso[] = 'Senha alterada com sucesso!';
					
				} else {
				//erro	
					$msgErro[] = 'Erro ao editar';						
				}				
			}
		}
		
		
		
		

		
		
		
		//menu aberto
		$configuracoes = true;
		$configuracoesSenha = true;
		

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
        <h3>Configurações - <span class="semi-bold">Senha</span></h3>
      </div>  
       
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            
            <div class="grid-body">
			<form class="form-no-horizontal-spacing" id="form" name="form" method="POST" enctype="multipart/form-data">	
              	<div class="row column-seperation">
                	<div class="col-md-12">
                                           
	                    <div class="row form-row">
	                      <div class="col-md-5">
	                      	<label class="form-label">Nova senha: <strong>*</strong></label>
	                        <input name="senha" value="<?php echo $dados[nome] ?>" type="password" class="form-control" required>
	                      </div>
	                      
	                      <div class="col-md-5">
	                      	<label class="form-label">Confirme a nova senha: <strong>*</strong></label>
	                        <input name="confirmar_senha" value="<?php echo $dados[nome] ?>" type="password" class="form-control" required>
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