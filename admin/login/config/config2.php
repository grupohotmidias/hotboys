<?php

$conexao = mysqli_connect("localhost", "c1hotboys", "eF!jr4cZmFGD", "c1hotboys_admin") or die
("Sem acesso ao DB, Entre em contato com o Administrador");

if (!$conexao) {
    echo "Erro: Incapaz de conectar ao Banco de Dados." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}