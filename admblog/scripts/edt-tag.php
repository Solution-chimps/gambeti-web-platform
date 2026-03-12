<?php
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];
	
	$nome=$_POST["nome"];
		$urlcriada=transf_url($nome);		
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);	

if($nome==""){
	echo"<script>alert('O campo Nome não podem ficar em branco!');history.go(-1);</script>";
}
else{

	$consultab="UPDATE tags SET nome='$nome', urlamigavel='$urlcriada' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){
		echo"<script>alert('Editado com sucesso.');</script><script>window.location='../editar-tag.php?id=$id';</script>";
	}
	else{
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	

}






	
	

?>