<?php
		require_once('m2brimagem.class.php');
		//retira caracteres especiais
		function URL_amigavel($url){
			
			//converte para minusculo
			$url = strtolower ($url); 
			
			
			//MODIFICADO PARA TESTAR
			//converte caracteres especiais
			//$url = strtr($url, "���������������������������������������������������������������������", "SOZsozYYuAAAAAAACEEEEIIIIDNOOOOOOUUUUYsaaaaaaaceeeeiiiionoooooouuuuyy"); 
			
			//converte caracteres especiais
			$url = strtr($url, 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª', 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr'); 
			
			//retira espa�os
			$url = str_replace(' ', '-', $url);
			
			//retira barra
			$url = str_replace('/', '-', $url); 	
					
			//retira '
			$url = str_replace("'", '', $url);
			
			//retira "
			$url = str_replace('"', '', $url);
			
			//retira :
			$url = str_replace(':', '', $url);
			
			//retira ?
			$url = str_replace('?', '', $url);
			//retira +
			$url = str_replace('+', '', $url);
			
			//retira ,
			$url = str_replace(',', '', $url); 
			
			//retira &
			$url = str_replace('&', '', $url);
			
			//deixa somente letras e n�meros
			//$url = eregi_replace("([^a-z0-9])", "", $url);
			return $url;
		}
		
		
		
		//Gera miniaturas
		function Miniatura($imagem, $largura, $altura, $CorFundo, $tipo, $nome_imagem){
			
			$nome_imagem = str_replace(' ', '-', $nome_imagem); //substitue espa�o por h�fen
			$nome_imagem = ereg_replace("[^A-Za-z��0-9-]", "", $nome_imagem); //deixa somente letras e n�meros
			$nome_imagem = URL_amigavel(substr($nome_imagem, 0, 100));		
					
					
			if(!file_exists(CAMINHO_IMAGENS.'cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem)){
			//cria miniatura
						
				//cor de fundo
				$bg1 = substr($CorFundo, 0, 2);
				$bg2 = substr($CorFundo, 2, 2);
				$bg3 = substr($CorFundo, 4, 2);
			
				$oImg = new m2brimagem(CAMINHO_IMAGENS.$imagem);
				$valida = $oImg->valida();
				
				if ($valida == 'OK') {
				//imagem � va�lida	
					$oImg->rgb(hexdec($bg1), hexdec($bg2), hexdec($bg3));
					
					$oImg->redimensiona($largura, $altura, $tipo);
					$oImg->grava(CAMINHO_IMAGENS.'cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem);
				} 
			}
			
		
			
			return DOMINIO_IMG.'cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem;			
		}
		//Gera miniaturas
		function MiniaturaPerfil($imagem, $largura, $altura, $CorFundo, $tipo, $nome_imagem){
			
			$nome_imagem = str_replace(' ', '-', $nome_imagem); //substitue espa�o por h�fen
			$nome_imagem = ereg_replace("[^A-Za-z��0-9-]", "", $nome_imagem); //deixa somente letras e n�meros
			
			$nome_imagem = URL_amigavel(substr($nome_imagem, 0, 100));		
			
					
			if(!file_exists(CAMINHO_IMAGENS_PERFIL.'cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem)){
			//cria miniatura						
				//cor de fundo
				$bg1 = substr($CorFundo, 0, 2);
				$bg2 = substr($CorFundo, 2, 2);
				$bg3 = substr($CorFundo, 4, 2);

				$oImg = new m2brimagem(CAMINHO_IMAGENS_PERFIL.$imagem);
				$valida = $oImg->valida();
				
				if ($valida == 'OK') {
				//imagem � va�lida	
					$oImg->rgb(hexdec($bg1), hexdec($bg2), hexdec($bg3));
					
					$oImg->redimensiona($largura, $altura, $tipo);
					$oImg->grava(CAMINHO_IMAGENS_PERFIL.'cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem);
				} 
			}
			
		
			
			return DOMINIO_IMG_PERFIL.'cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem;			
		}
		
		
		
		
		
		
		
		function NomeMiniatura($imagem, $largura, $altura, $CorFundo, $tipo, $nome_imagem, $vip=false){
			
			$nome_imagem = str_replace(' ', '-', $nome_imagem); //substitue espa�o por h�fen
			$nome_imagem = ereg_replace("[^A-Za-z��0-9-]", "", $nome_imagem); //deixa somente letras e n�meros
			$nome_imagem = URL_amigavel(substr($nome_imagem, 0, 100));	
			
			if($vip){
				return 'https://server2.hotboys.com.br/arquivos/cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem;	
			
			} else {
				return 'https://server2.hotboys.com.br/arquivos/cache/'.$nome_imagem.','.$tipo.','.$largura.','.$altura.','.$imagem;	
			
			}
			
			
		}
		//retorna nome do m�s por extenso
		function mes($mes){
			
			if($mes==1){
				$mes = 'Janeiro';
				
			} else if($mes==2){
				$mes = 'Fevereiro';
				
			} else if($mes==3){
				$mes = 'Mar�o';
				
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
				
			} else if($mes==12){
				$mes = 'Dezembro';
				
			}
			
			return $mes;
			
		}
		
		
		
		
		
		function diasemana($data) {
			$ano =  substr("$data", 0, 4);
			$mes =  substr("$data", 5, -3);
			$dia =  substr("$data", 8, 9);
		
			$diasemana = date("w", mktime(0,0,0,$mes,$dia,$ano) );
		
			switch($diasemana) {
				case"0": $diasemana = "Domingo";       break;
				case"1": $diasemana = "Segunda-Feira"; break;
				case"2": $diasemana = "Ter�a-Feira";   break;
				case"3": $diasemana = "Quarta-Feira";  break;
				case"4": $diasemana = "Quinta-Feira";  break;
				case"5": $diasemana = "Sexta-Feira";   break;
				case"6": $diasemana = "S�bado";        break;
			}
		
			return $diasemana;
		}
		function limita_caracteres($texto, $limite, $quebra = true){
		   $tamanho = strlen($texto);
		   if($tamanho <= $limite){ //Verifica se o tamanho do texto � menor ou igual ao limite
		      $novo_texto = $texto;
		   }else{ // Se o tamanho do texto for maior que o limite
		      if($quebra == true){ // Verifica a op��o de quebrar o texto
		         $novo_texto = trim(substr($texto, 0, $limite))."...";
		      }else{ // Se n�o, corta $texto na �ltima palavra antes do limite
		         $ultimo_espaco = strrpos(substr($texto, 0, $limite), " "); // Localiza o �tlimo espa�o antes de $limite
		         $novo_texto = trim(substr($texto, 0, $ultimo_espaco))."..."; // Corta o $texto at� a posi��o localizada
		      }
		   }
		   return $novo_texto; // Retorna o valor formatado
		}
		
		
		
		function registrar_login(){
			
		
			$login = $_SESSION[email_cliente_logado];
			$ip = $_SERVER[REMOTE_ADDR];
			
			
			if($login != ''){
			//est� na area VIP, logado	
		
				if(($_SESSION[registro_login_time]+60*15) < time()){
				//mais de 15 mins q nao registra o login			
						
					$ch = curl_init();		
					curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/www.hotboys.com.br/remoto/registrar-login.php?login='.$login.'&ip='.$ip);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
					$saida = curl_exec($ch);					
					curl_close($ch);
					
					
					if($saida == 'bloquear'){
					//bloquear acesso		
						
						echo 'Aten��o: Voc� est� conectado de v�rios locais diferentes!<br><br>
						Por favor entre em contato e informe o seu IP:<br>
						(21) 3005-3221.<br>
						E-mail: contato@hotmidias.com.br<br><br>
						
						<strong>IP do seu computador:</strong> '.$ip.'						
						<br><br>
						<strong>Equipe Hot Boys</strong>';
						
						exit();
						
					} else {
					//acesso liberado	
						$_SESSION[registro_login_time] = time();
												
					}
					
					
				}
			}
		}
		
		
		
		
		
		function criar_id_iframe($email){
			
			$palavra_chave = 'iframe457552'; //nao usar sinal de +
			$validade = time() + 3600; //1 hr de dura��o
			
			$id = $validade.'+'.$palavra_chave.'+'.$email;			
			
			return encode5t($id);
		}
		
		
		
		//function to encrypt the string
		function encode5t($str){
			for($i=0; $i < 10; $i++)  {
				$str=strrev(base64_encode($str)); //apply base64 first and then reverse the string
			}
			return $str;
		}
		
		
		
		
		
		
		function verificar_pgto(){
			
			$email = $_SESSION[email_cliente_logado];
			
			
			if($email != ''){
			//est� na area VIP, logado	
		
				if(($_SESSION[verificar_pgto]+3600*1) < time()){
				//mais de 1 hora q nao verifica o pgto		
					
					$ch = curl_init();		
					curl_setopt($ch, CURLOPT_URL, 'https://www.gpagamentos.com.br/www.hotboys.com.br/remoto/verificar-pagamento.php?email='.$email);
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
				
					$saida = curl_exec($ch);					
					
					
					
					
					if($saida == 'ok'){
					//pagamento ok	
						$_SESSION[verificar_pgto] = time();
						
					} else {
					//erro no pagamento
						header("Location: ".URL_VIP."index.php?acao=iframe-informacoes-pgto");
						exit();
												
					}
				}
			}
			
		}
		
		
		//fun�ao resume texto
		function resumo($texto,$qnt){
	        $resumo=substr($texto,'0',$qnt);
		$last=strrpos($resumo," ");
		$resumo=substr($resumo,0,$last);
		return $resumo."...";
	}		
		
		
function formatar_tempo($timeBD) {
	$timeNow = time();
	$timeRes = $timeNow - $timeBD;
	$nar = 0;
	
	// vari�vel de retorno
	$r = "";
	// Agora
	if ($timeRes == 0){
		$r = "agora";
	} else
	// Segundos
	if ($timeRes > 0 and $timeRes < 60){
		$r = $timeRes. " segundos atr&aacute;s";
	} else
	// Minutos
	if (($timeRes > 59) and ($timeRes < 3599)){
		$timeRes = $timeRes / 60;	
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " minuto atr&aacute;s";
		} else {
			$r = round($timeRes,$nar). " minutos atr&aacute;s";
		}
	}
	 else
	// Horas
	// Usar expressao regular para fazer hora e MEIA
	if ($timeRes > 3559 and $timeRes < 85399){
		$timeRes = $timeRes / 3600;
		
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " hora atr&aacute;s";
		}
		else {
			$r = round($timeRes,$nar). " horas atr&aacute;s";		
		}
	} else
	// Dias
	// Usar expressao regular para fazer dia e MEIO
	if ($timeRes > 86400 and $timeRes < 2591999){
		
		$timeRes = $timeRes / 86400;
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " dia atr&aacute;s";
		} else {
			preg_match('/(\d*)\.(\d)/', $timeRes, $matches);
			
			if ($matches[2] >= 5) {
				$ext = round($timeRes,$nar) - 1;
				
				// Imprime o dia
				$r = $ext;
				
				// Formata o dia, singular ou plural
				if ($ext >= 1 and $ext < 2){ $r.= " dia "; } else { $r.= " dias ";}
				
				// Imprime o final da data
				$r.= /*<!--&frac12-->;*/" atr&aacute;s";
				
				
			} else {
				$r = round($timeRes,0) . " dias atr&aacute;s";
			}
			
		}		
				
	} else
	// Meses
	if ($timeRes > 2592000 and $timeRes < 31103999){
		$timeRes = $timeRes / 2592000;
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " mes atr&aacute;s";
		} else {
			preg_match('/(\d*)\.(\d)/', $timeRes, $matches);
			
			if ($matches[2] >= 5){
				$ext = round($timeRes,$nar) - 1;
				
				// Imprime o mes
				$r.= $ext;
				
				// Formata o mes, singular ou plural
				if ($ext >= 1 and $ext < 2){ $r.= " mes "; } else { $r.= " meses ";}
				
				// Imprime o final da data
				$r.= /*&frac12;*/ "atr&aacute;s";
			} else {
				$r = round($timeRes,0) . " meses atr&aacute;s";
			}
			
		}
	} else
	// Anos
	if ($timeRes > 31104000 and $timeRes < 155519999){
		
		$timeRes /= 31104000;
		if (round($timeRes,$nar) >= 1 and round($timeRes,$nar) < 2){
			$r = round($timeRes,$nar). " ano atr&aacute;s";
		} else {
			$r = round($timeRes,$nar). " anos atr&aacute;s";
		}
	} else
	// 5 anos, mostra data
	if ($timeRes > 155520000){
		
		$localTimeRes = localtime($timeRes);
		$localTimeNow = localtime(time());
				
		$timeRes /= 31104000;
		$gmt = array();
		$gmt['mes'] = $localTimeRes[4];
		$gmt['ano'] = round($localTimeNow[5] + 1900 - $timeRes,0);				
					
		$mon = array("Jan ","Fev ","Mar ","Abr ","Mai ","Jun ","Jul ","Ago ","Set ","Out ","Nov ","Dez "); 
		
		$r = $mon[$gmt['mes']] . $gmt['ano'];
	}
	
	return $r;
}
		
		/*
		 * $data = YYYY-mm-dd hh:ii:ss
		 */
		function geraTimestamp($data) {
			$ano = substr($data, 0, 4);
			$mes = substr($data, 5, 2);
			$dia = substr($data, 8, 2);
			$horas = substr($data, 11, 2);
			$minutos = substr($data, 14, 2);
			$segundos = substr($data, 17, 2);
			
			return mktime($horas, $minutos, $segundos, $mes, $dia, $ano);			
		}
		
		
		/* Converte formato DATETIME do MySQL para o TIMESTAMP do Unix
   2003-12-30  -> 1072834230 */
		function mysql_datetime_para_timestamp($dt) {
    $yr=strval(substr($dt,0,4));
    $mo=strval(substr($dt,5,2));
    $da=strval(substr($dt,8,2));
    return mktime(0,0,0,$mo,$da,$yr);}
	
	/* Converte formato TIMESTAMP do Unix para o humano
   1072834230 -> 30/12/2003 23:30:59 */
