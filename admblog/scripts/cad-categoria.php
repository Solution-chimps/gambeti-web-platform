<?php
	require"verifica.php";
	require"pegarDados2.php";
	
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);
		$urlcriada=transf_url($nome);		


	$destaque=$_POST["destaque"];


	$end=$_FILES['logo']['name'];	
	$uploaddir = "../../imagens/";
	$uploadfile = $uploaddir . $_FILES['logo']['name'];

		$tipo = $_FILES['logo']['type'];
		$tamanho = $_FILES['logo']['size'];	
		
		if(($tipo=="image/jpeg")||($tipo=="image/png")||($tipo=="image/gif")){

			
	if(move_uploaded_file($_FILES['logo']['tmp_name'],$uploadfile))
		{

$diaHoje=date("d");
$mesHoje=date("m");
$anoHoje=date("Y");
$horaHoje=date("h");
$minutoHoje=date("i");
$segundoHoje=date("s");

$numerorandomico=rand(0,999999);
	$numerorandomico=$numerorandomico.$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje;
$extensaodoarquivo=strtolower(end(explode(".", $_FILES['logo']['name'])));

$novo_nome=$numerorandomico.".".$extensaodoarquivo;
rename("../../imagens/$end","../../imagens/".$novo_nome);


		}
		}


	
	//alterar destaque
	$consultab="UPDATE categorias SET ordem='0' WHERE ordem='$destaque'";
	
	if($resultadob=mysql_query($consultab)){
	}
	else{
		echo"<script>alert('Erro ao alterar o destaque.\\nTente novamente!');</script><script>history.go(-1);</script>";
		exit;
	}	
	
			$identificadornot=rand(0,999999);
			$identificadornot=$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje.$identificadornot;
			$consulta="INSERT INTO categorias (nome, urlamigavel, imgcapa, ordem) VALUES ('$nome', '$urlcriada', '$novo_nome', '$destaque')";
			if($resultado=mysql_query($consulta)){
				


										
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../categorias.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>