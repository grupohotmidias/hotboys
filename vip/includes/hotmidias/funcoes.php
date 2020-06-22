<?php


		function verificaoPermissaoAcessoContaHotmidias($idSite, $token = null){
            if(!isset($_SESSION)) session_start(); //inicia sessions se ainda não foi feito

		    if($token == null){
		    //usar token que já esta na session
                $definiuNovoToken = false;
		        $token = @$_SESSION['tokenHotmidias'];
            } else {
		    //usar novo token
                $definiuNovoToken = true;
		        $_SESSION['tokenHotmidias'] = $token;
            }

		    if($token != ''){
		    //tem algum token

                if((@$_SESSION['tokenHotmidiasUltimaVerificacao']+3600*1) < time()){
                    //mais de 1 hora que não faz verificação

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, 'https://api.hotmidias.com.br/api/usuario/verificar-permissao-acesso');
                    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 60);
                    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
                    curl_setopt($ch, CURLOPT_HEADER, false);
                    curl_setopt($ch, CURLOPT_POST, true);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, array(
                        'token' => $token,
                        'idSite' => $idSite,
                    ));
                    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/56.0.2924.87 Safari/537.36"); //define navegador
                    $retorno = curl_exec($ch);
                    $retorno = json_decode($retorno);

                    if($retorno->success == true){
                    //pagamento ok
                        $_SESSION['tokenHotmidiasUltimaVerificacao'] = time();
                        $_SESSION['email_cliente_logado'] = $retorno->data->email;
						
						
                        if($definiuNovoToken){
                            header("Location: index.php");
                            exit();
                        }

                    } else {
                    //erro no pagamento
                        header("Location: https://contas.hotmidias.com.br/acesso/".$idSite);
                        exit();
                    }
                } else {
                //fez verificação a menos de 1 hora
                    if($definiuNovoToken){
                        header("Location: index.php");
                        exit();
                    }
                }

            } else {
		    //não tem nenhum token, redireciona para login
		        header("Location: https://contas.hotmidias.com.br/acesso/".$idSite);
                exit();
            }
			
		}
