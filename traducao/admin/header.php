<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Gerenciador de Traduções</title>
	<link href="style.css" rel="stylesheet" media="all" />
    <style type="text/css" media="screen">
    @import "css/media/css/demo_table.css";
    </style>
    
	<link href="" rel="stylesheet" title="style" media="all" />
	<script type="text/javascript" src="js/jquery-1.3.2.js"></script>
	<script type="text/javascript" src="js/superfish.js"></script>
	<script type="text/javascript" src="js/jquery-ui-1.7.2.js"></script>
	<script type="text/javascript" src="js/tooltip.js"></script>
	<script type="text/javascript" src="js/tablesorter.js"></script>
	<script type="text/javascript" src="js/tablesorter-pager.js"></script>
	<script type="text/javascript" src="js/cookie.js"></script>
	<script type="text/javascript" src="js/custom.js"></script>
    
    <script type="text/javascript" src="js/jquery.validate.js"></script>
    
    
    <script type="text/javascript" src="js/jquery.alphanumeric.js"></script>
    
    
    <script src="js/jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="js/jquery.dataTables.columnFilter.js" type="text/javascript"></script>

	<script src="js/jquery.maskedinput.js" type="text/javascript"></script>
    <script src="js/jquery.price_format.js" type="text/javascript"></script>

<script>
jQuery(function($){
   $(".data").mask("99/99/9999");
});
</script>	
    
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
<script>
  $(document).ready(function(){
    $("#form").validate();
  }); 
</script>


<script>                               
		$(function(){
			$('.valor').priceFormat({
				prefix: '',
				thousandsSeparator: '.',
				centsSeparator: ',', 
				prefix: 'R$ '
			}); 
		});
</script>



</head>
<body>

<div id="tudo">
	<div id="header">
		<div id="top-menu">
			<a href="alterar-senha.php" title="Alterar Senha">Alterar Senha</a> |
			
			
			<span>Você está logado como <?php echo $_SESSION[login] ?> | <a href="logoff.php">Sair</a></span>
		</div>
	  <div id="sitename">
		<a href="index.php" class="logo float-left">GERENCIADOR DE TRADUÇÔES</a></div>
		<ul id="navigation" class="sf-navbar">
			<li>
				<a href="index.php">Início</a>				
			</li>
            
			
            
			
			<li>
            	<a href="traduzir.php">Traduzir</a>
            </li>
			
			
			
			
            
           
		</ul>
	</div>