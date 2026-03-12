<?
	require"scripts/verifica.php";
	require"scripts/pegarDados.php";
require"../scripts/conecta.php";

				$idfoto=$_GET["id"];	
			


if($idUsuario==""){
			echo"<script>alert('Nenhum campo pode ficar em branco.')</script><script>history.go(-1);</script>";
}
else
{
		
	$end=$_FILES['foto']['name'];	
	$uploaddir = "../imagens/";
	$uploadfile = $uploaddir . $_FILES['foto']['name'];

		$tipo = $_FILES['foto']['type'];
		$tamanho = $_FILES['foto']['size'];	
		
		if(($tipo=="image/jpeg")||($tipo=="image/png")||($tipo=="image/gif")){

			
	if(move_uploaded_file($_FILES['foto']['tmp_name'],$uploadfile))
		{

$diaHoje=date("d");
$mesHoje=date("m");
$anoHoje=date("Y");
$horaHoje=date("h");
$minutoHoje=date("i");
$segundoHoje=date("s");

$numerorandomico=rand(0,999999);
	$numerorandomico=$numerorandomico.$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje;
$extensaodoarquivo=strtolower(end(explode(".", $_FILES['foto']['name'])));

$novo_nome=$numerorandomico.".".$extensaodoarquivo;
rename("../imagens/$end","../imagens/".$novo_nome);


		}

			$consultab="UPDATE paginas SET foto='$novo_nome' WHERE id='$idfoto'";
			if($resultadob=mysql_query($consultab))
			{
			echo"<script>alert('Foto alterada com sucesso!')</script><script>window.close()</script>";
			}
			else
			{
			echo"<script>alert('Foto não encontrada! Impossível alterar no banco')</script><script>history.go(-1);</script>";
			}	

		}//fechamento else valida tipo
		
		//else validacao tipo e tamanho do arquivo
		else{
			echo"<script>alert('Escolha uma foto.')</script><script>history.go(-1);</script>";
			$novo_nome="";	
		}
		

				
	/*	
$end=$_FILES['foto']['name'];
$uploaddir = "../uploads/";
$uploadfile = $uploaddir . $_FILES['foto']['name'];

if($end==""){
			echo"<script>alert('Escolha uma foto.')</script><script>history.go(-1);</script>";	
}
else{

if(move_uploaded_file($_FILES['foto']['tmp_name'],$uploadfile))
{
echo"Img enviada";
$numerorandomico=rand(0,9999);
$novo_nome=$numerorandomico.$_FILES['foto']['name'];
$novo_nome=str_replace(" ","",$novo_nome);
$novo_nome=str_replace("-","",$novo_nome);
$novo_nome= strtolower($novo_nome);

rename("../uploads/$end","../uploads/".$novo_nome);
}
else
{
echo"ERRO";
}

*/


}

?>