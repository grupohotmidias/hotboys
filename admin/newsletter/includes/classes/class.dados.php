<?php



		/*
		 * Classe p/ forms
		 */
		class Dados{
			
			
			/*
			 * Trata informação
			 */
			public static function input($info){
				
				return addslashes($info);
			}
			
			
			
			public static function somenteNumeros($num){
				
				return preg_replace("/[^0-9]/", "", $num);
			}
			
			
			
			
			public static function moedaBD($valor){
				
				$valor =  str_replace('R$', '', $valor);
				$valor = str_replace('.', '', $valor);
				$valor = str_replace(',', '.', $valor);
					
				return $valor;
			}
			
			
			
			public static function moedaUsuario($valor){
								
				return 'R$ '.number_format($valor, 2, ',', '.');
			}
			
			
			
			/*
			 * Converte data p/ formato do BD
			 */
			public static function dataBD($data){
				
				$data = explode('/', $data);
				return  $data[2].'-'.$data[1].'-'.$data[0];
			}
			
			
			
			
			
			
			/*
			 * Converte data p/ formato do usuaário
			 */
			public static function dataUsuario($data){
				
				$data = explode('-', $data);
				return  $data[2].'/'.$data[1].'/'.$data[0];
			}
			
			
			
			/*
			 * Converte data e hora p/ formato do usuaário
			 */
			public static function dataHoraUsuario($data){
				
				$data = substr($data, 8, 2).'/'.substr($data, 5, 2).'/'.substr($data, 0, 4).' '.substr($data, 10, 9);
				
				return $data;
			}
			
			
			
			
			/*
			 * Verifica qual dado retornar em caso de erro no form de cadastro do admin
			 */ 
			public static function preencherDados($post, $bd, $tipo=null){
				if($post != ''){
				//post	
					return $post;
				} else {
				//dados do BD
					
					if($tipo=='data'){
						return Dados::dataUsuario($bd);
						
					} else {
						return $bd;
						
					}
				}				
			}
			
			
			
			
			/*
			 * Exibir mensagens de erro
			 */
			public static function adminExibirMsg($arrayMsgSucesso, $arrayMsgErro){
				
				if(count($arrayMsgSucesso)){
					foreach($arrayMsgSucesso as $msg){
						$saida .= '<script>msgSucesso("'.$msg.'");</script>';						
					}
				}
				
				if(count($arrayMsgErro)){
					foreach($arrayMsgErro as $msg){
						$saida .= '<script>msgErro("'.$msg.'");</script>';						
					}
				}
				
				
				return $saida;
			}
			
			
			
			
			
			/*
			 * Retorna somente caracteres validos
			 */
			public static function urlAmigavel($string){
				$slug = '-';
				$string = strtolower($string);
			
				// Código ASCII das vogais
				$ascii['a'] = range(224, 230);
				$ascii['e'] = range(232, 235);
				$ascii['i'] = range(236, 239);
				$ascii['o'] = array_merge(range(242, 246), array(240, 248));
				$ascii['u'] = range(249, 252);
			 
				// Código ASCII dos outros caracteres
				$ascii['b'] = array(223);
				$ascii['c'] = array(231);
				$ascii['d'] = array(208);
				$ascii['n'] = array(241);
				$ascii['y'] = array(253, 255);
			 
				foreach ($ascii as $key=>$item) {
					$acentos = '';
					foreach ($item AS $codigo) $acentos .= chr($codigo);
					$troca[$key] = '/['.$acentos.']/i';
				}
			 
				$string = preg_replace(array_values($troca), array_keys($troca), $string);
	 
				// Slug?
				if ($slug) {
					// Troca tudo que não for letra ou número por um caractere ($slug)
					$string = preg_replace('/[^a-z0-9]/i', $slug, $string);
					// Tira os caracteres ($slug) repetidos
					$string = preg_replace('/' . $slug . '{2,}/i', $slug, $string);
					$string = trim($string, $slug);
				}
				
				return $string;
				
			}
			
			
			
			
			
			
			
			
			public static function dataCompleta($data){
				
				$dados = explode('-', $data);
				$dia = $dados[2];
				$mes = $dados[1];
				$ano = $dados[0];
				
				$time = strtotime($data);				
				$diaSemana = date('N', $time);
				
				
				if($mes==1){
					$mes = 'Janeiro';					
				} else if($mes==2){
					$mes = 'Fevereiro';					
				} else if($mes==3){
					$mes = 'Março';					
				} else if($mes==4){
					$mes = 'Abril';					
				} else if($mes==5){
					$mes = 'Maio';					
				} else if($mes==6){
					$mes = 'Junho';					
				} else if($mes==7){
					$mes = 'Julho';					
				} else if($mes==8){
					$mes = 'Agosto';					
				} else if($mes==9){
					$mes = 'Setembro';					
				} else if($mes==10){
					$mes = 'Outubro';					
				} else if($mes==11){
					$mes = 'Novembro';					
				} else {
					$mes = 'Dezembro';					
				}
				
				
				
				if($diaSemana==1){
					$diaSemana = 'Segunda';
				} else if($diaSemana==2){
					$diaSemana = 'Terça';
				} else if($diaSemana==3){
					$diaSemana = 'Quarta';
				} else if($diaSemana==4){
					$diaSemana = 'Quinta';
				} else if($diaSemana==5){
					$diaSemana = 'Sexta';
				} else if($diaSemana==6){
					$diaSemana = 'Sábado';
				} else {
					$diaSemana = 'Domingo';
				} 
				
				
				return $diaSemana.', '.$dia.' de '.$mes.' de '.$ano;
				
			}
			
			
			
			
			
			
			
			
		}
