<?php
        /*
         * Rodar script todo dia as 8hrs da manhã
         */
        set_time_limit(0);
        require('../../config/configuracoes.php');
        require 'vendor/autoload.php';


        use PHPMailer\PHPMailer\PHPMailer;




        $dia = date('d');
        $mes = date('m');

        $queryAniversariantes = "SELECT * FROM `mysubscribers` WHERE Month(data_nascimento)='$mes' AND Day(data_nascimento)='$dia'";
        $consultaAniversariantes = mysql_query($queryAniversariantes);
	
		
        $contador = 0;
        while($linha = mysql_fetch_array($consultaAniversariantes)){

            $nome = utf8_decode($linha[name]);
            $nome = strtolower($nome);
            $nome = ucwords($nome);


            $htmlEmail = '
                <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                <html xmlns="http://www.w3.org/1999/xhtml">
                <head>
                <meta name="viewport" content="width=device-width" />
                <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
                <title>Feliz Aniversário '.$nome.'!</title>
                </head>
                <body style="margin:0px; background: #f8f8f8; ">
                <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
                  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
                    <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                      <tbody>
                        <tr>
                          <td style="vertical-align: top; padding-bottom:30px;" align="center">
                              <a href="https://www.hotboys.com.br" target="_blank">
                                <img src="'.URL.'includes/newsletter/logo.png" alt="Hotboys - www.hotboys.com.br" title="Hotboys - www.hotboys.com.br" style="border:none"><br/>
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
                                <b>Feliz Aniversário '.$nome.'!!!</b>
                                <p>Toda a equipe HOTBOYS lhe deseja um ano repleto de prazeres realizados. Parabenizamos deliciosamente mais um ano de vida em sua companhia. É um privilégio imenso fazermos parte dos seus desejos mais íntimos!</p>
                                
                                <p>
                                    <img src="'.URL.'includes/newsletter/img-newsletter.jpg" style="width:100%">
                                </p>
                                
                                <p style="text-align:center">
                                    <a href="https://www.hotboys.com.br" target="_blank" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #e31430; border-radius: 60px; text-decoration:none;">Visite o site Hotboys</a>
                                </p>
                                
                                <p>Continue festejando mais um ano de vida com o site mais quente da net. Assopre as velinhas e deixe que a \'sobremesa\' é por nossa conta!</p>
                                
                                <br>
                                <b>Atenciosamente,</b><br>
                                <b>Equipe Hotboys</b><br>
                                <b>www.hotboys.com.br</b>
                              </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
                      <p>
                          <a href="'.URL.'includes/newsletter/excluir-email.php?idEmail='.base64_encode($linha[idEmail]).'&email='.base64_encode($linha[email]).'" target="_blank" style="color: #b2b2b5; text-decoration: underline;">Não deseja mais receber nossos e-mails?</a> 
                      </p>
                    </div>
                  </div>
                </div>
                </body>
                </html>';



                $mail = new PHPMailer;
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->Host = EMAIL_SERVIDOR;
                $mail->Username = EMAIL_USUARIO;
                $mail->Password = EMAIL_SENHA;
                $mail->Port = EMAIL_PORTA;
                $mail->SMTPSecure = EMAIL_SECURE;
                $mail->CharSet = 'ISO-8859-1';

                $mail->smtpConnect([
                    'ssl' => [
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    ]
                ]);

                $mail->setFrom(EMAIL_USUARIO, 'Equipe Hotboys');
                $mail->addReplyTo('contatos@hotboys.com.br', 'Equipe Hotboys');//responder para

                $mail->addAddress($linha[email]);//destinatário

                $mail->Subject = "Feliz Aniversário ".$nome;
                $mail->Body = $htmlEmail;
                $mail->isHTML(true);

                if ($mail->send()) {
                    echo "ok\n";
                } else {
                    echo "erro\n";
                }

            $contador++;
        }



        echo $contador.' e-mails enviados';




