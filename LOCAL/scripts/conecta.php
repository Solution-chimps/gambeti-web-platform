<?php


$servidor_bd = 'localhost';
$usuario_bd = 'root';
$senha_bd = '';
$banco_bd = 'gambeti';
// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli($servidor_bd, $usuario_bd, $senha_bd, $banco_bd);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

/*
$servidor_bd = 'localhost';
$usuario_bd = 'gamb_ubd';
$senha_bd = '[rfr.DEV!124]';
$banco_bd = 'gamb_bd';
// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli($servidor_bd, $usuario_bd, $senha_bd, $banco_bd);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());
*/
?>