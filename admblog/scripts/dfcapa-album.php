<?
	require"verifica.php";
	require"pegarDados2.php";	
require"../../scripts/conecta.php";
$id=$_GET['id'];
$idalbum=$_GET['idalbum'];

//consulto nome da foto

	$consulta= "SELECT *FROM fotos WHERE id='$id'";
	$resultado = mysql_query($consulta) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	if($linha=mysql_fetch_assoc($resultado)){
		$enderecoimagem=$linha["foto"];
		
			$consultax="UPDATE albuns SET imgcapa='$enderecoimagem' WHERE id='$idalbum'";
			if($resultadox=mysql_query($consultax)){
				echo"<script>alert('Capa definida com sucesso');window.location='../fotos.php';</script>";
				exit;
			}
			else{
				echo"Erro ao definir capa";
				exit;
			}		
	}
	else{
		echo"Erro ao consultar endereço da imagem";
		exit;
	}





?>