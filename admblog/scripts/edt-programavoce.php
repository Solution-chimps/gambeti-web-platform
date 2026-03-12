<?php
	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	
	
	$id=$_GET["id"];

	$categoria=$_POST["categoria"];
		$categoria=str_replace("\"","&#34",$categoria);								
		$categoria=str_replace("'","&#39",$categoria);


	$ordem=$_POST["ordem"];
		$ordem=str_replace("\"","&#34",$ordem);								
		$ordem=str_replace("'","&#39",$ordem);

	$video=$_POST["video"];
		$video=str_replace("\"","&#34",$video);								
		$video=str_replace("'","&#39",$video);

	$nome=$_POST["nome"];
		$nome=str_replace("\"","&#34",$nome);								
		$nome=str_replace("'","&#39",$nome);
			$urlcriada=transf_url($nome);

	$sinopse=$_POST["sinopse"];
		$sinopse=str_replace("\"","&#34",$sinopse);								
		$sinopse=str_replace("'","&#39",$sinopse);


	$data=$_POST["data"];

	$destaque=$_POST["destaque"];

	$hora=$_POST["hora"];
		$hora=str_replace("\"","&#34",$hora);								
		$hora=str_replace("'","&#39",$hora);

	$local=$_POST["local"];
		$local=str_replace("\"","&#34",$local);								
		$local=str_replace("'","&#39",$local);	

	$enderecoalbum=$_POST["enderecoalbum"];
		$enderecoalbum=str_replace("\"","&#34",$enderecoalbum);								
		$enderecoalbum=str_replace("'","&#39",$enderecoalbum);	

	$tipobt=$_POST["tipobt"];
		$tipobt=str_replace("\"","&#34",$tipobt);								
		$tipobt=str_replace("'","&#39",$tipobt);	



if($nome==""){
	echo"<script>alert('O campo nome não pode ficar em branco!');history.go(-1);</script>";
}
else{

//limpo todos que possuem esse destaque
if($destaque!=0){
	$consultab="UPDATE programasvoce SET destaque='0' WHERE destaque='$destaque'";
	if($resultadob=mysql_query($consultab)){
	//	echo"Editei infos da OS<br />";
	}
	else{
		//echo"Erro ao editar infos<br />";
		exit;
	}	
	
}

	$consultab="UPDATE programasvoce SET categoria='$categoria', nome='$nome', video='$video', sinopse='$sinopse', data='$data', hora='$hora', local='$local', fotos='$enderecoalbum', bttipo='$tipobt', destaque='$destaque', urlamigavel='$urlcriada', ordem='$ordem' WHERE id='$id'";
	if($resultadob=mysql_query($consultab)){
	//	echo"Editei infos da OS<br />";
		//se foi colocado em destaque insiro na tb destaques
		$consultab="UPDATE eventosemdestaque SET tipo='para-voce', idprograma='$id' WHERE id='$destaque'";
		if($resultadob=mysql_query($consultab)){
		//	echo"Editei infos da OS<br />";
		}
		else{
			//echo"Erro ao editar infos<br />";
			exit;
		}			
		
	
	}
	else{
		//echo"Erro ao editar infos<br />";
		exit;
	}	


//deleto todos textos dessa programa para cadastrar novamente :)

$consulta="DELETE FROM textosvoce WHERE idprograma='$id'";
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
					$texto=$_POST["texto$c"];
					$ordem=$_POST["ordem$c"];

				
					if($titulo=="DELETAR"){
						//se deletar ignoro
					}
					else{
					
						if(($titulo=="")&&($texto=="")&&($ordem=="")){
						}
						else{
							echo $titulo." - ".$texto."<br />";
							$consultaxxx="INSERT INTO textosvoce (idprograma, titulo, texto, ordem) VALUES ('$id', '$titulo', '$texto','$ordem')";
							if($resultadoxxx=mysql_query($consultaxxx)){}						
							else{
								echo mysql_error();
								exit;
							}
						}
					}//FECHAMENTO ELSE DELETAR

				}
				




							echo"<script>alert('Editado com sucesso!');window.location='../programasvoce.php';</script>";

}


				


?>