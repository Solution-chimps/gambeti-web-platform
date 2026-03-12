<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="default/favicon.ico" />
<link rel="icon" href="default/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de Administração</title>
</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<body>
<?php
$pagina=$_GET['continue'];
$erro=$_GET['erro'];
	if($erro=="1"){
		$msgerro="Preencha todos os campos";
	}
	if($erro=="2"){
		$msgerro="Dados incorretos";
	}	
?>
<table width="100%" height="100%" border="0" style="font:normal 10px Arial, Helvetica, sans-serif;">
	<tr>
    	<td align="center" valign="top">
        
        <table>
        	<tr>
            	<td align="center" valign="middle"><br /><img src="default/logo.png" /><br /><br /></td>
            </tr>
        	<tr>
            	<td class="caixalogin" width="340">
                <h1><center>Painel de Administração</center></h1>
                <form action="scripts/logar.php?continue=<?=$pagina?>" method="post">
                E-mail: <input type="text" name="login" class="configcampocima" placeholder="E-mail"/><br />
                Senha: <input type="password" name="senha" class="configcampobaixo" placeholder="Senha"/><br />
				<br /><?=$msgerro?><br />
                <p align="right">
                	<input type="submit" class="btlaranja" value="Entrar" style="height:40px" />
				</p>
                </form>
                    
				<a href="esqueci.php" style="font:normal 10px Arial, Helvetica, sans-serif;color:#999;">[?] Esqueci minha senha</a>               

                </td>
            </tr>            
        </table>
        
        <br />
        Painel desenvolvido por: <a href="http://www.piovezam.com">Piovezam Soluções Web</a></td>
    </tr>
</table>

</body>
</html>