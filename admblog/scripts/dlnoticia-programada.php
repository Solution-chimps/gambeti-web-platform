<?
require"../../scripts/conecta.php";
$id=$_GET['id'];

$consulta="DELETE FROM noticiasprog WHERE id='$id'";
if($resultado=mysql_query($consulta))
{

	$consulta="DELETE FROM tagiadoprog WHERE idnot='$id'";
	if($resultado=mysql_query($consulta)){
	}
	else{
		echo"<script>alert('Erro ao DELETAR Tagiado!');</script><script>history.go(-1);</script>";
	}
	
echo"<script>alert('DELETADO Com Sucesso!');</script><script>window.location='../noticias-programadas.php';</script>";
}
else
{
echo"<script>alert('Erro ao DELETAR!');</script><script>history.go(-1);</script>";
}



?>