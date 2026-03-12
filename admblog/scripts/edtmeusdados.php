<?php
	require"../scripts/verifica.php";
	require"../scripts/pegarDados2.php";	
	require"bcrypt.php";	
?>
<?
require"../../scripts/conecta.php";
require"../scripts/funcoes.php";

$nome=$_POST["nome"];
		$nome=addslashes($nome); 
$email=$_POST["email"];
		$email=addslashes($email); 
$senha=$_POST["senha"];
		$senha=addslashes($senha); 

if($senha==""){
}
else{
	$senhacript=crypt($senha, $hash);
	//$senhacript=Bcrypt::hash($senha);
	$complemento=", senha='$senhacript'";	
}




	$nome=aspasemasci($nome);
	$email=aspasemasci($email);
	$senha=aspasemasci($senha);



if(($nome=="")||($email=="")){
	echo"<script>alert('Os campos Nome, E-mail, Senha não podem ficar em branco!');history.go(-1);</script>";
}
else{
	

	$consultab="UPDATE usuarios SET nome='$nome', email='$email'$complemento WHERE id='$idUsuario'";
	if($resultadob=mysql_query($consultab)){
		echo"<script>alert('Editado com sucesso!');</script><script>window.location='../meus-dados.php'</script>";			
	}
	else{
		echo"<script>alert('Erro ao alterar .\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	
}
	



?>