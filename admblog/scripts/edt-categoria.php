<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];
	

	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);		
		$urlcriada=transf_url($nome);		
		


	$destaque=$_POST["destaque"];
		$destaque=str_replace("\"","&#34",$destaque);								
		$destaque=str_replace("'","&#39",$destaque);		


	//alterar destaque
	$consultab="UPDATE categorias SET ordem='0' WHERE ordem='$destaque'";
	if($resultadob=mysql_query($consultab)){
	}
	else{
		echo"<script>alert('Erro ao alterar o destaque.\\nTente novamente!');</script><script>history.go(-1);</script>";
		exit;
	}	
			





	$consultab="UPDATE categorias SET nome='$nome', ordem='$destaque', urlamigavel='$urlcriada' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../categorias.php';</script>";



























	
	

?>