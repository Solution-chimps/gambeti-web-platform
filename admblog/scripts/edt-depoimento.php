<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];
	
	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);


	$depoimento=$_POST["depoimento"];
		$depoimento=str_replace("\"","&#34",$depoimento);								
		$depoimento=str_replace("'","&#39",$depoimento);				






	$consultab="UPDATE depoimentos SET nome='$nome', depoimento='$depoimento' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../depoimentos.php?id=$id';</script>";



























	
	

?>