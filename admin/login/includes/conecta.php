<?php 

    session_start();



    include_once('conexao.php');

    $con = new conexao();

    

        $user = $_POST['conta'];

        $senha = $_POST['senha'];



       // $user = preg_replace('/[^[:alnum:]]_.-/','',$user);

        $senha = md5($senha);



        $resultado = $con->login($user, $senha);

        



        if(isset($_POST['conta'],$_POST['senha']) && $_POST['conta'] == "" or $_POST['senha'] == ""){

            $msg = 'Digite uma Conta e Senha';

            header('Location: ../index.php?msg='.$msg);

        }elseif($resultado){



            foreach ($resultado as $dados_user) {

                $_SESSION['nome'] = $dados_user['nome'];

                $_SESSION['email'] = $dados_user['email'];

                $_SESSION['permissao'] = $dados_user['permissao'];

                $_SESSION['status'] = $dados_user['status'];

                $_SESSION['id_ator'] = $dados_user['id_ator'];

            }

            function getUserIP()

            {

                $client  = @$_SERVER['HTTP_CLIENT_IP'];

                $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];

                $remote  = $_SERVER['REMOTE_ADDR'];

                



                if(filter_var($client, FILTER_VALIDATE_IP))

                {

                    $ip = $client;

                }

                elseif(filter_var($forward, FILTER_VALIDATE_IP))

                {

                    $ip = $forward;

                }

                else

                {

                    $ip = $remote;

                }

        

                return $ip;

            }

            $user_ip = getUserIP();

            $_SESSION['ip'] = $user_ip;

            

            function getLogin()

            {

                $login = date('Y-m-d H:i:s');



                return $login;

            }

            $data_login = getLogin();

            $_SESSION['login'] = $data_login;



            if(isset($senha) && $senha == "bc4a54d8d49d601f3ca69014d7d1960c"){ 

?>

                <script>

                    alert('Verificamos que esse é seu primeiro login, pedimos altere sua senha por medidas de segurança.');

                    location.href='../trocar-senha2.php';

                </script>

<?php

            

            }else{

            header('Location: ../painel/');

            }



        }else{

            $msg = 'Login ou Senha Inválidos';

            header('Location: ../index.php?msg='.$msg);

        }

    

?>