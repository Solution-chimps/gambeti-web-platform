<?
$login=$_POST['login'];
		$login=addslashes($login); 

if($login==""){
echo"<script>alert('Por favor, digite seu login!');history.go(-1);</script>";	
}
else{

require"../../scripts/conecta.php";
$consulta= "SELECT *FROM usuariosad WHERE email='$login'";
	$resultado = mysql_query($consulta) or die("Falha na execução da consulta 1. Erro: ".mysql_error());
	if($linha=mysql_fetch_assoc($resultado))
	{
		
	$dataagora=date('YmdHis');
	$numerorandomico=rand(0,99999);
	$randomicosenha=$dataagora.$numerorandomico;	
		
	$consultab="UPDATE usuarios SET randomico='$randomicosenha' WHERE email='$login'";
	if($resultadob=mysql_query($consultab)){

	}
	else{
		echo"<script>alert('Erro ao alterar .\\nTente novamente!');</script><script>history.go(-1);</script>";
	}			
		
		$emailBanco=$linha["email"];
$corpo_email="
Você solicitou a recuperação de sua senha.
Clique no link abaixo e altere a senha.

http://www.laviniaboutique.com.br/admblog/resetpassword.php?cod=$randomicosenha
	--
	Caso não tenha solicitado entre em contato agora mesmo com o suporte.
";
if(mail($emailBanco,"Recuperação de Senha",$corpo_email,"From: Piovezam Soluções Web <naoresponder@piovezam.com>")){
	echo"<script>alert('Instruções enviadas para: $emailBanco');window.location='../login.php';</script>";		
}
else{
	echo"<script>alert('Erro ao enviar e-mail, tente novamente.');history.go(-1);</script>";		
}

				

	}
	else{
echo"<script>alert('Login [$login] inexistente! Tente novamente ou contate o administrador.');history.go(-1);</script>";	
	}


}//fechamento validacao vazio
?>