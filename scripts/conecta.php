<?php
$servidor_bd = 'localhost';
$usuario_bd = 'gamb_ubd';
$senha_bd = '[gbt.TBG!3345123@]';
$banco_bd = 'gamb_bd';
$mysqli = new mysqli($servidor_bd, $usuario_bd, $senha_bd, $banco_bd);

if ($mysqli->connect_errno) {
    die("Erro ao conectar ao banco: " . $mysqli->connect_error);
}
