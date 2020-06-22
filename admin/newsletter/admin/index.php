<?php	
		
	require('../configuracoes/configuracoes.php');	
	require('../includes/classes/classes.php');	
		
		
		
		
		
		
	if($_GET[acao]=='logoff'){		
		//desconectar			
		AdminLogin::desconectar();					
	}	
		
		
		
		
		
	if(AdminLogin::verificar()){		
		//está logado			
		header("Location: inicio.php");		
		exit();		
	}	
		
		
		
		
		
		
	if($_GET[acao]=='desconectado') $msgErro[] = 'Você não está conectado!<Br>Faça o login.';			
	if($_GET[acao]=='logoff') $msgSucesso[] = 'Você foi desconectado.';	
		
		
		
		
		
		
	require_once('../includes/xajax/xajax_core/xajax.inc.php');	
	$xajax = new xajax();			
	require_once('includes/xajax-login.php');	
	$xajax->processRequest();	
		
		
	$xajax->configure('javascript URI',  URL.'includes/xajax/');	
		
		
		
?>
<!DOCTYPE html>
<html>	
	<head>		
		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />		
		<meta charset="iso-8859-1" />		
		<title>Gerenciador<?php if(NOME_EMPRESA != '') echo ' - '.NOME_EMPRESA ?></title>		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />		
		<!-- BEGIN CORE CSS FRAMEWORK -->		
		<link href="assets/plugins/pace/pace-theme-flash.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css" media="screen"/>		
		<link href="assets/plugins/jquery-notifications/css/messenger.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css" media="screen"/>		
		<link href="assets/plugins/jquery-notifications/css/messenger-theme-flat.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css" media="screen"/>		
		<link href="assets/plugins/boostrapv3/css/bootstrap.min.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<link href="assets/plugins/boostrapv3/css/bootstrap-theme.min.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<link href="assets/plugins/font-awesome/css/font-awesome.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<link href="assets/css/animate.min.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<!-- END CORE CSS FRAMEWORK -->		
		<!-- BEGIN CSS TEMPLATE -->		
		<link href="assets/css/style.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<link href="assets/css/responsive.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<link href="assets/css/custom-icon-set.css?v=<?php echo Version; ?>" rel="stylesheet" type="text/css"/>		
		<!-- END CSS TEMPLATE -->		
				
				
		<?php $xajax->printJavascript(); ?>		
				
	</head>	
	<!-- END HEAD -->	
	<!-- BEGIN BODY -->	
	<body class="error-body no-top lazy"  data-original="assets/img/fundo-login-email1.jpg"  style="background-image: url('assets/img/fundo-login-email1.jpg'); background-repeat: no-repeat; background-size: 100%;"> 		
		<div class="container">			
			<div class="row login-container animated fadeInUp">  							
				<div class="col-md-7 col-md-offset-2 tiles white no-padding">										<!-- Logo topo -->				<div id="logo-login">					<a href="https://www.hotboys.com.br" ><img src="assets/img/logo-topo-news.png" /></a>				</div>								<!-- titulo abaixo da logo -->
					<div class="p-t-20 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10 titulo-login"> 
						<p>Informe usuário e senha para acessar o sistema.<br></p>					</div>					
					<div class="tiles grey p-t-20 p-b-20 text-black">						
						<form id="frm_login" name="frm_login" class="animated fadeIn" onSubmit="xajax_login(xajax.getFormValues('frm_login')); return false;" >    							
														
							<div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">								
								<div class="col-md-6 col-sm-6 ">									
									<input name="usuario" type="text" class="form-control" placeholder="Usuário">									
								</div>								
								<div class="col-md-6 col-sm-6">									
									<input name="senha" type="password"  class="form-control" placeholder="Senha">									
								</div>								
							</div>							
														
							<div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">								
								<div class="control-group  col-md-10">									
									<div class="checkbox">										
										<input type="checkbox" name="manterConectado" id="manterConectado" value="true">										
										<label for="manterConectado">Manter conectado</label>										
									</div>									
								</div>								
							</div>							
														
														
							<div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">								
								<div class="control-group  col-md-10">									
									<button type="submit" class="btn btn-primary btn-cons"><i class="fa fa-lock"></i>&nbsp;&nbsp;&nbsp;Acessar</button>									
								</div>								
							</div>							
														
						</form>						
												
					</div>   					
				</div>   				
			</div>			
		</div>		
		<!-- END CONTAINER -->		
				
				
				
				
				
		<!-- BEGIN CORE JS FRAMEWORK-->		
		<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>		
		<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>		
		<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>		
		<script src="assets/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>		
		<script src="assets/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>		
		<script type="text/javascript" src="assets/js/geral.js"></script>		
		<script src="assets/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>		
		<script src="assets/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>		
		<script src="assets/js/login_v2.js" type="text/javascript"></script>		
		<!-- BEGIN CORE TEMPLATE JS -->		
		<!-- END CORE TEMPLATE JS -->		
				
				
				
		<?php			
			echo Dados::adminExibirMsg($msgSucesso, $msgErro);			
		?>		
				
				
				
				
	</body>	
		
</html>