<?php


		if (!function_exists('verificarLoginAreaVip')) {
				function verificarLoginAreaVip($mobile=false){
				
					/*if(session_status() == PHP_SESSION_NONE) session_start();
					
					if($_SESSION[email_cliente_logado]==''){
					//não está logado	
					
						if($mobile){
							header("Location: https://www.hotboys.com.br/vip/login/index.php?red=http://m.hotboys.com.br/vip/");	
						} else {
							header("Location: https://www.hotboys.com.br/vip/login/index.php");	
						}
					
								
						exit();
					} else {
					//está logado	
						registrarAcessoPagina('Acesso');
					}*/
				}
		}
		
		
		
		
		
		
		if (!function_exists('registrarAcessoPagina')) {			
			function registrarAcessoPagina($tipo, $downloadNomeFilme=''){
				/*$gravarLog = true;
				
				
				if((REGISTROU_LOG_ACESSO!='sim' AND $tipo=='Acesso')  OR  (REGISTROU_LOG_DOWNLOAD!='sim' AND $tipo=='Download')){
					date_default_timezone_set('America/Sao_Paulo');
					$data = date("Y-m-d H:i:s");

					
					if($tipo=='Acesso'){
					//acesso
						$dados = $_SERVER[SERVER_NAME] . $_SERVER[REQUEST_URI];
						
						if(substr($dados, -11) == 'captcha.php'){
							$gravarLog = false;
							
						} else if(substr($dados, -7) == '404.php'){
							$gravarLog = false;
						}
												
					} else {
					//download	
						$dados = $downloadNomeFilme;
					}
					

					if($gravarLog){
						$queryLog = "INSERT INTO `historico_acessos_detalhado` 
						(`id`, `email`, `id_cliente`, `data`, `ip`, `tipo`, `dado`) 
							VALUES 
						(NULL, '$_SESSION[email_cliente_logado]', NULL, '$data', '$_SERVER[REMOTE_ADDR]', '$tipo', '$dados');";
						$status = @mysql_query($queryLog);	

						if(!$status){
						//erro ao inserir registro	
							require('/var/www/clients/client1/web6/web/configuracoes/configuracoes.php'); //conecta ao BD
							mysql_query($queryLog);					
						}
					}
					
					
					
					if($tipo=='Acesso'){
					//acesso	
						define(REGISTROU_LOG_ACESSO, 'sim');	
					} else {
					//download	
						define(REGISTROU_LOG_DOWNLOAD, 'sim');	
					}					
				}*/
			}
		}