<?php
	require"verifica.php";
	require"pegarDados2.php";
	
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	




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
		$descricao=str_replace("\"","&#34",$descricao);								
		$descricao=str_replace("'","&#39",$descricao);
		
$destino=$_POST["destino"];
		$destino=str_replace("\"","&#34",$destino);								
		$destino=str_replace("'","&#39",$destino);
		
$inscricao=$_POST["inscricao"];
		$inscricao=str_replace("\"","&#34",$inscricao);								
		$inscricao=str_replace("'","&#39",$inscricao);
		
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

		




			$consulta="INSERT INTO cursos (nome, datae, dtexpiracao, dtlimiteinscr, senha, valor, duracaocert, localcert, datacert, parcelamento, valoravista, descontoavista, descricao, destino, inscricao, imgdestaque) VALUES ('$nome', '$datae', '$dtexpiracao', '$dtlimiteinscr', '$senha', '$valor', '$duracaocert', '$localcert', '$datacert', '$parcelamento', '$valoravista', '$descontoavista', '$descricao', '$destino', '$inscricao', '$novo_nome')";
			if($resultado=mysql_query($consulta)){
				


										
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../cursos.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>