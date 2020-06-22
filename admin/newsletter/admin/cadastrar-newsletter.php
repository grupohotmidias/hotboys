<?php

		set_time_limit(0);


		require('../configuracoes/configuracoes.php');
		require('../includes/classes/classes.php');
		require('../includes/funcoes.php');

		
		
		if(!AdminLogin::verificar()){
		//não está logado	
			header("Location: index.php?acao=desconectado");
			exit();
		}






	
		
		//cadastrar novo item
		if($_POST[acao]=='cadastrar'){
			
			$assunto = 	Dados::input($_POST[assunto]);			
			$mensagem = Dados::input($_POST[mensagem]);
		
			
			$query = "INSERT INTO `newsletter` 
			(`id`, `data`, `assunto`, `mensagem`) 
			VALUES 
			(NULL, NOW(), '$assunto', '$mensagem');";
			$status = mysql_query($query);
			$idNewsletter = mysql_insert_id();
			
			if($status){
			//sucesso	
					
				//faz a importação de e-mails
				importarEmails($idNewsletter, $conexaoRemota);	
					
					
				//envia e-mail de teste para o admin
				enviarMensagem($idNewsletter, SMTP_RESPONDER_PARA);
						
							
				header("Location: consultar-newsletter.php?acao=cadastrou");
				exit();
				
			} else {
			//erro	
				$msgErro[] = 'Erro ao cadastrar a newsletter, tente novamente.';								
			}
		}
		
		
		
		
		
		
		
		
		
		//editar item
		if($_POST[acao]=='editar'){
					
			$id = Dados::input($_GET[id]);	
		
			$assunto = 	Dados::input($_POST[assunto]);			
			$mensagem = Dados::input($_POST[mensagem]);
			
							
			$query = "UPDATE `newsletter` SET 			
			`assunto` = '$assunto', 
			`mensagem` = '$mensagem' 
			WHERE `id`='$id' LIMIT 1";
			$status = mysql_query($query);	
			
			if($status){
			//sucesso	
						
				//envia e-mail de teste para o admin
				enviarMensagem($id, SMTP_RESPONDER_PARA);
						
						
				header("Location: consultar-newsletter.php?acao=editou");										
				exit();
				
			} else {
			//erro	
				$msgErro[] = 'Erro ao editar, tente novamente.';						
			}
		}
		
		
		
		
		
		
		
		
		
		//puxa os dados de algum item
		if($_GET[acao]=='editar' AND $_GET[id]>0){
			
			$id = Dados::input($_GET[id]);			
				
			$query = "SELECT * FROM `newsletter` WHERE id='$id'";
			$consulta = mysql_query($query);
			$total = mysql_num_rows($consulta);	

			
			if($total != 1){
			//erro	
				header("Location: consultar-newsletter.php?acao=erroeditar");
				exit();
			} else {
				$dados = mysql_fetch_array($consulta);
			}
			
		}




		
		if($dados[tipo]=='') $dados[tipo] = 'PJ';






		

		//recupera os dados digitados ou do BD		
		$dados[assunto] = 	Dados::preencherDados($_POST[assunto], $dados[assunto]);		
		$dados[mensagem] = 	Dados::preencherDados($_POST[mensagem], $dados[mensagem]);

		
		
		
		
		
		//menu aberto
		$newsletter = true;
		$newsletterCadastrar = true;
		
		
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


<script src="assets/js/tinymce/tinymce.min.js"></script>
<script>	
	tinymce.init({
	 	selector: 'textarea',
	 	language : 'pt_BR',
	  	theme: 'modern',
	  	plugins: [
		    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
		    'searchreplace wordcount visualblocks visualchars code fullscreen',
		    'insertdatetime media nonbreaking save table contextmenu directionality',
		    'emoticons template paste textcolor colorpicker textpattern imagetools'
	  	],
	  	toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
	  	toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect',
	  	image_advtab: true,
	  	file_browser_callback: function(field_name, url, type, win) {
            if(type=='image') $('#my_form input').click();
       },
		relative_urls : false,
		remove_script_host : false,
		convert_urls : true,   
	 });
</script>

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
        <h3>Cadastrar - <span class="semi-bold">Newsletter</span></h3>
      </div>  
       
      <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            
            
            <form class="form-no-horizontal-spacing" id="form" method="POST" enctype="multipart/form-data">	
            
            
            <div class="grid-body">
			  
              	<div class="row column-seperation">
                	<div class="col-md-12">
                                       
                                       
                        
	                    <div class="row form-row">	                      
	                      <div class="col-md-6">
	                      	<label class="form-label">Assunto: <strong>*</strong></label>
	                        <input name="assunto" value="<?php echo $dados[assunto] ?>" type="text" class="form-control" required>
	                      </div>	         
	                    </div>
	                    
	                    
	                    
	                    
	                    
	                    
	                    
	                    <div class="row form-row">	                      
	                      <div class="col-md-12">
	                      	<label class="form-label">Mensagem: <strong>*</strong>
	                      		<br>
	                      		<span style="font-weight:normal; font-size:10px;">Tags disponíveis:<br>
	                      		{NOME} | {EMAIL}</span>
	                      	</label>
	                      	<textarea class="form-control" style="height:400px;" name="mensagem"><?php echo $dados[mensagem] ?></textarea>
	                      </div>	
	                                           
	                    </div>
	                    
	                    
	                    
	            <div class="form-actions">					
					<div class="pull-left">
						<input type="hidden" name="acao" value="<?php if($_GET[acao]=='editar') echo 'editar'; else echo 'cadastrar' ?>" />
					  	<button class="btn btn-danger btn-cons" type="submit"><i class="icon-ok"></i>Salvar</button>
					  	
					  	<br>
					  	OBS: Ao cadastrar uma nova newsletter o processo de importação de e-mails pode levar alguns minutos.<br>
					  	Não fecha a janela antes do processo ser finalizado.
					</div>
				</div>
	                    
	                    
			
            </div>
            
            </div>
          
        </div>
        
        
        
        </form>
        
        
        
        
        <iframe id="form_target" name="form_target" style="display:none"></iframe>
		<form id="my_form" action="tinymce-upload.php" target="form_target" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
			<input name="image" type="file" onchange="$('#my_form').submit();this.value='';">
		</form>
        
        
        
        
        
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

<script src="assets/js/form_validations.js" type="text/javascript"></script>
<script src="assets/js/form_elements.js" type="text/javascript"></script>

<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>




<script>
	function tipo_pessoa(tipo){
		
		$("#dados-pj").hide();
		$("#dados-pf").hide();		
		
		if(tipo == 'PF'){
		//pessoa fisica	
			$("#dados-pf").show("slow");
			
		} else {
		//pessoa juridica	
			$("#dados-pj").show("slow");
			
		}
		
		
		
		$('#form').validate({});	
		
		
		
		
	}
	
	
	tipo_pessoa('<?php echo $dados[tipo] ?>');
</script>








<?php
	echo Dados::adminExibirMsg($msgSucesso, $msgErro);
?>


</body>
</html>