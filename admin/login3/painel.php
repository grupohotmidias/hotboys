<?php

    include("includes/autenticacao.php");
    session_start(); 

    require_once('../../mobili/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();

    include_once('config/conexao.php');
    
    $sql_ator = "SELECT * FROM user_ator WHERE id_ator='$_SESSION[id_ator]' and status='Ativo'";
    $consulta_ator = mysql_fetch_array(mysql_query($sql_ator));

    if(!isset($_SESSION["logado"])){
        include_once('config/conexao.php');
    
        $sql_login = "UPDATE `usuarios_atores` SET `login`='$_SESSION[login]', `ip`='$_SESSION[ip]' WHERE id_ator='$_SESSION[id_ator]'";
        $consulta_login = mysql_query($sql_login);
        $logado = "logado";
        $_SESSION["logado"] = $logado;
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="refresh" content = "600; url=https://www.hotboys.com.br/admin/login/includes/sair.php">
        <link rel="stylesheet" href="assets\css\estilo.css">
        <link rel="stylesheet" href="assets\css\painel.css">
        <title>🔓 🌶 Painel do Usuario | User Painel</title>
    </head>
    <body>
        <header class="cabecalho">
            <div class="topo" style="display: flex;">
                <a>
                    <img src="https://server2.hotboys.com.br/arquivos/81e8c_logo-fundo-preto.png" alt="HotBoys">
                </a>
    <?php if($detect->isMobile()){ ?>
                <h2 style="color: white;position: relative;left: 265px;top: -10px;">🔥O Site Mais Quente Da Net!🔥</h2>
    <?php }else{ ?>
                <h2 style="color: white;position: relative;left: 285px;top: -10px;">🔥O Site Mais Quente Da Net!🔥</h2>
    <?php } ?>
            </div>
        </header>
        <nav class="menuTopo">
            <a href="painel.php"><b>Início</b></a>
<?php if($_SESSION["permissao"] == "Master"){ ?><a href="cadastrar-ator.php"><b>Cadastrar Ator</b></a> <?php } ?>
            <a href="#"><b>Editar Perfil</b></a>
            <a href="includes/sair.php"><b>Sair</b></a>
        </nav>
        <main class="conteudo">
            <table style="color:white;">
                <tr>
                    <th>Nome</th>
                    <th>Telefone</th>
                    <th>WhatsApp</th>
                    <th>Estado</th>
                    <th>Status</th>
                    <th>IP</th>
                    <th>Data Login</th>
                </tr>
                <tr>
                    <td><?= $consulta_ator["nome"];?></td>
                    <td><?= $consulta_ator["telefone"];?></td>
                    <td><?= $consulta_ator["whatsapp"];?></td>
                    <td><?= $consulta_ator["estado"];?></td>
                    <td><?= $consulta_ator["status"];?></td>
                    <td><?= $_SESSION["ip"];?></td>
                    <td><?= $_SESSION['login'];?></td>
                </tr>
            </table>
        </main>
        <footer class="rodape">
            <div class="logotipo">
                <a>
                    <img src="https://www.hotboys.com.br/imagens/logos/logo-rodape-escuro.png" alt="rodape fixo Hotboys" style="position: relative;top: 22px;width: 380px;">
                </a>
                <a>
                    <img style="background-image: url(https://www.hotboys.com.br/imagens/assine/icones/sprites-01.png); position: relative; top: -30px; width: 200px; height: 40px; background-position: 0 -122px; display: block; margin: 0 auto;">
                </a>
            </div>
        </footer>
        <footer class="rodape2">
            <div style="text-align-last: center;">
                <img src="https://www.hotboys.com.br/imagens/rodape/site-responsivo.png" style="margin:8px; position:relative; right: 100px;" alt="Hotboys Responsive">
                <img src="https://www.hotboys.com.br/imagens/rodape/formas-pagamento.png" style="margin:8px;" alt="Hotboys Cards">
                <img src="https://www.hotboys.com.br/imagens/rodape/site-seguro.png" style="margin:8px; position:relative; left: 100px;" alt="Hotboys 100% Seguro">
            </div>
        </footer>
    </body>
</html>