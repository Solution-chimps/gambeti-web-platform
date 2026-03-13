<?

$login=$_POST['login'];
		$login=addslashes($login);
$senha=$_POST['senha'];
		$senha=addslashes($senha);
$pagina=$_GET['continue'];
		$pagina=addslashes($pagina);

if($pagina==""){
	$pagina="../index.php";
}

if(($login=="")||($senha=="")){
echo"<script>window.location='../login.php?erro=1';</script>";	
}
else{
						$logado='nao';
require"../../scripts/conecta.php";
$consulta= "SELECT *FROM usuariosad";
	$resultado = mysql_query($consulta) or die("Falha na execução da consulta. Erro:".mysql_error());
	while ($linha = $resultado->fetch_assoc())
	{
		$idBanco=$linha["id"];
		$loginBanco=$linha["email"];
		$senhaBanco=$linha["senha"];
		$perfilBanco=$linha["perfil"];	
		
	$senhaemhash=crypt($senha, $senhaBanco);
	if ($senhaemhash === $senhaBanco) {		
//if (Bcrypt::check($senha, $senhaBanco)) {
	//echo 'Senha OK!';
			

			//$senhaemhash=Bcrypt::hash($senha);
		
		if(($loginBanco==$login)&&($senhaBanco==$senhaemhash)){


				require"criarSession.php";
				echo"<script>window.location='$pagina';</script>";

			
	

		}

} else {
/*echo"<script>window.location='../login.php?erro=1&continue=$pagina';</script>";*/
}	

	}
	
	if($logado=="nao"){
		echo"<script>window.location='../login.php?erro=1&continue=$pagina';</script>";
	}


}//fechamento validacao vazio
?>