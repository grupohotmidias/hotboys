
		


	<div class="page-sidebar" id="main-menu">
		
		<div id="menu-logo">
			<a href="index.php"><img src="assets/img/logo_menu.png" border="0"></a>
		</div>

		
    <!-- BEGIN MINI-PROFILE -->
    <div class="page-sidebar-wrapper scrollbar-dynamic" id="main-menu-wrapper">
      <div class="user-info-wrapper">
       
		<div class="user-info">
          <div class="greeting">Bem-vindo <?php echo AdminLogin::nomeUsuario() ?></div>
          
          <div class="status"><?php echo NOME_EMPRESA ?></div>
        </div>
      </div>
      <!-- END MINI-PROFILE -->
      <!-- BEGIN SIDEBAR MENU -->
      
      <ul>
      	
      	
      	
      	
		
		
		
		<li <?php if($newsletter) echo 'class="active open"' ?>> 
        	<a href="javascript:;"> 
        		<i class="fa fa-folder-open"></i> 
        		<span class="title">Newsletter</span> 
        		<span class="arrow "></span>
        	</a>
        	
	       	<ul class="sub-menu">
	       		
	       		<li <?php if($newsletterCadastrar) echo 'class="active open"' ?>><a href="cadastrar-newsletter.php">Cadastrar</a></li>
	            <li <?php if($newsletterConsultar) echo 'class="active open"' ?>><a href="consultar-newsletter.php">Consultar</a></li>
	           
	     	</ul>
        </li>
        
        
        
        
		
		
		
        
        
        
        <li <?php if($configuracoes) echo 'class="active open"' ?>> 
        	<a href="javascript:;"> 
        		<i class="fa fa-folder-open"></i> 
        		<span class="title">Configurações</span> 
        		<span class="arrow "></span>
        	</a>
        	
        	
	       	<ul class="sub-menu">
	       		<li <?php if($configuracoesConfig) echo 'class="active open"' ?>><a href="configuracoes.php">Configurações</a></li>
	            <li <?php if($configuracoesSenha) echo 'class="active open"' ?>><a href="senha.php">Alterar Senha</a></li>
	     	</ul>
        </li>
        
        
        
        
        
      </ul>
      
      <div class="clearfix"></div>
      <!-- END SIDEBAR MENU -->
    </div>
  </div>
  



	
   <div class="footer-widget">    
    <div class="pull-right">
      <div class="details-status"><a href="<?php echo URL ?>" target="_blank"><?php echo NOME_EMPRESA ?></a></div>
      <a href="index.php?acao=logoff"><i class="fa fa-power-off"></i></a></div>
  </div>



