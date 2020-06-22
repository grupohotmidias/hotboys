<?php
		session_start();
		require('../configuracoes/configuracoes.php');
		require('includes/funcoes.php');




		
	
		unset($_SESSION[login]);
		
		
		
		
		
		header("Location: index.php");
		