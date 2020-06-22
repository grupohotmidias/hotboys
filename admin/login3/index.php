<?php 

    require_once('../../mobili/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="assets\css\estilo.css">
        <title>🔒 🌶 Início | Login</title>
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
                <h2 style="color: white;position: relative;left: 318px;top: -10px;">🔥O Site Mais Quente Da Net!🔥</h2>
    <?php } ?>
            </div>
        </header>
        <header class="faixa">

        </header>
        <main class="conteudo">
    <?php if($detect->isMobile()){ ?>
            <div class="logar">
                <form action="includes/conecta.php" method="POST" class="logando" style="display: grid;border: 1px solid white;padding: 1%;vertical-align: middle;margin: 40% 24% 5% 23%;">
                    <label for="login" style="font-size: 4rem;text-align: center;">
                        Account:&nbsp;&nbsp;
                        <input type="text" id="login" name="conta" class="login" style="height: 70px;width: 100%;">
                    </label>
                    <br>
                    <label for="senha" style="font-size: 4rem;text-align: center;">
                        Password:
                        <input type="password" id="senha" name="senha" class="senha" style="height: 70px;width: 100%;">
                    </label>
                    <br>
                    <br>
                    <?php 
                        if(isset($_GET['msg'])){ $msg=$_GET['msg']; echo "<p style='color: white;'>$msg</p>"; }
                    ?>
                    <button type="submit" class="btn" name="enviar" value="enviar" style="height: 56px;width: 100%;font-size: 3rem;">LOGAR</button>
                </form>
            </div>
    <?php }else{ ?>
            <div class="logar">
                <form action="includes/conecta.php" method="POST" class="logando">
                    <label for="login">
                        Account:&nbsp;&nbsp;
                        <input type="text" id="login" name="conta" class="login">
                    </label>
                    <br>
                    <label for="senha">
                        Password:
                        <input type="password" id="senha" name="senha" class="senha">
                    </label>
                    <br>
                    <?php 
                        if(isset($_GET['msg'])){ $msg=$_GET['msg']; echo "<p style='color: white;'>$msg</p>"; }
                    ?>
                    <button type="submit" class="btn" name="enviar" value="enviar">LOGAR</button>
                </form>
            </div>
    <?php } ?>
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