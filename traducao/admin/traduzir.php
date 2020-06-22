<?php

		session_start();
		require('../configuracoes/configuracoes.php');
		require('includes/class.formularios.php');
		require('includes/class.alertas.php');
		require('includes/funcoes.php');
		
		
		
		validar_usuario();
		
		
		$form = new form();
		$alertas = new alertas();
		
		
		/*
		 *  MENSAGENS:
		 * 	$msg_erro[]
			$msg_noticia[]
			$msg_informacao[]
			$msg_sucesso[]
		 * 
		 */
		
		
		
		
		
		
		//editar item
		if($_POST[acao]=='editar'){
				
				
				
			foreach($_POST as $var => $valor){
				
				if(substr($var, 0, 12)=='traducao_us_'){
					$id = substr($var, 12);
					$valor = addslashes($valor);
					
					$query_update = "UPDATE `traducoes` SET `traducao_us`='$valor' WHERE `id`='$id' ";
					mysql_query($query_update);
					
				}
			}
			
				
			$msg_sucesso[] = 'Sucesso ao editar!';		
		}



		
?>


<?php include('header.php'); ?>
	
	
	
	
	<div id="page-wrapper">
    
    
		<div id="main-wrapper">        
			<div id="main-content">            
            

                
                <div class="other-box gray-box ui-corner-all">
					<div class="cont ui-corner-all">
						<h3>Traduzir</h3>						
					</div>
				</div>
                
                
                <?php echo $alertas->exibir($msg_erro, $msg_noticia, $msg_informacao, $msg_sucesso); ?>
                
            
            
            	<div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header"><span class="ui-icon ui-icon-circle-arrow-s"></span>CADASTRAR TRADUÇÔES</div>
					<div class="portlet-content">
						<form action="#" method="post" enctype="multipart/form-data" class="forms" name="form" id="form">
							<ul>
								
                                
                                
                                
                               
                                
                                 <li>
                                
                                      <div class="hastable">              
                                      <table cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <td>Cód</td>
                                                    <td>Arquivo</td>
                                                    <td>Português</td>
                                                    <td>Inglês</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               
                                               
 
<?php
 		$query_palavras = "SELECT * FROM `traducoes` order by arquivo ASC, id ASC";
		$consulta_palavras = mysql_query($query_palavras);
		
		$contador = 0;
		while($linha = mysql_fetch_array($consulta_palavras)){
?>                                               
                                                <tr <?php if($contador==1) echo 'class="alt"' ?> >  
                                                	<td>
                                                      <?php echo $linha[id] ?>
                                                    </td>
                                                    <td>
                                                      <?php echo $linha[arquivo] ?>
                                                    </td>
                                                    <td>
                                                    	<textarea style="width:400px; height:60px;" onclick="select()" name="traducao_pt_<?php echo $linha[id] ?>" ><?php echo $linha[traducao_pt] ?></textarea>                                                      
                                                    </td>
                                                    <td>
                                                        <textarea style="width:400px; height:60px;" onclick="select()"name="traducao_us_<?php echo $linha[id] ?>" ><?php echo $linha[traducao_us] ?></textarea> 
                                                    </td>								
                                                </tr>
<?php
			if($contador==1){
				$contador = 0;
			} else {
				$contador = 1; 
			}
		}
?>                                                
                                              
                                                
                                            </tbody>
                                        </table>
                                        </div>
                                
                                </li>
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
                                
								<li class="buttons">
                                	<input type="hidden" name="acao" value="editar" />
									<input name="Cadastrar Cliente" type="submit" class="submit" value="Cadastrar">
								</li>
						  </ul>
						</form>
					</div>
				</div>
            
                      
            </div>
			<div class="clearfix"></div>
		</div>
		
		
		
		
		
		
		
		
		
		
		<?php require('includes/menu-atendimentos.php') ?>
		
		
		
		
		
		
		<div style="clear:both; height:100px;"></div>

	</div>
	
    
   
<?php include('footer.php'); ?>
</body>
</html>