<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="default/favicon.ico" />
<link rel="icon" href="default/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de Administração</title>
<style>
body {
	font-family: "Trebuchet MS", "Helvetica", "Arial",  "Verdana", "sans-serif";
	font-size: 62.5%;
	padding:10px;
}
</style>
<link rel="stylesheet" href="estilos/jquery-ui.css">

<script type="text/javascript" src="scripts/jquery.min.js"></script>
<script src="scripts/jquery-ui.js"></script>



</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<body>
<font style="font-size:18px">
	<form action="scripts/cad-tag-pop.php" method="post">
	Nome da tag:<br />
    <input type="text" style="width:90%" name="nometag" class="configcampo" /><br />
	<input type="submit" value="ADICIONAR TAG" class="btlaranja" />
    </form>
</font>    
</body>
</html>