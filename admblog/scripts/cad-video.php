<?php
	require"verifica.php";
	require"pegarDados2.php";
	
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	



	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);
		$nome=str_replace("\n","<br />",$nome);	

	$data=$_POST["data"];
		$data=formataDataInvertida($data);



	$url=$_POST["url"];
		$url=str_replace("\"","&#34",$url);								
		$url=str_replace("'","&#39",$url);
		$url=str_replace("\n","<br />",$url);	



			$consulta="INSERT INTO videos (nome, data, urlyoutube) VALUES ('$nome', '$data', '$url')";
			if($resultado=mysql_query($consulta)){
				


										
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../videos.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>