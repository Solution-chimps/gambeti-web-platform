<?php
	require"verifica.php";
	require"pegarDados2.php";
	
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);


	$depoimento=$_POST["depoimento"];
		$depoimento=str_replace("\"","&#34",$depoimento);								
		$depoimento=str_replace("'","&#39",$depoimento);				





			$consulta="INSERT INTO depoimentos (nome, depoimento) VALUES ('$nome', '$depoimento')";
			if($resultado=mysql_query($consulta)){
				


										
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../depoimentos.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>