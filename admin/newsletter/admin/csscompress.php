<?php

		ob_start("ob_gzhandler");
		header("Content-Type: text/css");

		
		$seconds_to_cache = (60*60*24*5); //cache de 24 horas
		$ts = gmdate("D, d M Y H:i:s", time() + $seconds_to_cache) . " GMT";
		header("Expires: $ts");
		header("Pragma: cache");
		header("Cache-Control: max-age=$seconds_to_cache");
		
		
		
		$arquivo = $_GET[arquivo].'.css';

			
		$handle = @fopen($arquivo, "r");
		if ($handle) {
		    while (!feof($handle)) {
		        $buffer .= fgets($handle, 4096);		        
		    }
		    fclose($handle);
		}


		
		echo $buffer;