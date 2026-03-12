<?php
require"../scripts/verifica.php";
require"../../scripts/conecta.php";

$dataHoje=date("Y-m-d");
$horaHoje=date("H:i:s");

$totalMusicas=$_POST["totalMusicas"];
//echo"$totalMusicas";
$musicasEnviadas="0";

for($c=1;$c<=$totalMusicas;$c++){

	$ignorar=$_POST["ignorar$c"];
	$identificador=$_POST["identificador$c"];
	$endereco=$_POST["musica$c"];	

	$nome=$_POST["nome$c"];		
	$interprete=$_POST["interprete$c"];	
	$classificacao=$_POST["classificacao$c"];	
	$genero=$_POST["genero$c"];	

	$nome=str_replace("'","",$nome);
	$nome=str_replace("\"","",$nome);	
	$nome=htmlentities($nome);
	$interprete=str_replace("'","",$interprete);
	$interprete=str_replace("\"","",$interprete);	
	$interprete=htmlentities($interprete);	
	$classificacao=str_replace("'","",$classificacao);
	$classificacao=str_replace("\"","",$classificacao);	
	$classificacao=htmlentities($classificacao);	
	$genero=str_replace("'","",$genero);
	$genero=str_replace("\"","",$genero);	
	$genero=htmlentities($genero);	
	
	if($nome==""){
		$nome="Desconhecido";
	}
	if($interprete==""){
		$interprete="Desconhecido";
	}
	if($classificacao==""){
		$classificacao="1";
	}
	if($genero==""){
		$genero="Desconhecido";
	}
	
	if($ignorar=="s"){
	$consulta="DELETE FROM fotos WHERE identificador='$identificador'";
	if($resultado=mysql_query($consulta))
	{
		unlink("../../imagens/".$endereco);
	}
	else
	{
		echo"<script>alert('Erro ao DELETAR arquivo do banco DELETAR. Favor contatar o ADM imediatamente!');</script><script>window.close();</script>";
	}

	}
	else{

		

		
$consulta="UPDATE fotos SET descricao='$nome', foto='$endereco' WHERE identificador='$identificador'";
if($resultado=mysql_query($consulta))
{
$musicasEnviadas++;



}
else
{
echo"<script>alert('ERRO AO SALVAR NO BANCO. Verifique o nome do arquivo, título, ou autor. O mesmo não pode conter aspas.')</script><script>history.go(-1);</script>";
}	
	
	
	}//fechamento valdiacao do ignorar

}//fechamento for


echo"<script>alert('$musicasEnviadas arquivos enviados com sucesso!');</script><script>history.go(-3);</script>";

?>