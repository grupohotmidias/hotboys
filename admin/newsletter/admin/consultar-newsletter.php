<?php

		require('../configuracoes/configuracoes.php');
		require('../includes/classes/classes.php');

		
		
		if(!AdminLogin::verificar()){
		//não está logado	
			header("Location: index.php?acao=desconectado");
			exit();
		}
		
		
		
		
		
		
		
		
		if($_GET[acao]=='excluir' AND $_GET[id]>0){
			$id = Dados::input($_GET[id]);	
				
			$query = "DELETE FROM newsletter WHERE id='$id' LIMIT 1";	
			$status = mysql_query($query);	
				
			if($status){
			//sucesso	
				$msgSucesso[] = 'Excluído com sucesso';
			} else {
			//erro	
				$msgErro[] = 'Erro ao excluir';
			}
		}
		
		
		
		
		
		
		
		
		if($_GET[acao]=='cadastrou') $msgSucesso[] = 'Cadastrado com sucesso, foi enviado um e-mail teste para: '.SMTP_RESPONDER_PARA;
		if($_GET[acao]=='editou') $msgSucesso[] = 'Editado com sucesso, foi enviado um e-mail teste para: '.SMTP_RESPONDER_PARA;
		if($_GET[acao]=='erroeditar') $msgErro[] = 'Erro ao editar';
		if($_GET[msg2]=='erroupload') $msgErro[] = 'Erro ao fazer upload do(s) arquivo(s)';


		//menu aberto
		$newsletter = true;
		$newsletterConsultar = true;



?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
<meta charset="iso-8859-1" />
<title>Gerenciador<?php if(NOME_EMPRESA != '') echo ' - '.NOME_EMPRESA ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<!-- BEGIN PLUGIN CSS -->
<link href="assets/plugins/jquery-notifications/css/messenger.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-notifications/css/messenger-theme-flat.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="assets/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>
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
        <h3>Consultar - <span class="semi-bold">Newsletter</span></h3>
      </div>
      
      
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            
            <div class="grid-body ">
              
              
              
			
			
			<table class="table table-striped" id="example3" >
                <thead>
                  <tr>      
                  		<th>Data</th>                  		
                  		<th>Assunto</th>    
                  		<th>Status de Envio</th>
                  		<th>E-mails lidos</th>                 		
                    	<th id="ColAcao" style="width:120px;">Ação</th>
                  </tr>
                </thead>
                <tbody>
                 
                 
<?php
		$query = "SELECT * FROM `newsletter` order by data DESC";
		$consulta = mysql_query($query);
		while($linha = mysql_fetch_array($consulta)){
			
			$data = substr($linha[data], 8, 2).'/'.substr($linha[data], 5, 2).'/'.substr($linha[data], 0, 4);	
			
			
			//consulta total de emails p/ a newsletter
			$queryTotalEmails = "SELECT * FROM `newsletter_emails` WHERE id_newsletter='$linha[id]'";
			$consultaTotalEmails = mysql_query($queryTotalEmails);
			$totalEmails = mysql_num_rows($consultaTotalEmails);
			
			//consulta quantos emails já foram enviados
			$queryTotalEmailsEnviados = "SELECT * FROM `newsletter_emails` WHERE id_newsletter='$linha[id]' AND status='Enviado'";
			$consultaTotalEmailsEnviados = mysql_query($queryTotalEmailsEnviados);
			$totalEmailsEnviados = mysql_num_rows($consultaTotalEmailsEnviados);
			
			$porcentagemEnvio = round((100 * $totalEmailsEnviados) / $totalEmails);
			
			
			
			
			
			//consulta total de e-mails lidos		
			$queryTotalEmailsLidos = "SELECT * FROM `newsletter_emails` WHERE id_newsletter='$linha[id]' AND abriu_email='Sim'";
			$consultaTotalEmailsLidos = mysql_query($queryTotalEmailsLidos);
			$totalEmailsLidos = mysql_num_rows($consultaTotalEmailsLidos);
			
			$porcentagemLidos = round((100 * $totalEmailsLidos) / $totalEmails);
			
						
?>

                  <tr>                
                  	<td><?php echo $data ?></td>                  	
                  	<td><?php echo $linha[assunto] ?></td> 
                  	
                  	<td><?php echo $porcentagemEnvio ?>% (Total: <?php echo $totalEmails ?> e-mails)</td> 
                  	<td><?php echo $porcentagemLidos ?>% (<?php echo $totalEmailsLidos ?> e-mails abertos)</td> 
                  	
                  
                    <td class="center">                    	
                    	<a href="cadastrar-newsletter.php?acao=editar&id=<?php echo $linha[id] ?>">
                    		<i class="fa fa-pencil"></i>
                    	</a>
                    	&nbsp;&nbsp;
                    	<a onclick="return excluir(); return false;" href="consultar-newsletter.php?acao=excluir&id=<?php echo $linha[id] ?>">
                    		<i class="fa fa-trash-o"></i>
                    	</a>                    	
                    </td>
                  </tr>

<?php
		}
?>                  
                  
                 
                </tbody>
              </table>
			
			
			
			
              
              
            </div>
          </div>
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
<script src="assets/plugins/jquery-notifications/js/messenger.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-notifications/js/messenger-theme-future.js" type="text/javascript"></script>
<script type="text/javascript" src="assets/js/geral.js"></script>
<!-- END CORE JS FRAMEWORK -->
<!-- BEGIN PAGE LEVEL JS -->
<script src="assets/plugins/jquery-scrollbar/jquery.scrollbar.min.js" type="text/javascript"></script>    
<script src="assets/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
<script src="assets/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
<script src="assets/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
<script src="assets/plugins/jquery-datatable/extra/js/dataTables.tableTools.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/datatables.responsive.js"></script>
<script type="text/javascript" src="assets/plugins/datatables-responsive/js/lodash.min.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="assets/js/datatables.js" type="text/javascript"></script>
<!-- BEGIN CORE TEMPLATE JS -->
<script src="assets/js/core.js" type="text/javascript"></script>
<script src="assets/js/chat.js" type="text/javascript"></script>
<script src="assets/js/demo.js" type="text/javascript"></script>
<!-- END CORE TEMPLATE JS -->
<!-- END JAVASCRIPTS -->

<?php
	echo Dados::adminExibirMsg($msgSucesso, $msgErro);
?>


</body>
</html>