function timestamp_para_humano($ts) {
     
    $d=getdate($ts);
    $yr=$d["year"];
    $mo=$d["mon"];
    $da=$d["mday"];
    $hr=$d["hours"];
    $mi=$d["minutes"];
    $se=$d["seconds"];
    return date("d/m/Y", mktime($hr,$mi,$se,$mo,$da,$yr));
}	


function number_format_short( $n, $precision = 1 ) {
    if ($n < 900) {
        // 0 - 900
        $n_format = number_format($n, $precision);
        $suffix = '';
    } else if ($n < 900000) {
        // 0.9k-850k
        $n_format = number_format($n / 1000, $precision);
        $suffix = 'K';
    } else if ($n < 900000000) {
        // 0.9m-850m
        $n_format = number_format($n / 1000000, $precision);
        $suffix = 'M';
    } else if ($n < 900000000000) {
        // 0.9b-850b
        $n_format = number_format($n / 1000000000, $precision);
        $suffix = 'B';
    } else {
        // 0.9t+
        $n_format = number_format($n / 1000000000000, $precision);
        $suffix = 'T';
    }

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
    if ( $precision > 0 ) {
        $dotzero = '.' . str_repeat( '0', $precision );
        $n_format = str_replace( $dotzero, '', $n_format );
    }

    return $n_format . $suffix;
}	

 

//Limitar caracteres sem cortar as palavras com PHP
function limitarTexto($texto, $limite, $quebrar = true){
	//corta as tags do texto para evitar corte errado
	$contador = strlen(strip_tags($texto));
	if($contador <= $limite):
	  //se o número do texto form menor ou igual o limite então retorna ele mesmo
	  $newtext = $texto;
	else:
	  if($quebrar == true): //se for maior e $quebrar for true
		//corta o texto no limite indicado e retira o ultimo espaço branco
		$newtext = trim(mb_substr($texto, 0, $limite))."...";
	  else:
		//localiza ultimo espaço antes de $limite
		$ultimo_espaço = strrpos(mb_substr($texto, 0, $limite)," ");
		//corta o $texto até a posição lozalizada
		$newtext = trim(mb_substr($texto, 0, $ultimo_espaço))."...";
	  endif;
	endif;
	return $newtext;
  }
 // limitarTexto($conteudo, 100); ou pode setar FALSE também limitarTexto($conteudo, 100, FALSE)

