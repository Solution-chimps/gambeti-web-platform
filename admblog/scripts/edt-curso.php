<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];
	
	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);


	$datae=$_POST["datae"];
		$datae=str_replace("\"","&#34",$datae);								
		$datae=str_replace("'","&#39",$datae);				

	$dtexpiracao=$_POST["dtexpiracao"];
		$dtexpiracao=formataDataInvertida($dtexpiracao);							

	$dtlimiteinscr=$_POST["dtlimiteinscr"];
		$dtlimiteinscr=formataDataInvertida($dtlimiteinscr);

	$senha=$_POST["senha"];
		$senha=str_replace("\"","&#34",$senha);								
		$senha=str_replace("'","&#39",$senha);										

$valor=$_POST["valor"];
	$valor=str_replace(",",".",$valor);
	$valor=str_replace("R$ ","",$valor);	

	$duracaocert=$_POST["duracaocert"];
		$duracaocert=str_replace("\"","&#34",$duracaocert);								
		$duracaocert=str_replace("'","&#39",$duracaocert);										


	$localcert=$_POST["localcert"];
		$localcert=str_replace("\"","&#34",$localcert);								
		$localcert=str_replace("'","&#39",$localcert);										


	$datacert=$_POST["datacert"];
		$datacert=str_replace("\"","&#34",$datacert);								
		$datacert=str_replace("'","&#39",$datacert);										


	$parcelamento=$_POST["parcelamento"];
		$parcelamento=str_replace("\"","&#34",$parcelamento);								
		$parcelamento=str_replace("'","&#39",$parcelamento);

	$descontoavista=$_POST["descontoavista"];
		$descontoavista=str_replace("\"","&#34",$descontoavista);								
		$descontoavista=str_replace("'","&#39",$descontoavista);

	$valoravista=$_POST["valoravista"];
		$valoravista=str_replace(",",".",$valoravista);
		$valoravista=str_replace("R$ ","",$valoravista);	


	$descricao=$_POST["descricao"];
		$descricao=str_replace(",",".",$descricao);
		$descricao=str_replace("R$ ","",$descricao);	


	$inscricao=$_POST["inscricao"];
		$inscricao=str_replace(",",".",$inscricao);
		$inscricao=str_replace("R$ ","",$inscricao);	


	$destino=$_POST["destino"];
		$destino=str_replace(",",".",$destino);
		$destino=str_replace("R$ ","",$destino);	
			


	$consultab="UPDATE cursos SET nome='$nome', datae='$datae', dtexpiracao='$dtexpiracao', dtlimiteinscr='$dtlimiteinscr', senha='$senha', valor='$valor', duracaocert='$duracaocert', localcert='$localcert', datacert='$datacert', parcelamento='$parcelamento', descontoavista='$descontoavista', valoravista='$valoravista', descricao='$descricao', inscricao='$inscricao', destino='$destino' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../cursos.php';</script>";



























	
	

?>