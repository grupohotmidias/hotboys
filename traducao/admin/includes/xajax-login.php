<?php


		



		function login($usuario, $senha){
			
			$resposta = new xajaxResponse();
				
			$usuario = addslashes($usuario);
			$senha = addslashes($senha);
			
			
			$query = "SELECT * FROM `administradores` WHERE login='$usuario' AND senha='$senha'";
			$consulta = mysql_query($query);
			$total = mysql_num_rows($consulta);
			
			if($total==1){
			//login correto	
				
				$dados = mysql_fetch_array($consulta);
								
				$_SESSION[login] = $dados[login];
				
				
				$resposta->addScript('window.location = "inicio.php";');
				
				
			} else {
			//erro	
			
				$saida = '<div class="response-msg errorLogin ui-corner-all">
					<span>Erro</span>
					Usuário ou senha incorretos!
				</div>';
			
				$resposta->addAssign("mensagemLogin", "innerHTML", utf8_encode($saida));
				
			}
			
			

			return $resposta->getXML();
			
		}
		
		
		
		
		


					
					

		$xajax->registerFunction("login");	
		
		
		
		