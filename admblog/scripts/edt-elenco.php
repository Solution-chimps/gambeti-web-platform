<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];
	
	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);

	$departamento=$_POST["departamento"];
		$departamento=str_replace("\"","&#34",$departamento);								
		$departamento=str_replace("'","&#39",$departamento);

	$contato=$_POST["contato"];
		$contato=str_replace("\"","&#34",$contato);								
		$contato=str_replace("'","&#39",$contato);	


	$sobre=$_POST["sobre"];
		$sobre=str_replace("\"","&#34",$sobre);								
		$sobre=str_replace("'","&#39",$sobre);	


	$missao=$_POST["missao"];
		$missao=str_replace("\"","&#34",$missao);								
		$missao=str_replace("'","&#39",$missao);	





	$consultab="UPDATE elenco SET departamento='$departamento', nome='$nome', contato='$contato', missao='$missao', sobre='$sobre' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../elenco.php?id=$id';</script>";



























	
	

?>