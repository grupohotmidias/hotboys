<?php
/*
 *Enquete criada por Fernando Villela - Montepage coisas legais
 *e-mail: contato@montepage.com.br
 *divulgue, compartilhe, use, altere e mantenha os créditos.
*/
require_once('bancodedados.php');
require_once('html.php');
$html = new Html;
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"  dir="ltr" lang="pt-BR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Administrar Enquete usando PHP MySql Jquery- Montepage</title>
<link rel="stylesheet" type="text/css" href="styles.css" />
</head>
<body>';
    if(isset($_POST['formulario']) && $_POST['formulario']=='opcao'){
        if($html->inserir(array($_POST['idpergunta'], $_POST['nome'], 'opcao'))){
		echo '<div class="success"><p>Opção cadastrada com sucesso!</p></div>';
	}else{
		echo '<div class="error"><p>Falha no cadastro da Opção!</p></div>';
	}
    }
if(isset($_GET['page'])){
    //print_r($_GET);
	if($_GET['page'] == 'editar'){
			echo '<fieldset><legend>Editar - Opções de respostas</legend>';
			echo $html->mostraOpcoes($_GET['id']);
			$html->novaOpcao($_GET['id']);
			echo '</fieldset>';
	}
	if($_GET['page'] == 'excluir'){
		if(isset($_GET['confirm'])){
		    //echo 'aqui';
		    $html->excluir(array($_GET['id'], 'pergunta'));
		    echo '<div class="confirmation"><p>Enquete excluída com sucesso!</p></div>';
		}else{
		    echo '<div class="confirmation"><p>Tem certeza que deseja excluir toda a enquete e seus respectivos votos e opções de repostas?</p></div>';
		    echo '<div class="footer_btn"><a href="cadastrar.php?page=excluir&id='.$_GET['id'].'&confirm=1">Sim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cadastrar.php">Não</a></div>';
		}
	}
	if($_GET['page'] == 'op_excluir'){
		if(isset($_GET['confirm'])){
			$html->excluir(array($_GET['id'], 'opcao'));
		}else{
			echo '<div class="confirmation"><p>Tem certeza que deseja excluir a opção de resposta e seus respectivos votos?</p></div>';
			echo '<div class="footer_btn"><a href="cadastrar.php?page=op_excluir&id='.$_GET['idopcao'].'&confirm=1">Sim</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="cadastrar.php">Não</a></div>';
		}
	}
	
}
    if(isset($_POST['formulario']) && $_POST['formulario']=='pergunta'){
        if($html->inserir(array($_POST['nome'], date('Y-m-d H:i:s'), 'pergunta'))){
		echo '<div class="success"><p>Enquete cadastrada com sucesso!</p></div>';
	}else{
		echo '<div class="error"><p>Falha no cadastro da Enquete!</p></div>';
	}
    }
echo '<fieldset><legend>Todas as Enquetes</legend>'.$html->mostraEnquetes().'</fieldset>';
$html->novaEnquete();
echo '</body></html>';