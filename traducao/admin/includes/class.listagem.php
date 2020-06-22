<?php


		class listagem{
			
			
			
			
			function listar($colunas, $dados){
				
				
				if(count($colunas)){
					
					foreach($colunas as $coluna){
						
						$htmlColunasTitulos .= '<th>'.$coluna.'</th>';
						$htmlColunasBusca .= '<th>'.$coluna.'...</th>';
						
						#####Filtros
						$htmlFiltros .= '{type: "text"}, ';
					}
				}
				
				
				$IdForm = rand(99, 9999).time();
				
				$html = '
				
				<form id="frm'.$IdForm.'" name="frm'.$IdForm.'" method="post" >
				<table cellspacing="0" id="TabelaListagem" >						
						<thead>
							<tr>
								<th class="center"><input type="checkbox" class="checkbox tooltip" value="" title="Selecionar todos" onclick="checkedAll();"  /></th>
								'.$htmlColunasTitulos.'
								<th align="center" width="120">Opções</td>
							</tr>
						
							
						
                            <tr>                            
								<th class="center" ></th>
								'.$htmlColunasBusca.'
								<th align="center"></th>
							</tr>
						
						</thead>	
						
						
						<tbody>
						
                        </tbody>
						
					</table>
					
					
					<table style="margin-top:10px;">
						<tr class="alt">    	
								
								<td>
								 <a class="btn_no_text btn ui-state-default ui-corner-all tooltip" title="Excluir todos selecionados" href="javascript:void(0)" onclick="document.forms[\'frm'.$IdForm.'\'].submit();" style="float:left">
									<span class="ui-icon ui-icon-circle-close"></span>
								</a>
                                	<div style="float:left; line-height:33px;">Excluir todos os selecionados</div>
                                  
                                  </td>
							</tr>					
					</table>
					</form>
					
					
					
					<script type="text/javascript">
					checked=false;
					function checkedAll (frm'.$IdForm.') {
						var aa = document.getElementById(\'frm'.$IdForm.'\');
						 if (checked == false)
					          {
					           checked = true
					          }
					        else
					          {
					          checked = false
					          }
						for (var i =0; i < aa.elements.length; i++) 
						{
						 aa.elements[i].checked = checked;
						}
					      }
					</script>';
					
					
					$UltimaColuna = count($colunas) + 1;
					
					
					$html .= '<script type="text/javascript" charset="utf-8">
					$(document).ready( function () {
					$(\'#TabelaListagem\').dataTable(
					{
						"sDom": \'<"top"iflp<"clear">>rt<"bottom"iflp<"clear">>\',
						"aoColumnDefs": [ 
	        				 {"bSortable": false, "aTargets": [0, '.$UltimaColuna.']} //colunas sem a opção de ordenação
	       				],
						
						
						"aaData": [';
					
							if(count($dados)){
							foreach ($dados as $key => $valores) {
									
								#####Dados	
								$html .= "[";	
								foreach($valores as $valor){
									
									$valor = str_replace('"', "'", $valor); //subsitui " por '
									$valor = str_replace("\r\n","",trim($valor)); //remove quebra de linhas
																		
									$html .= '"'.$valor.'", ';
								}
							
								$html .= "], \n";
							}
							}
					
						$html .= '],
					
						}
						).columnFilter({
							sPlaceHolder: "head:after",
							aoColumns: [ null,
						     	'.$htmlFiltros.'
						     	null
							]
						});	
						
								
				});
				
				</script>';
					
					
					
					
				
				return $html;
			}
			
			
			
			
			
		}
