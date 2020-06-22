<?php
		session_start();
		require('../configuracoes/configuracoes.php');
		require('includes/funcoes.php');


		if($_SESSION[login]!=''){
			header("Location: inicio.php");
			exit();
		}




		require_once('includes/xajax/xajax.inc.php');
		$xajax = new xajax();
			require_once('includes/xajax-login.php');
		$xajax->processRequests();


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Central de Administração</title>
	<link href="style.css" rel="stylesheet" media="all" />
	<link href="" rel="stylesheet" title="style" media="all" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.2.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
	<!--[if IE 6]>
	<link href="css/ie6.css" rel="stylesheet" media="all" />
	
	<script src="js/pngfix.js"></script>
	<script>
	  /* EXAMPLE */
	  DD_belatedPNG.fix('.logo, .other ul#dashboard-buttons li a');

	</script>
	<![endif]-->
	<!--[if IE 7]>
	<link href="css/ie7.css" rel="stylesheet" media="all" />
	<![endif]-->
	
	
<?php $xajax->printJavascript('includes/xajax/'); ?>	
</head>
<body>
	<div id="welcome_login" title="Bem vindo ao Administrador">
		<p>Informe seu nome de usuário e senha para acessar o sistema.</p>
		
        
        <div id="mensagemLogin"></div>
		
        
		<form action="#" method="post" enctype="multipart/form-data" class="forms" name="form" >
			<ul>
				<li>
					<label for="email" class="desc">

						Nome de Usuário:
					</label>
					<div>
						<input type="text" tabindex="1" maxlength="255" value="" class="field text fulllogin" name="usuario" id="usuario" />
					</div>
				</li>
				<li>
					<label for="password" class="desc">
						Senha:
					</label>

					<div>
						<input type="password" tabindex="1" maxlength="255" value="" class="field text fulllogin" name="senha" id="senha" />
					</div>
				</li>
			</ul>
		</form>
	</div>
    
<style>
.ocultarBtnFechar{
	display:none;	
}
</style>    
    
</body>
</html>