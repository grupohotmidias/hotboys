<?php

session_start();
$user = $_SESSION['users'];

	
if ($conexaoMysql_hot->connect_error) {
    die("A conexão falhou: " . $conexaoMysql_hot->connect_error);
}

if(isset($_POST['submitBtn'])) { //o envio do formulário aconteceu aqui

    if(isset($_POST['on-off'])){                       
        $query = "UPDATE usuarios_perfil SET auth = 'checked' WHERE username = '$user'";
    } else {
        $query = "UPDATE login_users SET auth = 'no' WHERE username = '$user'";
    }

    if ($conexaoMysql_hot->query($query)) {
        echo "Atualizado com sucesso";
    } else {
        echo "Erro: " . $query . "<br>" . $conexaoMysql_hot->error;
    }

} else {
    echo "Erro de envio de formulário";
}

$conexaoMysql_hot->close();

?>

