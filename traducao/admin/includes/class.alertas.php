<?php


		class alertas{
			
			
			
			
			//exibe erros, alertas, informações e mensagens de sucesso
			function exibir($erros, $noticias, $informacoes, $sucessos){
				
				
				if(count($erros) > 0){
					
					$html = '<div class="response-msg msgerror ui-corner-all">
					<span>ERRO</span>
					<ul>';
					
						foreach($erros as $erro){
							$html .= '<li>'.$erro.'</li>';	
						}
					$html .= '</ul>
					</div>';					
				}
				
				
				
				
				
				
				if(count($noticias) > 0){
					
					$html .= '<div class="response-msg notice ui-corner-all">
					<span>ALERTA</span>
					<ul>';
					
						foreach($noticias as $noticia){
							$html .= '<li>'.$noticia.'</li>';	
						}
					$html .= '</ul>
					</div>';					
				}
				
				
				
				
				
				
				if(count($informacoes) > 0){
					
					$html .= '<div class="response-msg inf ui-corner-all">
					<span>INFORMAÇÃO</span>
					<ul>';
					
						foreach($informacoes as $informacao){
							$html .= '<li>'.$informacao.'</li>';	
						}
					$html .= '</ul>
					</div>';					
				}
				
				
				
				
				
				
				if(count($sucessos) > 0){
					
					$html .= '<div class="response-msg success ui-corner-all">
					<span>SUCESSO</span>
					<ul>';
					
						foreach($sucessos as $sucesso){
							$html .= '<li>'.$sucesso.'</li>';	
						}
					$html .= '</ul>
					</div>';					
				}
				
				
				
				
				
				
				return $html;
			}
			
			
			
			
			
		}
