<?php
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ver Foto</title>
</head>
<body>
<style>
	body{
		font:normal 12px arial;
		background-image:url(default/fundo.bmp)
	}
	#caixa{
		background-color:#FFFFFF;
		border:solid 1px #999999;
		padding:5px;
	}
</style>

<!-- consulta informacoes de serie -->
			<?php
			
			$id=$_GET["id"];
			
			$consulta= "SELECT *FROM `noticiasprog` WHERE id='$id'";
			$resultado = mysql_query($consulta)	or die("Falha na execução da consulta");
				if($linha=mysql_fetch_assoc($resultado))
				{			

				$preview=$linha["preview"];					
				$autorPreview=$linha["autorPreview"];									
				
				}
						
				
			?>
            <div id="caixa">
            <form action="tfotoPreviewProgramada.php?id=<?=$id?>" method="post" enctype="multipart/form-data">
            <img src="/uploads/<?=$preview?>" height="130"/><br />
            <input type="file" name="foto" />
            	<input type="submit" value="Alterar" />
            </form>
            </div>

</body>
</html>
