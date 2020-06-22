<?php
        
		###### Verifica se está logado
		require('/var/www/clients/client1/web6/web/vip/login/includes/funcoes.php');
		verificarLoginAreaVip();
		###### Verifica se está logado
		
		
	
		
        
        require_once('includes/xajax/xajax_core/xajax.inc.php');
        $xajax = new xajax();
            require_once('includes/xajax-alterar-senha.php');
        $xajax->processRequest();
        
        $xajax->configure('javascript URI', 'includes/xajax/');
		
		
?>
<!DOCTYPE html>
<html xmlns="https://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Alteração de Senha - www.hotboys.com.br</title>


<link rel="shortcut icon" href="layout/favicon.png" />
<meta name="theme-color" content="#000">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">



<link rel="stylesheet" href="layout/login-estilo.css" type="text/css" media="all" /> 
</head>


<?php $xajax->printJavascript(); ?>

<body>



	<div id="conteudo" style="padding-top:20px; padding-bottom:20px;">
    	
        <div id="titulo">Alterar Senha</div>
    
    
    
    	<div id="formulario">
        <form name="formulario_senha" id="formulario_senha" onSubmit="xajax_alterar_senha(xajax.getFormValues('formulario_senha')); return false;" >
        	<div class="formulario-linha">
            	<div class="formulario-linha-icone"><img src="layout/login-senha.png" /></div>
                <div class="formulario-linha-campo">
                	<input type="password" class="formulario-linha-campo-input" placeholder="Digite a sua senha atual" id="senha_atual" name="senha_atual" />
                </div>
                <div class="c"></div>
            </div>
            <div class="c"></div>
            
            
            
            
            <div class="formulario-linha">
            	<div class="formulario-linha-icone"><img src="layout/login-senha.png" /></div>
                <div class="formulario-linha-campo">
                	<input type="password" class="formulario-linha-campo-input" placeholder="Digite a sua nova senha" id="senha_nova" name="senha_nova" />
                </div>
                <div class="c"></div>
            </div>
            <div class="c"></div>
            
            
            <div class="formulario-linha">
            	<div class="formulario-linha-icone"><img src="layout/login-senha.png" /></div>
                <div class="formulario-linha-campo">
                	<input type="password" class="formulario-linha-campo-input" placeholder="Repita a sua nova senha" id="senha_nova_repetir" name="senha_nova_repetir" />
                </div>
                <div class="c"></div>
            </div>
            <div class="c"></div>
            
            
            
            
            <div id="mensagem-sucesso"></div>
            <div id="mensagem-erro" <?php if($msgErro != '') echo 'style="display:block"' ?> ><?php echo $msgErro ?></div>
    
            
            
            
            
            <div class="formulario-btn-enviar">
            	<input type="hidden" name="red" value="<?php echo addslashes($_GET[red]) ?>" />
            	<input type="submit" value="ALTERAR SENHA" />
            </div> 
      	</form>       
        </div>
            
    
    
    </div>
    
  
 
<script src="js/login-jquery-1.11.1.min.js"></script>
<!--
<script>
    $(function(){
		 function ajustarCentro(){
			alturaJanela = $(window).height();
			alturaConteudo = $("#conteudo").height();
			
			$('#conteudo').css("margin-top", ((alturaJanela - alturaConteudo) / 2)+"px");	
		 }	 
		 ajustarCentro();
    }); 
</script>
-->
    
    
    
    

</body>
</html>
