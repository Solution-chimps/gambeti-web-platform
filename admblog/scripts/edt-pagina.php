<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	

	$texto1=$_POST["texto1"];
		$texto1=str_replace("\"","&#34",$texto1);								
		$texto1=str_replace("'","&#39",$texto1);
		$texto1=str_replace("\n","<br />",$texto1);	
		
	$texto2=$_POST["texto2"];
		$texto2=str_replace("\"","&#34",$texto2);								
		$texto2=str_replace("'","&#39",$texto2);
		$texto2=str_replace("\n","<br />",$texto2);	

	$texto3=$_POST["texto3"];
		$texto3=str_replace("\"","&#34",$texto3);								
		$texto3=str_replace("'","&#39",$texto3);
		$texto3=str_replace("\n","<br />",$texto3);	

	$texto4=$_POST["texto4"];
		$texto4=str_replace("\"","&#34",$texto4);								
		$texto4=str_replace("'","&#39",$texto4);
		$texto4=str_replace("\n","<br />",$texto4);	

	$texto5=$_POST["texto5"];
		$texto5=str_replace("\"","&#34",$texto5);								
		$texto5=str_replace("'","&#39",$texto5);
		$texto5=str_replace("\n","<br />",$texto5);										

	$texto6=$_POST["texto6"];
		$texto6=str_replace("\"","&#34",$texto6);								
		$texto6=str_replace("'","&#39",$texto6);
		$texto6=str_replace("\n","<br />",$texto6);										

	$texto7=$_POST["texto7"];
		$texto7=str_replace("\"","&#34",$texto7);								
		$texto7=str_replace("'","&#39",$texto7);
		$texto7=str_replace("\n","<br />",$texto7);										

	$texto8=$_POST["texto8"];
		$texto8=str_replace("\"","&#34",$texto8);								
		$texto8=str_replace("'","&#39",$texto8);
		$texto8=str_replace("\n","<br />",$texto8);										

			





	$consultab="UPDATE paginas SET texto1='$texto1', texto2='$texto2', texto3='$texto3', texto4='$texto4', texto5='$texto5', texto6='$texto6', texto7='$texto7', texto8='$texto8' WHERE id='1'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	


echo"<script>alert('Editado com sucesso');window.location='../paginas.php?id=$id';</script>";



























	
	

?>