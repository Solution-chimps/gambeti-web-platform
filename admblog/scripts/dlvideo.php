<?
	require"verifica.php";
	require"pegarDados2.php";	
require"../../scripts/conecta.php";
$id=$_GET['id'];

$consulta="DELETE FROM videos WHERE id='$id'";
if($resultado=mysql_query($consulta))
{
	
echo"<script>alert('DELETADO Com Sucesso!');</script><script>window.location='../videos.php';</script>";
}
else
{
echo"<script>alert('Erro ao DELETAR!');</script><script>history.go(-1);</script>";
}



?>