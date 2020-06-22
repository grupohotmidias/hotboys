<?php

	/*###### Verifica se está logado
	require(CAMINHO_SISTEMA.'vip/login/includes/funcoes.php');
	verificarLoginAreaVip();
	###### Verifica se está logado
	
	
	registrar_login(); //proteção para evitar que ips diferentes acessem com a mesma conta, etc
	
	
	if(!$naoVerificarPagamento) verificar_pgto();//verifica se pagamento está ok
*/

	require('includes/hotmidias/funcoes.php');
	verificaoPermissaoAcessoContaHotmidias(ID_SITE_HOTMIDIAS);



	$vip = true;
	
	