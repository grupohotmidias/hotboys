<?php



		/*
		 * Classe p/ login no administrador
		 */
		class AdminLogin{
			
			/*
			 * Verifica se dados estão corretos.
			 * retorno: true / false
			 */
			public static function login($usuario, $senha, $manterConectado){
				
				$query = "SELECT * FROM `administradores` WHERE login='$usuario' AND senha='$senha'";
				$consulta = mysql_query($query);
				$total = mysql_num_rows($consulta);
				
				if($total == 1){
				//dados corretos	
					$dados = mysql_fetch_array($consulta);
										
					//session de login
					$_SESSION[idAdmin] = $dados[id];
				
					
					#####manter usuário conectado após fechar navegador
					if($manterConectado){
						
						$cookie = time().'_'.rand(0, 100000);
						
						$query = "INSERT INTO `administradores_cookies` (
						`id` ,
						`id_administrador` ,
						`cookie` ,
						`data`
						) VALUES (
						NULL, '$dados[id]', '$cookie', NOW())";
						mysql_query($query);
						
						
						setcookie("manterConectado", $cookie, time()+(3600*24*30*12)); //1 ano de validade
					}
					
					
					return true;
					
				} else {
				//dados errados	
					return false;
					
				}				
			}			
			
			
			
			
			
			
			/*
			 * Verifica se está logado
			 * retorno: true / false
			 */
			public static function verificar(){
				
				$query = "SELECT * FROM `administradores` WHERE id='$_SESSION[idAdmin]'";
				$consulta = mysql_query($query);
				$total = mysql_num_rows($consulta);
				
				if($total == 1){
				//logado	
					return true;
				
				} else {
				//não logado
				
					#####Verifica se possue cookie, caso tiver cria session de login
					if($_COOKIE[manterConectado] != ''){
						
						$queryCookie = "SELECT * FROM `administradores_cookies` WHERE cookie='$_COOKIE[manterConectado]'";
						$consultaCookie = mysql_query($queryCookie);
						$totalCookie = mysql_num_rows($consultaCookie);
						
						if($totalCookie==1){
						//cookie correto	
							
							$dados = mysql_fetch_array($consultaCookie);
							
							//session de login
							$_SESSION[idAdmin] = $dados[id_administrador];
							return true;
														
						} else {
						//erro com cookie							
							setcookie('manterConectado', null, time()-3600);
							return false;
						}
					}
				
				
					
					return false;
					
				}
			}
			
			
			
			
			
			
			
			/*
			 * Retorna o nome do usuário ligado
			 */ 
			public static function nomeUsuario(){
				
				$query = "SELECT * FROM `administradores` WHERE id='$_SESSION[idAdmin]'";
				$consulta = mysql_query($query);
				$dados = mysql_fetch_array($consulta);
				
				return ucfirst($dados[login]);
			}
			
			
			
			
			
			
			
			
			/*
			 * Alterar a senha
			 */ 
			public static function alterarSenha($idAdmin, $novaSenha){
				
				$query = "UPDATE `administradores` SET `senha`='$novaSenha' WHERE `id`='$idAdmin' LIMIT 1";
				return mysql_query($query);
				
			}
			
			
			
			
			
			
			
			
			/*
			 * Faz logoff, e exclui cookie p/ permanecer conectado
			 */
			public static function desconectar(){
				
				//remove cookie caso houver
				$queryCookie = "DELETE FROM administradores_cookies WHERE id_administrador='$_SESSION[idAdmin]' AND cookie='$_COOKIE[manterConectado]' ";
				mysql_query($queryCookie);
				
				unset($_SESSION[idAdmin]);		
			}
			
			
			
			
			
			
			
			
		}
