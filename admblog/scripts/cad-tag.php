<?php
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$nome=$_POST["nome"];
		$urlcriada=transf_url($nome);		
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);	

if($nome==""){
	echo"<script>alert('O campo Nome não podem ficar em branco!');history.go(-1);</script>";
}
else{




			$consulta="INSERT INTO tags (nome, urlamigavel) VALUES ('$nome', '$urlcriada')";
			if($resultado=mysql_query($consulta)){
				


						echo"<script>alert('Tag cadastrada com sucesso.');</script><script>window.location='../tags.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			







}//fechamento else valida campo vaio



























	
	

?>