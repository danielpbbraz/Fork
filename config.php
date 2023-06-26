<?php

$dbHost = '172.18.0.1:33060';
$dbUsername = 'arqmedes_alpha';
$dbPassword = '12345678';
$dbName = 'arqmedes_alpha_test';

$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

// if($conexao->connect_errno)
// {
//     echo "Erro na conexão com o banco";
//     //var_dump($conexao);
// }
// else
// {
//     echo "Conexão efetuada com sucesso";
// }

?>