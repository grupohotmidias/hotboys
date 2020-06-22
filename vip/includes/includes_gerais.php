<?php 
	//Variaveis dos arquivos de configuracao
	require_once('includes/vip.php'); 
	
	require_once('includes/PaginacaoConteudoClass.php');
	
	//Variavel do perfil do usuario
	include('includes/estrutura/topo/perfil/perfil-usuario.php');  
	
	//Pagina do perfil do usuario
	include('includes/paginas/perfil-usuario.php');
	
	//codigos que chamam cenas
	include('includes/paginacao/programacao-cenas.php');
	
	//Topo head 
	$head = 'includes/estrutura/topo/head.php';
	
	//variavel do menu topo 
	$nav = 'includes/estrutura/topo/nav-topo.php';
	
	//variavel do menu lateral
	$menu_lateral = 'includes/estrutura/menu/menu-lateral.php';

	//variavel que puxa o modal de contato
	$contato = '../novo-projeto/includes/modal/rodape/contato.php';
	
	//variavel que puxa o modal de duvidas frequentes
	$duvidas_frequentes = '../novo-projeto/includes/modal/rodape/duvidas-frequentes.php';
	
	//variavel que puxa o modal de termos de uso
	$termos = '../novo-projeto/includes/modal/rodape/termos-uso.php';

	//variavel que puxa o modal Editar Perfil
	$editar_perfil = '../novo-projeto/includes/modal/pagina/editar-perfil.php';
		
	//variavel do rodape
	$footer = 'includes/estrutura/rodape/footer.php';
?>