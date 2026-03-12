<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];
	

	$link=$_POST["link"];
		$link=str_replace("\"","&#34",$link);								
		$link=str_replace("'","&#39",$link);
	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);		


			





	$consultab="UPDATE clientes SET link='$link', nome='$nome' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../editar-cliente.php?id=$id';</script>";



























	
	

?>