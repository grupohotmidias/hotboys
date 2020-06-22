<?php

		require('../configuracoes/configuracoes.php');
		require('../includes/classes/classes.php');

		
		
		if(!AdminLogin::verificar()){
		//não está logado	
			header("Location: index.php?acao=desconectado");
			exit();
		}




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
<link href="assets/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="">

<!-- BEGIN CONTAINER -->
<div class="page-container row-fluid">
  


	<?php require('includes/menu.php') ?>




  <!-- BEGIN PAGE CONTAINER-->
  <div class="page-content">    
    <div class="content">
      
      
      <div class="page-title"> 
        <h3>Sistema - <span class="semi-bold">Início</span></h3>
      </div>
      
      
     
      <div class="row">
      	
      	
        <div class="col-md-4 single-colored-widget">
          <div class="content-wrapper red">
            <h3 class="text-white"><i class="fa fa-tasks fa" id="animate-icon"></i> <span class="semi-bold">Newsletters</span></h3>
            <p>Consulte as newsletters enviadas</p>
            <div class="pull-left">
              <a href="consultar-newsletter.php" class="btn btn-white btn-cons">Consultar</a>
            </div>
            <div class="pull-right">  </div>
            <div class="clearfix"></div>
          </div>          
        </div>
        
        
        
        
        
        <div class="col-md-4 single-colored-widget">
          <div class="content-wrapper green">
            <h3 class="text-white"><i class="fa fa-tasks fa" id="animate-icon"></i> <span class="semi-bold">Configurações</span></h3>
            <p>Altere as configurações de envio</p>
            <div class="pull-left">
              <a href="configuracoes.php" class="btn btn-white btn-cons">Alterar</a>
            </div>
            <div class="pull-right">  </div>
            <div class="clearfix"></div>
          </div>          
        </div>
        
       
        
        
        
    </div>
    
  </div>


  
</div>
<!-- END CONTAINER -->
<!-- BEGIN CORE JS FRAMEWORK-->
<script src="assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
<script src="assets/plugins/boostrapv3/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/plugins/breakpoints.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/pace/pace.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>
<script src="assets/plugins/modernizr.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script> 
<script src="assets/plugins/boostrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- PAGE JS -->
<script src="assets/js/icon.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script> 
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->
</body>
</html>
