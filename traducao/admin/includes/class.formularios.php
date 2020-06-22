<?php


		class form{
			
			
			var $NomeBotaoEnviar = 'Enviar';
			var $acaoForm; // ?acao=XXX&id=XXX
			var $hiddenAcao; //cadastrar ou editar
			
			
			
			/*
			 * Gera o formulário
			 */
			function gerar($tituloForm, $dados){
				
				$saida = ' <div class="portlet ui-widget ui-widget-content ui-helper-clearfix ui-corner-all form-container">
					<div class="portlet-header ui-widget-header">'.$tituloForm.'</div>
					<div class="portlet-content">
						<form action="'.$this->acaoForm.'" method="post" enctype="multipart/form-data" class="forms" name="form" id="form" >
							<ul>';
				
				
				
				foreach($dados as $chave => $valores){
		
					if($valores[type] == 'text'){						
						$saida .= $this->InputText($chave, $valores);
						
					} else if($valores[type] == 'textarea'){
						$saida .= $this->InputTextarea($chave, $valores);
					
					} else if($valores[type] == 'checkbox'){
						$saida .= $this->InputCheckbox($chave, $valores);
						
					} else if($valores[type] == 'radio'){
						$saida .= $this->InputRadio($chave, $valores);
						
					} else if($valores[type] == 'select'){
						$saida .= $this->InputSelect($chave, $valores);
						
					} else if($valores[type] == 'file'){
						$saida .= $this->InputFile($chave, $valores);
						
					} else if($valores[type] == 'hidden'){
						$saida .= $this->InputHidden($chave, $valores);						
					}
				}
				
				
				
				
				
				
				######Botão Enviar
				$saida .= '<li class="buttons">
					<input type="submit" value="'.$this->NomeBotaoEnviar.'" class="submit" />
				</li>';
				
				
				
				
				$saida .= '</ul>
							<input type="hidden" name="acao" value="'.$this->hiddenAcao.'" />
						</form>
					</div>
				</div>';
								
				return $saida;
			}
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			function InputText($nome, $parametros){
								
				$descricao = $parametros[descricao];
				$valor = $parametros[valor];
				$obrigatorio = $parametros[obrigatorio];
				$classe = $parametros[classe];
				$ajuda = $parametros[ajuda];
				
				
				$saida = '<li>
							<label class="desc">
								'.$descricao.' ';
								
							if($obrigatorio) {
								$saida .= '<span class="PreenchimentoObrigatorio">(*)</span>';
								$ClassRequired = 'required';
							}
								
							$saida .= '</label>
							<div>
								<input type="text" value="'.$valor.'" class="field text '.$classe.' '.$ClassRequired.'" name="'.$nome.'">';
								
								if($ajuda!=''){
									$saida .= '<img src="images/icons/help.png" class="IconHelp tooltip" title="'.$descricao.' - '.$ajuda.'" >';
								}
								
							$saida .= '</div>';
							
							if($obrigatorio) $saida .= '<label for="'.$nome.'" generated="true" class="error" style="display:none;"></label>';
							
						$saida .= '</li>';
						
				return $saida;		
			}
			
			
			
			
			
			
			
			
			
			
			
			function InputTextarea($nome, $parametros){
				
				$descricao = $parametros[descricao];
				$valor = $parametros[valor];
				$obrigatorio = $parametros[obrigatorio];
				$classe = $parametros[classe];
				$ajuda = $parametros[ajuda];
				
				$saida = '<li>
								<label class="desc">
									'.$descricao.' ';
								
								if($obrigatorio) {
									$saida .= '<span class="PreenchimentoObrigatorio">(*)</span>';
									$ClassRequired = 'required';
								}
									
								$saida .= '</label>
								<div>
									<textarea tabindex="2" cols="50" rows="5" class="field textarea '.$classe.' '.$ClassRequired.'" name="'.$nome.'" >'.$valor.'</textarea>';
									
									if($ajuda!=''){
										$saida .= '<img src="images/icons/help.png" class="IconHelp tooltip" title="'.$descricao.' - '.$ajuda.'" >';
									}
									
								$saida .= '</div>';
								
								if($obrigatorio) $saida .= '<label for="'.$nome.'" generated="true" class="error" style="display:none;"></label>';
								
						$saida .= '</li>';
				
				return $saida;		
			}
			
			
			
			
			
			
			
			
			
			
			function InputCheckbox($nome, $parametros){
								
				$descricao = $parametros[descricao];
				$valores = $parametros[valores];
				$obrigatorio = $parametros[obrigatorio];				
				$ajuda = $parametros[ajuda];
				
				
				$saida = '<li>
							<label for="Field4" id="title4" class="desc">
								'.$descricao.' ';
								
							if($obrigatorio) {
								$saida .= '<span class="PreenchimentoObrigatorio">(*)</span>';
								$ClassRequired = 'required';
							}	
								
							$saida .= '</label>
							<div class="col">';
							
								foreach($valores as $valor => $informacoes){
									
									if($informacoes[selecionado]){
										$checked = 'checked="checked"';
									} else {
										$checked = '';
									}
									
									$saida .= '<span>
										<input type="checkbox" value="'.$valor.'" class="field checkbox '.$ClassRequired.'" '.$checked.' name="'.$nome.'">
										<label class="choice">'.$informacoes[nome].'</label>
									</span>';
								}
								
								
								if($ajuda!=''){
									$saida .= '<img src="images/icons/help.png" class="IconHelp tooltip" title="'.$descricao.' - '.$ajuda.'" >';
								}
								
							$saida .= '</div>';
							
							if($obrigatorio) $saida .= '<label for="'.$nome.'" generated="true" class="error" style="display:none;"></label>';
							
						$saida .= '</li>';
				
				return $saida;		
			}
			
			
			
			
			
			
			
			
			
			
			function InputRadio($nome, $parametros){
				
				
				$descricao = $parametros[descricao];
				$valores = $parametros[valores];
				$obrigatorio = $parametros[obrigatorio];				
				$ajuda = $parametros[ajuda];
				
				
				$saida = '<li>
							<label for="Field4" id="title4" class="desc">
								'.$descricao.' ';
								
							if($obrigatorio) {
								$saida .= '<span class="PreenchimentoObrigatorio">(*)</span>';
								$ClassRequired = 'required';
							}
								
							$saida .= '</label>
							<div class="col">';
							
							
							
							foreach($valores as $valor => $informacoes){
									
									if($informacoes[selecionado]){
										$checked = 'checked="checked"';
									} else {
										$checked = '';
									}
									
									$saida .= '<span>
										<input type="radio" name="'.$nome.'" value="'.$valor.'" '.$checked.' class="'.$ClassRequired.'" />
										<label class="choice">'.$informacoes[nome].'</label>
									</span>';
								}
							
							
							if($ajuda!=''){
								$saida .= '<img src="images/icons/help.png" class="IconHelp tooltip" title="'.$descricao.' - '.$ajuda.'" >';
							}	
								
								
							$saida .= '</div>';
							
							if($obrigatorio) $saida .= '<label for="'.$nome.'" generated="true" class="error" style="display:none;"></label>';
							
							
						$saida .= '</li>';
				
				return $saida;		
			}
			
			
			
			
			
			
			
			
			
			
			function InputSelect($nome, $parametros){
					
				$descricao = $parametros[descricao];
				$valor = $parametros[valor];
				$obrigatorio = $parametros[obrigatorio];
				$valores = $parametros[valores];
				$classe = $parametros[classe];				
				$ajuda = $parametros[ajuda];
				
				
				$saida = '<li>
							<label class="desc">'.$descricao.' ';
							
							if($obrigatorio) {
								$saida .= '<span class="PreenchimentoObrigatorio">(*)</span>';
								$ClassRequired = 'required';
							}
							
							$saida .= '</label>
							<div>
								<select class="field select '.$classe.' '.$ClassRequired.'" name="'.$nome.'">';
								
								
								if(count($valores)){
									foreach($valores as $valor => $informacoes){
										
										if($informacoes[selecionado]){
											$selected = 'selected="selected"';
										} else {
											$selected = '';
										}
										
										$saida .= '<option value="'.$valor.'" '.$selected.' >'.$informacoes[nome].'</option>';
									}	
								}			
					
							
								$saida .= '</select>';
								
								if($ajuda!=''){
									$saida .= '<img src="images/icons/help.png" class="IconHelp tooltip" title="'.$descricao.' - '.$ajuda.'" >';
								}
								
							$saida .= '</div>';
							
							if($obrigatorio) $saida .= '<label for="'.$nome.'" generated="true" class="error" style="display:none;"></label>';
														
						$saida .= '</li>';
				
				return $saida;		
			}
			
			
			
			
			
			
			
			
			
			function InputFile($nome, $parametros){
								
				$descricao = $parametros[descricao];		
				$obrigatorio = $parametros[obrigatorio];				
				$classe = $parametros[classe];				
				$ajuda = $parametros[ajuda];
				
				
				$saida = '<li>
							<label class="desc">
								'.$descricao.' ';
								
							if($obrigatorio) {
								$saida .= '<span class="PreenchimentoObrigatorio">(*)</span>';
								$ClassRequired = 'required';
							}
							
							$saida .= '</label>
							<div>
								<input type="file" class="field text '.$classe.' '.$ClassRequired.'" name="'.$nome.'"> ';
								
								if($ajuda!=''){
									$saida .= '<img src="images/icons/help.png" class="IconHelp tooltip" title="'.$descricao.' - '.$ajuda.'" >';
								}
								
							$saida .= '</div>';
							
							if($obrigatorio) $saida .= '<label for="'.$nome.'" generated="true" class="error" style="display:none;"></label>';
							
						$saida .= '</li>';
				
				return $saida;		
			}
			
			
			
			
			
			
			
			
			
			
			
			
			function InputHidden($nome, $parametros){
				
				$valor = $parametros[valor];
				
				$saida = '<input type="hidden" name="'.$nome.'" value="'.$valor.'">';
				
				return $saida;		
			}
			
			
			
			
		}
