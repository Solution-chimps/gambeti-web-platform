<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	

	$id=$_GET["id"];
	
	$titulo=$_POST["titulo"];
		$titulo=str_replace("\"","&#34",$titulo);								
		$titulo=str_replace("'","&#39",$titulo);
		$titulo=str_replace("\n","<br />",$titulo);	
		
	$subtitulo=$_POST["subtitulo"];
		$subtitulo=str_replace("\"","&#34",$subtitulo);								
		$subtitulo=str_replace("'","&#39",$subtitulo);
		$subtitulo=str_replace("\n","<br />",$subtitulo);			
		
	$linkx=$_POST["linkx"];
		$linkx=str_replace("\"","&#34",$linkx);								
		$linkx=str_replace("'","&#39",$linkx);
		$linkx=str_replace("\n","<br />",$linkx);	




	$consultab="UPDATE destaques SET titulo='$titulo', subtitulo='$subtitulo', linkx='$linkx' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../destaques.php';</script>";



























	
	

?>