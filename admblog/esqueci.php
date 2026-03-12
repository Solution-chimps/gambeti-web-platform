<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="default/favicon.ico" />
<link rel="icon" href="default/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de Administração - Esqueci minha Senha</title>
</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<body>
<?php
	$urlretorno=$_GET["retorno"];	
		$urlretorno=addslashes($urlretorno); 	
?>

<table width="100%" height="100%" border="0" style="font:normal 10px Arial, Helvetica, sans-serif;">
	<tr>
    	<td align="center" valign="top">
        
        <table>
        	<tr>
            	<td align="center" valign="middle"><img src="default/logo.png" /></td>
            </tr>
        	<tr>
            	<td class="caixalogin" width="340">
                <h1><center>Esqueci minha senha</center></h1>
                <form name="login" id="login" action="scripts/e.php?retorno=<?=$urlretorno?>" method="post">
                <input type="text" name="login" class="configcampo" placeholder="E-mail" value="E-mail"  onclick="if (this.value == 'E-mail') { this.value = ''; }" onBlur="if (this.value == '') { this.value = 'E-mail'; }"/ /><br />
				<p align="right">
                	<input type="submit" class="btlaranja" value="Recuperar" style="height:40px" />
				</p>
                </form>
                
                <a href="login.php" style="font:normal 10px Arial, Helvetica, san