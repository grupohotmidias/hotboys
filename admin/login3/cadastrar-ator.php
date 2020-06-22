<?php

    include("includes/autenticacao.php");
    session_start(); 

    require_once('../../mobili/Mobile_Detect.php');
    $detect = new Mobile_Detect;
    $deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');
    $scriptVersion = $detect->getScriptVersion();


    include_once('config/conexao.php');

    $cadastrar = $_POST["acao"];
    $id_ator = $_POST["id_ator"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $conta = $_POST["conta"];
    $senha = $_POST["senha"];
    $permissao = $_POST["permissao"];
    $status = $_POST["status"];
    $salt = "hotboys";
    
    $senhaSegura = md5($senha . '$hotboys$' .$senha);

    if(isset($_POST["acao"]) && $_POST["acao"] == "cadastrar"){
        $sql_cadastro = "INSERT INTO `usuarios_atores` VALUES ('".$id_ator."','".$nome."','".$email."','".$conta."','".$senhaSegura."','".$permissao."','".$status."','','','')";
        $consulta_cadastrar = mysql_query($sql_cadastro);
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
            <a href="painel.php"><b>Início</b></a>
<?php if($_SESSION["permissao"] == "Master"){ ?><a href="#"><b>Cadastrar Ator</b></a> <?php } ?>
            <a href="#"><b>Link</b></a>
            <a href="includes/sair.php"><b>Sair</b></a>
        </nav>
        <main class="conteudo">
            <br>
            <form action="" method="POST" class="logando">
                <label>
                    Numero do Ator / ID : 
                    <input type="text" name="id_ator" placeholder="Id do Ator" required><br><br>
                </label>
                <label>
                    Nome do Ator: <br>
                    <input type="text" name="nome" placeholder="Nome do Ator" required><br><br>
                </label>
                <label>
                    E-mail do Ator: <br>
                    <input type="email" name="email" placeholder="Email do Ator" required><br><br>
                </label>
                <label>
                    Conta para Login: <br>
                    <input type="text" name="conta" placeholder="Conta do Ator" required><br><br>
                </label>
                <label>
                    Permissão de Acesso: <br>
                <select name="permissao" required>
                    <option value="Master">
                        Master
                    </option>
                    <option value="Admin">
                        Admin
                    </option>
                    <option value="Usuario">
                        Usuario
                    </option>
                </select><br><br>
                </label>
                <label>
                    Status da Conta: <br>
                <select name="status" required>
                <option value="Ativo">
                    Ativo
                </option>
                <option value="Inativo">
                    Inativo
                </option>
                </select>
                </label>
                <input type="hidden" name="senha" value="hotboys">
                <input type="hidden" name="acao" value="cadastrar"><br><br>
                <button type="submit">Cadastrar</button>
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