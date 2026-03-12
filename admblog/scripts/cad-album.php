<?php
	require"verifica.php";
	require"pegarDados2.php";
	
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	


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



			$identificadornot=rand(0,999999);
			$identificadornot=$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje.$identificadornot;
			$consulta="INSERT INTO albuns (nome, urlamigavel, data, ordem, nomecategoria, urlcategoria, idcategoria) VALUES ('$nome', '$urlcriada', '$data', '$destaque', '$nomedacategoria', '$urldacategoria', '$categoria')";
			if($resultado=mysql_query($consulta)){
				


										
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../fotos.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>