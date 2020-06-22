<?php

       require('../config/configuracoes.php');


       #####cadastro de newsletter
       if($_GET['acao']=='newsletter'){
            $email =            trim(addslashes($_POST['email']));
            $nome =             trim(addslashes($_POST['nome']));
            $dataNascimento =   trim(addslashes($_POST['data_nascimento']));

            if($dataNascimento != ''){
                $dataNascimento = explode('/', $dataNascimento);
                $dataNascimento = $dataNascimento[2].'-'.$dataNascimento[1].'-'.$dataNascimento[0];
                $dataNascimento = "'$dataNascimento'";
            } else {
                $dataNascimento = "NULL";
            }


            //verifica se já está cadastrado
            $queryVer = "SELECT * FROM `mysubscribers` WHERE email='$email'";
            $consultaVer  = mysql_query($queryVer);
            $totalVer = mysql_num_rows($consultaVer);

            if($totalVer){
            //email ja existe
                $query = "UPDATE `mysubscribers` SET                
                `name` = '$nome', 
                `data_nascimento` = $dataNascimento 
                WHERE 
                `email` = '$email' LIMIT 1";
            } else {
            //email novo
                $query = "INSERT INTO `mysubscribers` (`idEmail`, `email`, `name`, `data_nascimento`) VALUES (NULL, '$email', '$nome', $dataNascimento);";
            }
            mysql_query($query);




            if($email!='' AND $nome=='' AND $dataNascimento=='NULL'){
            //preencheu apenas o email

                $htmlSaida = '<div class="rodape-newsletter-campo">
                    <input type="text" name="newsletter_rodape_nome" id="newsletter_rodape_nome" placeholder="Nome Completo" required="required" class="form-control" />
                </div>

                <div class="rodape-newsletter-campo">
                    <input type="text" name="newsletter_rodape_nascimento" id="newsletter_rodape_nascimento" placeholder="Data de Nascimento" required="required" pattern="\d*" class="form-control data" />
                </div>
                
                <input type="hidden" name="newsletter_rodape_email" id="newsletter_rodape_email" value="'.$email.'">';
                $mensagem = 1;
            }


           if($email!='' AND $nome!='' AND $dataNascimento!='NULL'){
           //preencheu todos campos
               $htmlSaida = '<div class="rodape-newsletter-sucesso">Seu e-mail foi cadastrado com sucesso!</div>';
               $mensagem = 2;
           }



            $saida['html'] = $htmlSaida;
            $saida['mensagem'] = $mensagem;

            $saida = json_encode($saida);

            echo $saida;
       }

