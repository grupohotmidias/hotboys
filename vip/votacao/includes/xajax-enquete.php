<?php




		function votar($vars){					

			$resposta = new xajaxResponse();					
		
			$emailUsuario = $_SESSION['email_cliente_logado'];

			//consulta ID do usuario
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/1/webservice/info-usuario.php?email='.$emailUsuario);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

            $retorno = curl_exec($ch);
            curl_close($ch);
            $retorno = json_decode($retorno);
            $idUsuario = $retorno->id_usuario;

			if(count($vars) > 0){
				foreach($vars as $variavel => $valor){
					$idEnquete = str_replace('enquete_', '', $variavel);
					
					$ip = $_SERVER[REMOTE_ADDR];
					
					$queryVoto = "INSERT INTO `enquetes_votos` 
					(`id`, `id_enquete`, `id_alternativa`, `data`, `id_usuario_gpagamentos`, `email_login`, `ip`) 
					VALUES 
					(NULL, '$idEnquete', '$valor', NOW(), '$idUsuario', '$emailUsuario', '$ip');";
					mysql_query($queryVoto);
					
					$registrouVoto = true;
				}
			}	
				
				
			
			
			if($registrouVoto){
                $resposta->alert(utf8_encode('Seu voto foi registrado!'));

                //consulta todas enquetes ativas e que deve mostrar o resultado
                $queryEnquetes = "SELECT * FROM enquetes WHERE status='Ativo' AND exibir_resultado='Sim' order by id ASC";
                $consultaEnquetes = mysql_query($queryEnquetes);
                $totalEnquetes = mysql_num_rows($consultaEnquetes);

                if($totalEnquetes){
                //precisa mostrar o resultado de alguma enquete
                    $resposta->script("location.href='https://www.hotboys.com.br/vip/resultado-votacao'");

                } else {
                //não deve mostrar o resultado de nenhuma enquete
                    $resposta->script("location.href='https://www.hotboys.com.br/vip/'");
                }

			} else {
				$resposta->alert(utf8_encode('Selecione uma alternativa!'));
				
			}
			
			
			
			
   			return $resposta;
		}





		
		$xajax->register(XAJAX_FUNCTION, 'votar');
		
		
		
		
		