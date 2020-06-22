<?php

    include("includes/autenticacao.php");
    session_start(); 

    require_once('../../mobili/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();


    include_once('config/conexao.php');

    $editar = $_POST["acao"];

    $senha = $_POST["senha"];
    
    $senhaSegura = md5($senha . '$hotboys$' .$senha);

    if(isset($_POST["acao"]) && $_POST["acao"] == "editar"){
        $sql_trocaSenha = "UPDATE `usuarios_atores` SET `senha`='$senhaSegura' WHERE id_ator='$_SESSION[id_ator]'";
        $consulta_trocaSenha = mysql_query($sql_trocaSenha);
?> 
        <script>
            alert('Senha Alterada com Sucesso');
            location.href='painel.php';
        </script>
<?php    
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
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
        </nav>
        <main class="conteudo">
            <br>
            <form action="" method="POST" class="logando">
                <label>
                    Digite a nova SENHA: <br>
                    <input type="text" name="senha" value="">
                </label>
                <input type="hidden" name="acao" value="editar"><br><br>
                <button type="submit">Trocar Senha</button>
            </form>
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