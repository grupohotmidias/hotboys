<?php

	/*
	 * Script responsável por gerar o arquivo /public_html/traducao/traducoes.php
	 * Rodar 2X por dia
	 */


		set_time_limit(0);
		require('../configuracoes/configuracoes.php');
	
	
	
	
	
	
		$conteudoArquivo = '<?php

	/*
		Script gerado automáticamente pelo arquivo /public_html/traducao/cron/conteudo-fixo.php
		'.date("d/m/Y H:i:s").'
	*/

		
		if(!function_exists("traducao")){
		function traducao($cod, $encode=true){
								
			';
	
	
		$query_conteudo = "SELECT * FROM `traducoes` order by arquivo ASC";
		$consulta_conteudo = mysql_query($query_conteudo);
				
		while($linha = mysql_fetch_array($consulta_conteudo)){
			
			$linha[traducao_pt] = str_replace("'", "\'", $linha[traducao_pt]);
			$linha[traducao_us] = str_replace("'", "\'", $linha[traducao_us]);
			
			$conteudoArquivo .= '$tr['.$linha[id].'][pt] = \''.$linha[traducao_pt].'\';
			$tr['.$linha[id].'][us] = \''.$linha[traducao_us].'\';
			
			';			
		}
		
		
		$conteudoArquivo .= '
		
			if($tr[$cod][IDIOMA]=="") {
				$saida = $tr[$cod][pt];
			} else {
				$saida = $tr[$cod][IDIOMA];
			}
		
			if($encode){
				return utf8_encode($saida);
			} else {
				return $saida;
			}
			
		}
		}


		
		
		if(!function_exists("idioma_conteudo")){
		function idioma_conteudo($pt, $us){
			if(IDIOMA=="pt"){
				$saida = $pt;	
							
			} else if(IDIOMA=="us"){
				$saida = $us;	
							
			} else {
				$saida = $pt;	
				
			}
			
			if($saida==""){
				return $pt;
			} else {
				return $saida;
			}
			
		}
		}
		
		
		
		if(!function_exists("get")){
		function get($tipo=false){
			
			if($tipo){
				$url_chamada = @end(explode("/", $_SERVER[QUERY_STRING])); 
			} else {
				$url_chamada = @end(explode("/", $_SERVER[REQUEST_URI])); 
			}
			
			
		
			$variaveis = @end(explode(".php?", $url_chamada));
			$variaveis = @explode("&", $variaveis);
			foreach($variaveis as $id => $var){
				
				$var = explode("=", $var);
				$vars[$var[0]] = $var[1];
			}
			
			return $vars;
			
		}
		}
		
		
		
		/* Verifica se a URL está correta, caso contrário redireciona */
		if(!function_exists("verifica_url_traducao")){
		function verifica_url_traducao($vip=false){
			$url_chamada = explode("/", $_SERVER[REQUEST_URI]);
			if(count($url_chamada) > 0){
				foreach($url_chamada as $vlr_url){			
					if($vlr_url=="pt"  OR  $vlr_url=="us") $url_correta = true;
				}
			}
			if(!$url_correta){
				header("HTTP/1.1 301 Moved Permanently"); 
				
				if($vip){
					$_SERVER[REQUEST_URI] = str_replace("vip/", "", $_SERVER[REQUEST_URI]);
					if($_SERVER[REQUEST_URI]=="/") $_SERVER[REQUEST_URI] = "/index.php";
					header("Location: http://www.hotboys.com.br/vip/pt".$_SERVER[REQUEST_URI]); 
				} else {
					header("Location: http://www.hotboys.com.br/pt".$_SERVER[REQUEST_URI]); 
				}				
				
				exit();
			}
		}
		}
		
		
		
		
		define(URL_HOTBOYS, "http://www.hotboys.com.br/");
		
		
		';
		
		
		
		
		#####Salva arquivo
		unlink('../traducoes.php');
		$fp = fopen('../traducoes.php', 'a');
		$escreve = fwrite($fp, $conteudoArquivo);
		fclose($fp);
		
		
		
		


