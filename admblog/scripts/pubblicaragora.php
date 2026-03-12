<?php
	
	
	$titulo=$_POST["titulo"];
		$urlcriada=transf_url($titulo);		
		$titulo=str_replace("\"","&#34",$titulo);								
		$titulo=str_replace("'","&#39",$titulo);			
	

	$data=$_POST["data"];
		$dataformatada=formataDataInvertida($data);

	$hora=$_POST["hora"];
	
		
	
	$destaque=$_POST["destaque"];
		
	$linhafina=$_POST["linhafina"];
		$linhafina=str_replace("\"","&#34",$linhafina);								
		$linhafina=str_replace("'","&#39",$linhafina);	

	$autor=$_POST["autor"];
		$autorurlcriada=transf_url($autor);	
		$autor=str_replace("\"","&#34",$autor);								
		$autor=str_replace("'","&#39",$autor);		
		
	$texto=$_POST["texto"];
	
	/*
	//separo as palavras do texto
	$palavrastexto=explode(" ",$texto);
	foreach($palavrastexto as $palavra){
		//confiro se existe a tag de cada um
		$palavra=transf_url($palavra);			
		echo"$palavra<br />";
	}
	*/
	
	/*
	//carrego tags
	$consultaxxx= "SELECT *FROM tags ORDER BY nome ASC";
	$resultadoxxx = mysql_query($consultaxxx) or die("<br />Falha na execução da consulta 2. Erro: ".mysql_error());
	while($linha=mysql_fetch_assoc($resultadoxxx))
	{

		$tagnobanco=$linha["nome"];
		$urltagbanco=$linha["urlamigavel"];
		$texto=str_replace("$tagnobanco","<a href='/noticias/$urltagbanco'>$tagnobanco</a>",$texto);
	}	
	*/
	
	$tags=$_POST["tagsx"];	

if(($titulo=="")||($data=="")||($destaque=="")||($linhafina=="")||($texto=="")||($autor=="")||($tags=="")){
	echo"<script>alert('Os campos Título / Data / Destaque / Linha Fina / Tags / Preview e Texto, não podem ficar em branco!');history.go(-1);</script>";
}
else{
	//alterar destaque
	$consultab="UPDATE noticias SET destaque='0' WHERE destaque='$destaque'";
	
	if($resultadob=mysql_query($consultab)){
	}
	else{
		echo"<script>alert('Erro ao alterar o destaque.\\nTente novamente!');</script><script>history.go(-1);</script>";
	}		



	$end=$_FILES['preview']['name'];	
	$uploaddir = "../../uploads/";
	$uploadfile = $uploaddir . $_FILES['preview']['name'];

		$tipo = $_FILES['preview']['type'];
		$tamanho = $_FILES['preview']['size'];								
		// image/jpeg - image/png - image/gif
			
	if(move_uploaded_file($_FILES['preview']['tmp_name'],$uploadfile))
		{

$diaHoje=date("d");
$mesHoje=date("m");
$anoHoje=date("Y");
$horaHoje=date("h");
$minutoHoje=date("i");
$segundoHoje=date("s");

$numerorandomico=rand(0,999999);
	$numerorandomico=$numerorandomico.$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje;
$extensaodoarquivo=strtolower(end(explode(".", $_FILES['preview']['name'])));

$novoNome=$numerorandomico.".".$extensaodoarquivo;
rename("../../uploads/$end","../../uploads/".$novoNome);
		}
		//else validacao tipo e tamanho do arquivo
		else{
			$novoNome="";
		}


			$identificadornot=rand(0,999999);
			$identificadornot=$diaHoje.$mesHoje.$anoHoje.$horaHoje.$minutoHoje.$segundoHoje.$identificadornot;
			$consulta="INSERT INTO noticias (data, hora, titulo, autor, urlamigavel, linhafina, preview, destaque, identificador, autorurl) VALUES ('$dataformatada','$hora', '$titulo', '$autor', '$urlcriada', '$linhafina','$novoNome', '$destaque','$identificadornot','$autorurlcriada')";
			if($resultado=mysql_query($consulta)){
				
				//consulto id dessa noticia
				$consulta= "SELECT *FROM noticias WHERE identificador='$identificadornot'";
				$resultado = mysql_query($consulta) or die("Falha na execução da consulta");
				if($linha=mysql_fetch_assoc($resultado))
				{
					$idNoticiaCadastradaAgora=$linha["id"];	
					//cria o txt do texto
					$fp = fopen("../../textos/".$idNoticiaCadastradaAgora.".txt" , "w");
					fwrite($fp, $texto);	




//vejo as tags desse texto
$tags=$_POST["tagsx"];
if($tags==""){
	echo"<script>alert('Selecione ao menos 1 tag');history.go(-1);</script>";
}
else{
    foreach($tags as $tag){

	$consulta="INSERT INTO tagiado (idnot, idtag) VALUES ('$idNoticiaCadastradaAgora', '$tag')";
			if($resultado=mysql_query($consulta)){
			}
			else{
				echo"<script>alert('Erro ao salvar tags da notícia. Por favor, tente novamente!');</script><script>history.go(-1);</script>";	
			}//fechamento else salvar no banco
		
	}//fechamento foreach
}//fechamento else valida campo vazio		


										
						echo"<script>alert('Notícia cadastrada com sucesso.');</script><script>window.location='../noticias.php';</script>";
				}
				else{
						echo"<script>alert('Não foi possível retornar ID de cadastro. Tente novamente!');</script><script>history.go(-1);</script>";
				}		
			
							
			}
			else{
				echo"<script>alert('Erro ao salvar notícia no banco.\\nTente novamente!');</script><script>history.go(-1);</script>";				
			}





}//fechamento else valida campo vaio



























	
	

?>