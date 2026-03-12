<?
	require"verifica.php";
	require"pegarDados2.php";	
require"../../scripts/conecta.php";
$id=$_GET['id'];
$idalbum=$_GET['idalbum'];

$consulta="DELETE FROM fotos WHERE id='$id'";
if($resultado=mysql_query($consulta))
{
	
echo"<script>alert('DELETADO Com Sucesso!');</script><script>window.location='../editar-fotos.php?idalbum=$idalbum';</script>";
}
else
{
echo"<script>alert('Erro ao DELETAR!');</script><script>history.go(-1);</script>";
}



?>