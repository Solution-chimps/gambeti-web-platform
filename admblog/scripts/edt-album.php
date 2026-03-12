<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

	$id=$_GET["id"];

	$categoria=$_POST["categoria"];
	//descubro nome da categoria
	$consulta= "SELECT *FROM categorias WHERE id='$categoria'";
	$resultado = mysql_query($consulta) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	if($linha=mysql_fetch_assoc($resultado)){
		$nomedacategoria=$linha["nome"];
		$urldacategoria=$linha["nome"];		
	}
	else{
		echo"<script>alert('Categoria não encontrada');</script>";
		exit;
	}

	

	$destaque=$_POST["destaque"];


	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);
		$nome=str_replace("\n","<br />",$nome);	

		$urlcriada=transf_url($nome);		

	$data=$_POST["data"];
		$data=formataDataInvertida($data);


//limpo todos que possuem esse destaque
if($destaque!=0){
	$consultab="UPDATE albuns SET ordem='0' WHERE ordem='$destaque'";
	if($resultadob=mysql_query($consultab)){
	//	echo"Editei infos da OS<br />";
	}
	else{
		//echo"Erro ao editar infos<br />";
		exit;
	}	
	
}


	$consultab="UPDATE albuns SET nome='$nome', data='$data', ordem='$destaque', urlamigavel='$urlcriada', nomecategoria='$nomedacategoria', urlcategoria='$urldacategoria', idcategoria='$categoria' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../fotos.php?id=$id';</script>";



























	
	

?>