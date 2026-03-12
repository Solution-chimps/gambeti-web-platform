<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

	$id=$_GET["id"];




	$consultab="UPDATE inscritos SET statuspg='Paga' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../inscritos.php';</script>";



























	
	

?>