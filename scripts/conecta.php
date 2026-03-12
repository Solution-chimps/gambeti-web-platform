<?php


$servidor_bd = 'localhost';
$usuario_bd = 'gamb_ubd';
$senha_bd = '[rfr.DEV!124]';
$banco_bd = 'gamb_bd';
// Conecta-se ao banco de dados MySQL
$mysqli = new mysqli($servidor_bd, $usuario_bd, $senha_bd, $banco_bd);
// Caso algo tenha dado errado, exibe uma mensagem de erro
if (mysqli_connect_errno()) trigger_error(mysqli_connect_error());

$link = mysql_connect("localhost", "gamb_ubd", "[rfr.DEV!124]") or die("Não foi possível conectar o banco de dados");
mysql_select_db("gamb_bd") or die("Não foi possível selecionar o banco de dados");


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