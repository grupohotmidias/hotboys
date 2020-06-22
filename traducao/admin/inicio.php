<?php
		session_start();
		require('../configuracoes/configuracoes.php');
		require('includes/funcoes.php');
		
		
		
		validar_usuario();



?>

<?php include('header.php'); ?>
	
	<div id="page-wrapper">
    
    
		<div id="main-wrapper">
        
			<div id="main-content">
				
				
			  <div class="page-title ui-widget-content ui-corner-all">
					<h1>Menu Principal</h1>
					<div class="other">

						<ul id="dashboard-buttons">
							
                            
                            <li>
								<a href="traduzir.php" class="Box_content tooltip" title="Traduzir">Traduzir</a>
							</li>
							
							
                            
							
						</ul>
						<div class="clearfix"></div>
					</div>
					

				</div>
				
                
                
                
			</div>
			<div class="clearfix"></div>
		</div>

		<div style="clear:both; height:100px;"></div>
	</div>
	
    
    
<?php include('footer.php'); ?>



</body>
</html>