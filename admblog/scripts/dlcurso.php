<?
	require"verifica.php";
	require"pegarDados2.php";	
require"../../scripts/conecta.php";
$id=$_GET['id'];

//deleto os inscritos desse curso

	
$consulta="DELETE FROM inscritos WHERE idcurso='$id'";
if($resultado=mysql_query($consulta)){
	$consultax="DELETE FROM cursos WHERE id='$id'";
	if($resultadox=mysql_query($consultax)){		
		echo"<script>alert('DELETADO Com Sucesso!');</script><script>window.location='../cursos.php';</script>";
		exit;
	}
	else{
		echo"<script>alert('Erro ao DELETAR!');</script><script>history.go(-1);</script>";
		exit;		
	}
	
}
else{
	echo"<script>alert('Erro ao Inscritos!');</script><script>history.go(-1);</script>";
	exit;
}




?>