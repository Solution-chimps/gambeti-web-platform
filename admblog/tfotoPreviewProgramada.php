<?
require"../scripts/conecta.php";
$id=$_GET["id"];

if($id==""){
			echo"<script>alert('Nenhum campo pode ficar em branco.')</script><script>history.go(-1);</script>";
}
else
{
						
		
$end=$_FILES['foto']['name'];
$uploaddir = "../uploads/";
$uploadfile = $uploaddir . $_FILES['foto']['name'];

if($end==""){
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

			$consultab="UPDATE noticiasprog SET preview='$novo_nome' WHERE id='$id'";
			if($resultadob=mysql_query($consultab))
			{
			echo"<script>alert('Foto alterada com sucesso!')</script><script>window.close()</script>";
			}
			else
			{
			echo"<script>alert('Foto não encontrada! Impossível alterar no banco')</script><script>history.go(-1);</script>";
			}	
}
}//fechamento if foto vazia
?>