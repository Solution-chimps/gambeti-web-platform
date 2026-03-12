 <?php

	require"../scripts/funcoes.php";
	require"../../scripts/conecta.php";	

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



	$end=$_FILES['logo']['name'];	
	$uploaddir = "../../imagens/";
	$uploadfile = $uploaddir . $_FILES['logo']['name'];

		$tipo = $_FILES['logo']['type'];
		$tamanho = $_FILES['logo']['size'];	
		
		if(($tipo=="image/jpeg")||($tipo=="image/png")||($tipo=="image/gif")){

			
	if(move_uploaded_file($_FILES['logo']['tmp_name'],$uploadfile))
		{

$diaHoje=date("d");
$mesHoje=date("m");
$anoHoje=date("Y");
$horaHoje=date("h");
$minutoHoje=date("i");
$segundoHoje=date("s");

$numerorandomico=rand(0,999999);
	$numerorandomico=$numerorandomico.$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje;
$extensaodoarquivo=strtolower(end(explode(".", $_FILES['logo']['name'])));

$novo_nome=$numerorandomico.".".$extensaodoarquivo;
rename("../../imagens/$end","../../imagens/".$novo_nome);


		}
		}

//limpo todos que possuem esse destaque
//devo limpar as duas tableas
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
if($destaque!=0){
	$consultab="UPDATE programassuaempresa SET destaque='0' WHERE destaque='$destaque'";
	if($resultadob=mysql_query($consultab)){
	//	echo"Editei infos da OS<br />";
	}
	else{
		//echo"Erro ao editar infos<br />";
		exit;
	}	
	
}


	

			$identificadornot=rand(0,999999);
			$identificadornot=$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje.$identificadornot;
			$consulta="INSERT INTO programassuaempresa (categoria, foto, video, nome, sinopse, data, hora, local, fotos, bttipo, indentificador, urlamigavel, destaque, ordem) VALUES ('$categoria', '$novo_nome', '$video', '$nome', '$sinopse', '$data', '$hora', '$local', '$enderecoalbum', '$tipobt', '$identificadornot', '$urlcriada', '$destaque', '$ordem')";
			if($resultado=mysql_query($consulta)){

				

			//carrega id desse cadastro
			$consultaz= "SELECT *FROM programassuaempresa WHERE indentificador='$identificadornot'";
			$resultadoz = mysql_query($consultaz) or die("Falha na execução da consulta.1. Erro: ".mysql_error());
			if($linha=mysql_fetch_assoc($resultadoz))
			{
				$iddesseprograma=$linha["id"];
			
			}

		$consultab="UPDATE eventosemdestaque SET tipo='para-sua-empresa', idprograma='$iddesseprograma' WHERE id='$destaque'";
		if($resultadob=mysql_query($consultab)){
		//	echo"Editei infos da OS<br />";
		}
		else{
			//echo"Erro ao editar infos<br />";
			exit;
		}					

				$totalprodutos=$_POST["totalprodutos"];
				for($c=1;$c<=$totalprodutos;$c++)
				{
					$titulo=$_POST["titulo$c"];
					$texto=$_POST["texto$c"];
					$ordem=$_POST["ordem$c"];					

					
					if(($titulo=="")&&($texto=="")){
						echo"<script>alert('vazio');</script>";
					
					}
					else{
						
						$consultaxxx="INSERT INTO textossuaempresa (idprograma, titulo, texto, ordem) VALUES ('$iddesseprograma', '$titulo', '$texto', '$ordem')";
						if($resultadoxxx=mysql_query($consultaxxx)){
												
						}						
						else{
							echo mysql_error();
						}
					}

				}			


				
						echo"<script>alert('Cadastrado com sucesso.');</script><script>window.location='../programassuaempresa.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			





















	
	

?>