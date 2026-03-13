<?php
	ob_start();
	session_start();
	$usuarioSession=$_SESSION[usuario];

	require"../../scripts/conecta.php";
	$consulta= "SELECT *FROM usuarios WHERE id='$usuarioSession'";
	$resultado = $mysqli->query($consulta) or die("Falha na execução da consulta");
	if($linha=mysql_fetch_assoc($resultado))
	{
		$idUsuario=$linha["id"];	
		$nomeUsuario=$linha["nome"];	
		$loginUsuario=$linha["email"];	
				

	}
	else{
			echo"<script>alert('Não foi possível retornar ID do usuário. Tente novamente!');</script><script>window.location='login.php';</script>";
	}	
	
?>