<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];

	$exibir=$_POST["exibir"];
		$exibir=str_replace("\"","&#34",$exibir);								
		$exibir=str_replace("'","&#39",$exibir);


	$largura=$_POST["largura"];
		$largura=str_replace("\"","&#34",$largura);								
		$largura=str_replace("'","&#39",$largura);

	$altura=$_POST["altura"];
		$altura=str_replace("\"","&#34",$altura);								
		$altura=str_replace("'","&#39",$altura);


	
	

	$link=$_POST["link"];
		$link=str_replace("\"","&#34",$link);								
		$link=str_replace("'","&#39",$link);


			

$datahj=date('YmdHis');
$randomico=rand(0,9999);
$novocookie=$datahj.$randomico;



	$consultab="UPDATE popup SET link='$link', exibir='$exibir', cookie='$novocookie', largura='$largura', altura='$altura' WHERE id='1'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../popup.php';</script>";



























	
	

?>