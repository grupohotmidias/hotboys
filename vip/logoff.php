<?php
        session_start();
        $tokenHotmidias = base64_decode($_SESSION['tokenHotmidias']);

        $camposPost = array(
            'api_token' => $tokenHotmidias,
        );


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.hotmidias.com.br/api/usuario/logoff');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $camposPost);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36"); //define navegador
        $retorno = curl_exec($ch);


        unset($_SESSION['tokenHotmidias']);
        unset($_SESSION['tokenHotmidiasUltimaVerificacao']);


        header("Location: https://www.hotboys.com.br");

