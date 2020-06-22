<?php
        /*
         * Rodar script todo dia as 8hrs da manhã
         */
        set_time_limit(0);
        require('../../config/configuracoes.php');


        $idEmail = addslashes(base64_decode($_GET[idEmail]));
        $email = addslashes(base64_decode($_GET[email]));


        $queryVer = "SELECT * FROM `mysubscribers` WHERE idEmail='$idEmail' AND email='$email'";
        $consultaVer = mysql_query($queryVer);
        $totalVer = mysql_num_rows($consultaVer);

        if($totalVer != 1){
            header("Location: ".URL);
            exit();
        }

        $dados = mysql_fetch_array($consultaVer);



        #####Confirmou exclusão do e-mail
        if($_GET[excluirEmail]=='sim'){
            $queryExcluir = "DELETE FROM `mysubscribers` WHERE idEmail='$idEmail' AND email='$email' LIMIT 1";
            mysql_query($queryExcluir);

            $excluiu = true;
        }







        $nome = utf8_decode($dados[name]);
        $nome = strtolower($nome);
        $nome = ucwords($nome);



?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Excluir E-mail Newsletter | Hotboys</title>


    <?php
        if($excluiu){
            echo '<script>alert("O seu e-mail foi excluído do nosso banco de dados!");</script>';
            echo '<script>window.location = "'.URL.'";</script>';
        }
    ?>

</head>
<body style="margin:0px; background: #f8f8f8; ">
<div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
    <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
        <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
            <tbody>
            <tr>
                <td style="vertical-align: top; padding-bottom:30px;" align="center">
                    <a href="https://www.hotboys.com.br" target="_blank">
                        <img src="<?php echo URL ?>includes/newsletter/logo.png" alt="Hotboys - www.hotboys.com.br" title="Hotboys - www.hotboys.com.br" style="border:none"><br/>
                    </a>
                </td>
            </tr>
            </tbody>
        </table>
        <div style="padding: 40px; background: #fff;">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                <tbody>
                <tr>
                    <td>
                        <b>Olá <?php echo $nome ?>!</b>
                        <p>Sentimos muito em saber que você não esteja gostando dos e-mails que estamos enviando.<br>
                        Para confirmar a exclusão do seu e-mail clique no botão abaixo.
                        </p>

                        <a href="<?php echo URL ?>includes/newsletter/excluir-email.php?idEmail=<?php echo base64_encode($dados[idEmail]) ?>&email=<?php echo base64_encode($dados[email]) ?>&excluirEmail=sim" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #00c0c8; border-radius: 60px; text-decoration:none;">Confirmar exclusão do e-mail</a>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>



