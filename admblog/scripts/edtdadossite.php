<?php
	require"../scripts/verifica.php";
	require"../scripts/pegarDados2.php";	
?>
<?
require"../../scripts/conecta.php";
require"../scripts/funcoes.php";









$nome=$_POST["nome"];
$title=$_POST["title"];
$descricao=$_POST["descricao"];
$palavrachave=$_POST["palavrachave"];
$email=$_POST["email"];
$telefone=$_POST["telefone"];
$facebook=$_POST["facebook"];
$youtube=$_POST["youtube"];
$instagram=$_POST["instagram"];
$periscope=$_POST["periscope"];
$twitter=$_POST["twitter"];
$tokenpagseguro=$_POST["tokenpagseguro"];
$emailpagseguro=$_POST["emailpagseguro"];
$localizacao=$_POST["localizacao"];
$codigoanalytics=$_POST["codigoanalytics"];



	$nome=aspasemasci($nome);
	$title=aspasemasci($title);
	$descricao=aspasemasci($descricao);
	$palavrachave=aspasemasci($palavrachave);
	$email=aspasemasci($email);	
	$telefone=aspasemasci($telefone);	
	$facebook=aspasemasci($facebook);
	$youtube=aspasemasci($youtube);
	$instagram=aspasemasci($instagram);
	$periscope=aspasemasci($periscope);
	$twitter=aspasemasci($twitter);
	$tokenpagseguro=aspasemasci($tokenpagseguro);
	$emailpagseguro=aspasemasci($emailpagseguro);
	$localizacao=aspasemasci($localizacao);	
	$codigoanalytics=aspasemasci($codigoanalytics);


if($nome==""){
	echo"<script>alert('O campo nome deve ser preenchido.');history.go(-1);</script>";
}
else{
	

	$consultab="UPDATE infossite SET nome='$nome', title='$title', descricao='$descricao', palavrachave='$palavrachave', email='$email', telefone='$telefone', facebook='$facebook', youtube='$youtube', instagram='$instagram', periscope='$periscope', twitter='$twitter', tokenpagseguro='$tokenpagseguro', emailpagseguro='$emailpagseguro', localizacao='$localizacao', codigoanalytics='$codigoanalytics' WHERE id='1'";
	if($resultadob=mysql_query($consultab)){
		echo"<script>alert('Editado com sucesso!');</script><script>window.location='../dados-site.php'</script>";			
	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao alterar .\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	
}
	



?>