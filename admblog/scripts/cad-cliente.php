<?php
	require"verifica.php";
	require"pegarDados2.php";
	
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);

	$link=$_POST["link"];
		$link=str_replace("\"","&#34",$link);								
		$link=str_replace("'","&#39",$link);


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


	

			$identificadornot=rand(0,999999);
			$identificadornot=$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje.$identificadornot;
			$consulta="INSERT INTO clientes (logo, nome, link) VALUES ('$novo_nome', '$nome', '$link')";
			if($resultado=mysql_query($consulta)){
				


										
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../clientes.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>