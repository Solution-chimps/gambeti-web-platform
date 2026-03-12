<?
$codsenha=$_POST['codigoidentificador'];
		$codsenha=addslashes($codsenha); 
$novasenha=$_POST['novasenha'];
		$novasenha=addslashes($novasenha); 		

if(($codsenha=="")||($novasenha=="")){
echo"<script>alert('Por favor, nenhum campo pode ficar em branco!');history.go(-1);</script>";	
}
else{

require"../../scripts/conecta.php";

	//$novasenhahash=Bcrypt::hash($novasenha);
$novasenhahash=crypt($novasenha, $hash);

	$consultab="UPDATE usuariosad SET senha='$novasenhahash' WHERE randomico='$codsenha'";
	if($resultadob=mysql_query($consultab)){

			$consultab="UPDATE usuariosad SET randomico='' WHERE randomico='$codsenha'";
			if($resultadob=mysql_query($consultab)){

			}
			else{
				echo"<script>alert('Erro ao alterar .\\nTente novamente!');</script><script>history.go(-1);</script>";
			}	
		
		echo"<script>alert('Alterado com sucesso.');</script><script>window.location='../login.php';</script>";		

	}
	else{
		echo"<script>alert('Erro ao alterar .\\nTente novamente!');</script><script>history.go(-1);</script>";
	}			
		


}//fechamento validacao vazio
?>