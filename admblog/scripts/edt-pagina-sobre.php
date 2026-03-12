<?php
	require"verifica.php";
	require"pegarDados2.php";
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	

	$texto1=$_POST["texto1"];
		$texto1=str_replace("\"","&#34",$texto1);								
		$texto1=str_replace("'","&#39",$texto1);
		$texto1=str_replace("\n","<br />",$texto1);	
		
	$texto2=$_POST["texto2"];
		$texto2=str_replace("\"","&#34",$texto2);								
		$texto2=str_replace("'","&#39",$texto2);
		$texto2=str_replace("\n","<br />",$texto2);	

	$texto3=$_POST["texto3"];
		$texto3=str_replace("\"","&#34",$texto3);								
		$texto3=str_replace("'","&#39",$texto3);
		$texto3=str_replace("\n","<br />",$texto3);	

	$texto4=$_POST["texto4"];
		$texto4=str_replace("\"","&#34",$texto4);								
		$texto4=str_replace("'","&#39",$texto4);
		$texto4=str_replace("\n","<br />",$texto4);	

	$texto5=$_POST["texto5"];
		$texto5=str_replace("\"","&#34",$texto5);								
		$texto5=str_replace("'","&#39",$texto5);
		$texto5=str_replace("\n","<br />",$texto5);										

	$texto6=$_POST["texto6"];
		$texto6=str_replace("\"","&#34",$texto6);								
		$texto6=str_replace("'","&#39",$texto6);
		$texto6=str_replace("\n","<br />",$texto6);										

	$texto7=$_POST["texto7"];
		$texto7=str_replace("\"","&#34",$texto7);								
		$texto7=str_replace("'","&#39",$texto7);
		$texto7=str_replace("\n","<br />",$texto7);										

	$texto8=$_POST["texto8"];
		$texto8=str_replace("\"","&#34",$texto8);								
		$texto8=str_replace("'","&#39",$texto8);
		$texto8=str_replace("\n","<br />",$texto8);										

			





	$consultab="UPDATE paginas SET texto1='$texto1', texto2='$texto2', texto3='$texto3', texto4='$texto4', texto5='$texto5', texto6='$texto6', texto7='$texto7', texto8='$texto8' WHERE id='2'";
	if($resultadob=mysql_query($consultab)){




//deleto todos textos dessa programa para cadastrar novamente :)

$consulta="DELETE FROM textossobre WHERE idprograma='1'";
if($resultado=mysql_query($consulta)){
	//echo"Limpei produtos<br />";
}
else{
	//echo"Erro ao limpar produto<br />";
	exit;	
}

				$totalprodutos=$_POST["totalprodutos"];
				for($c=1;$c<=$totalprodutos;$c++)
				{
					$titulo=$_POST["titulo$c"];
						$titulo=str_replace("\"","&#34",$titulo);								
						$titulo=str_replace("'","&#39",$titulo);
					$texto=$_POST["texto_sec$c"];
						$texto=str_replace("\"","&#34",$texto);								
						$texto=str_replace("'","&#39",$texto);					
					$ordem=$_POST["ordem$c"];

				
					if($titulo=="DELETAR"){
						//se deletar ignoro
					}
					else{
					
						if(($titulo=="")&&($texto=="")&&($ordem=="")){
						}
						else{
							//echo $titulo." - ".$texto."<br />";
							$consultaxxx="INSERT INTO textossobre (idprograma, titulo, texto, ordem) VALUES ('1', '$titulo', '$texto','$ordem')";
							if($resultadoxxx=mysql_query($consultaxxx)){}						
							else{
								echo mysql_error();
								exit;
							}
						}
					}//FECHAMENTO ELSE DELETAR

				}

		echo"<script>alert('Editado com sucesso');window.location='../paginas.php?id=$id';</script>";


	}
	else{
		echo mysql_error();
		echo"<script>alert('Erro ao editar.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}	
	





























	
	

?>