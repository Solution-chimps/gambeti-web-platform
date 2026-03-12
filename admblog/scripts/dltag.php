<?
require"../../scripts/conecta.php";
$id=$_GET['id'];

$consulta="DELETE FROM tags WHERE id='$id'";
if($resultado=mysql_query($consulta))
{
	//deleto todas marcacoes
	$consulta="DELETE FROM tagiado WHERE idtag='$id'";
	if($resultado=mysql_query($consulta)){
	}
	else{
		echo"<script>alert('Erro ao DELETAR Tagiado!');</script><script>history.go(-1);</script>";
	}

echo"<script>alert('DELETADO Com Sucesso!');</script><script>window.location='../tags.php';</script>";
}
else
{
echo"<script>alert('Erro ao DELETAR!');</script><script>history.go(-1);</script>";
}



?>