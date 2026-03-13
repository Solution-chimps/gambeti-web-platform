<?php
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$nometag=$_POST["nometag"];
		$urlcriada=transf_url($nometag);	
	
	if($nometag==""){
		echo"<script>alert('Por favor, insira um nome para a TAG!');history.go(-1)</script>";
	}
	else{
		
		//confiro se a tag ja existe
	$consulta= "SELECT *FROM tags WHERE urlamigavel='$urlcriada'";
	$resultado = $mysqli->query($consulta) or die("<br />Falha na execução da consulta 2. Erro: " . $mysqli_error);	if($linha=mysql_fetch_assoc($resultado))
	{
		echo"<script>alert('Esse TAG já existe!');history.go(-1)</script>";	

	}
	else{
		

	$consulta="INSERT INTO tags (nome, urlamigavel) VALUES ('$nometag', '$urlcriada')";
			if($resultado=mysql_query($consulta))
			{
				echo"<script>alert('Inserido com sucesso!');window.close();window.opener.carregartags();</script>";							
			}
			else{
				echo"<script>alert('Erro ao salvar no banco. Por favor, tente novamente!');</script><script>history.go(-1);</script>";	
			}//fechamento else salvar no banco
	}
	
	}//fechamneot else verifica duplicada
?>