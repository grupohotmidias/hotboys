<?php


		

		
		function traduzir_txt($id){
			
			$query = "SELECT * FROM `traducoes` WHERE id='$id'";
			$consulta = mysql_query($query, MYSQL_TRADUCAO);
			$txt = mysql_fetch_array($consulta);
			
			return utf8_encode($txt[traducao_pt]);			
		}
		
		
		//mysql_close($mysql_traducao);
		
		
		
		
		

