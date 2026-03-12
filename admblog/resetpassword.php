<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="shortcut icon" href="default/favicon.ico" />
<link rel="icon" href="default/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Painel de Admnistração - Esqueci minha Senha</title>
</head>
<link rel="stylesheet" href="estilos/padrao.css" />
<body>
<?php
	$codsenha=$_GET["cod"];	
		$codsenha=addslashes($codsenha); 	
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
                <h1><center>Resetar sua senha</center></h1>
                <form name="resetsenha" id="resetsenha" action="scripts/reset.php" method="post">
               <input type="password" name="novasenha" class="configcampo" placeholder="Nova senha" /><br />
				<p align="right">
                	<input type="submit" class="btlaranja" value="Resetar" style="height:40px" />
				</p>
                <input type="hidden" name="codigoidentificador" value="<?=$codsenha?>" />
                </form>
                
                <a href="login.php" style="font:normal 10px Arial, Helvetica, sans-serif;color:#999;">< Voltar para tela de login</a> 
                    
                </td>
            </tr>            
        </table>
        <br />
        Painel desenvolvido por: <a href="http://www.piovezam.com.br">Piovezam Soluçõe Web</a></td>
        </td>
    </tr>
</table>

</body>
</html>